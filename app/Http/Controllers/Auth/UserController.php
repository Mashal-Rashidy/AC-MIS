<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\User;
use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    #User Functions
    protected function index(Request $request)
    {
        $data['roles'] = Role::get();
        if ($request->ajax()) {
            $data = User::get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('status', function ($data) {
                    if ($data->deleted_at != null) {
                        $btn = "<span class='badge badge-danger'>غیر فعال</span>";
                    } else {
                        $btn = "<span class='badge badge-success'>فعال</span>";
                    }
                    return $btn;
                })
                ->addColumn('role_name', function ($data) {
                    $userRoleId = DB::table('model_has_roles')->where('model_id', $data->id)->get(['role_id']);
                    $roleName = '';
                    foreach ($userRoleId as $role) {
                        $roleName .= '<span class="badge badge-light" style="font-weight:bold">' . Role::findOrFail($role->role_id)->name . '</span>';
                    }
                    $info = $roleName;
                    return $info;
                })
                ->addColumn('action', function ($data) {
                    if ($data->deleted_at == null) {
                        $btn = '
                        <a class="ml-1" style="cursor: pointer;" onclick="getUserDataForUpdate(' . $data->id . ')"><i class="btn btn-sm btn-outline-info btn-circle btn-sm flaticon-edit-1"></i></a>
                        <a class="ml-1" style="cursor: pointer;" title="غیر فعال نمودن" onclick="deActive(' . $data->id . ')"><i class="btn btn-sm btn-danger btn-circle flaticon-lock"></i></a>
                        <a class="ml-1" style="cursor: pointer;" onclick="changePassword(' . $data->id . ')"><i class="btn btn-sm btn-outline-primary btn-circle btn-sm flaticon2-user-1"></i></a>
                        ';

                        return $btn;
                    } else {
                        $btn = '
                        <a class="ml-1" style="cursor: pointer;" onclick="getUserDataForUpdate(' . $data->id . ')"><i class="btn btn-sm btn-outline-info btn-circle btn-sm flaticon-edit-1"></i></a>
                        <a class="ml-1" style="cursor: pointer;" title="فعال نمودن" onclick="active(' . $data->id . ')"><i class="btn btn-sm btn-success btn-circle flaticon2-refresh-arrow"></i></a>
                    ';
                        return $btn;
                    }

                })
                ->rawColumns(['action',  'role_name', 'status'])
                ->make(true);
        }
        return view('auth.index', $data);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6',
            'roles' => 'required',
        ], [
            'name.required' => 'نام ضروری میباشد',
            'email.required' => 'ایمیل ضروری میباشد',
            'email.email' => 'ایمیل ادرس باید به شکل ایمیل باشد.',
            'password.required' => 'کود ضروری میباشد',
            'password.confirmed' => 'کود هم خوانی ندارد',
            'password.min' => 'کود باید حد اقل ۶ خانه باشد',
            'roles.required' => 'انتخاب صلاحیت ضروری میباشد',
        ]);

        if ($validator->fails()) {
            return json_encode($validator->errors()->toArray());
        }

        DB::beginTransaction();

        try {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();

            $user->assignRole($request->roles);

            DB::commit();
            // all good
        } catch (\Exception $e) {
            DB::rollback();
            // something went wrong

            session()->flash('warning', 'Something where wrong please contact Database Adminstrator.');
            return redirect()->back();
        }

        return true;
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'edit_name' => 'required',
            'edit_email' => 'required|email',
            // 'edit_password' => $request->password != '' ? 'required|confirmed|min:6' : '',
        ], [
            'edit_name.required' => 'نام ضروری میباشد',
            'edit_email.required' => 'ایمیل ضروری میباشد',
            'edit_email.email' => 'ایمیل ادرس باید به شکل ایمیل باشد.',
            // 'edit_password.required' => 'کود ضروری میباشد',
            // 'edit_password.confirmed' => 'کود هم خوانی ندارد',
            // 'edit_password.min' => 'کود باید حد اقل ۶ خانه باشد',
        ]);

        if ($validator->fails()) {
            return json_encode($validator->errors()->toArray());
        }

        DB::beginTransaction();

        try {
            $user_duplicate = User::where('email', $request->edit_email)->where('id', '!=', $request->user_id)->first();

            if (isset($user_duplicate)) {
                return 'duplicate_entry';
            }

            $user = User::findOrFail($request->user_id);
            $user->email = $request->edit_email;
            $user->name = $request->edit_name;
            // $user->removeRole($request->edit_roles);
            $user->roles()->detach();
            $user->update();

            $user->assignRole($request->edit_roles);

            DB::commit();
            // all good
        } catch (\Exception $e) {
            DB::rollback();
            // something went wrong

            session()->flash('warning', 'Something where wrong please contact Database Adminstrator.');
            return false;
        }

        return true;
    }

    public function reset_password(Request $request)
    {
        DB::beginTransaction();

        try {
            $auth_user = Auth::user();

            $user = User::when($auth_user->type != null, function ($query) use ($auth_user) {
                return $query->where('users.type', $auth_user->type);
            })
                ->when($auth_user->type != null, function ($query) use ($auth_user) {
                    return $query->where('users.subject_id', $auth_user->subject_id);
                })
                ->where('id', $request->id)
                ->first();
            $user->password = Hash::make($request->password);

            $user->update();

            DB::commit();
            // all good
        } catch (\Exception $e) {
            DB::rollback();
            // something went wrong

            session()->flash('warning', 'Something where wrong please contact Database Adminstrator.');
            return redirect()->back();
        }

        $locale = App::getLocale();
        switch ($locale) {
            case 'en':
                session()->flash('success', 'Updated Successfuly.');
                break;

            case 'fa':
                session()->flash('success', 'موفقانه اپدیت گردید.');
                break;

            case 'pa':
                session()->flash('success', 'په بریالی توگه اپدیت شو.');
                break;

            default:
                break;
        }
        return redirect()->back();
    }

    public function destroy($email, Request $request)
    {
        // DB::beginTransaction();

        // try {
        //     $auth_user = Auth::user();

        //     $user = User::when($auth_user->type != null, function ($query) use ($auth_user) {
        //         return $query->where('users.type', $auth_user->type);
        //     })
        //         ->when($auth_user->type != null, function ($query) use ($auth_user) {
        //             return $query->where('users.subject_id', $auth_user->subject_id);
        //         })
        //         ->where('id', $request->id)
        //         ->first();
        //     $user->delete();

        //     $user->roles()->detach();
        //     $user->accessDomains()->detach();

        //     DB::commit();
        //     // all good
        // } catch (\Exception $e) {
        //     DB::rollback();
        //     // something went wrong

        //     session()->flash('warning', 'Something where wrong please contact Database Adminstrator.');
        //     return redirect()->back();
        // }

        // $locale = App::getLocale();
        // switch ($locale) {
        //     case 'en':
        //         session()->flash('success', 'Deleted Successfuly.');
        //         break;

        //     case 'fa':
        //         session()->flash('success', 'موفقانه حذف گردید.');
        //         break;

        //     case 'pa':
        //         session()->flash('success', 'په بریالی توگه پاک شو.');
        //         break;

        //     default:
        //         break;
        // }
        // return redirect()->back();
    }

    public function change_password(Request $request)
    {
        $this->validate($request, [
            'old_password' => 'required',
            'password' => 'required|confirmed|min:6',
        ]);

        if (Hash::check($request->old_password, Auth::user()->password)) {
            DB::beginTransaction();

            try {
                $request->user()->fill([
                    'password' => Hash::make($request->password),
                ])->save();

                DB::commit();
                // all good
            } catch (\Exception $e) {
                DB::rollback();
                // something went wrong

                session()->flash('warning', 'Something where wrong please contact Database Adminstrator.');
                return redirect()->back();
            }

            session()->flash('success', 'رمز موفقانه تغییر نمود...!');

            return redirect()->back();
        } else {

            session()->flash('warning', 'پسورد قبلی اشتباه است.');
            return redirect()->back();
        }
    }

    protected function changeUserImage(Request $request)
    {
        if ($request->has('profile_avatar')) {
            $user = User::findOrFail(auth()->id());
            $img = Storage::disk('user_images')->put('/', $request->file('profile_avatar'));
            $user->image = $img;
            $user->update();
            return true;
        } else {
            return false;
        }
    }
    #End User Functions

    #Roles Functions
    public function roles(Request $request)
    {
        $data['roles'] = Role::get();
        $data['permission'] = \Illuminate\Support\Facades\DB::table('permissions')->get();

        if ($request->ajax()) {
            $sql = Role::get();

            return Datatables::of($sql)
                ->addIndexColumn()
                ->addColumn('action', function ($sql) {
                    $btn = "<a class='edit_btn ml-1' style='cursor: pointer;' action='" . route('permission.details', 'edit') . "' record_id='" . $sql->id . "' name='" . $sql->name . "'><i class='btn btn-outline-info btn-circle flaticon-edit-1'></i></a>";
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('auth.roles.index', $data);
    }

    public function store_role(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:roles',
        ], [
            'name.required' => 'نام ضروری میباشد',
            'name.unique' => 'به این نام صلاحیت وجود دارم',
        ]);

        if ($validator->fails()) {
            return json_encode($validator->errors()->toArray());
        }

        $role = Role::create(['name' => $request->name]);
        $role->syncPermissions($request->permissions);

        return true;
    }

    public function update_role(Request $request)
    {
        DB::beginTransaction();

        try {

            $role = Role::find($request->id);
            $role->name = $request->name;
            $role->revokePermissionTo($role->permissions);
            $role->syncPermissions($request->permissions);
            $role->update();
            DB::commit();
            // all good
        } catch (\Exception $e) {
            DB::rollback();
            // something went wrong

            session()->flash('warning', 'Something where wrong please contact Database Adminstrator.');
            return redirect()->back();
        }

        return true;
    }

    public function role_details(Request $request, $type)
    {
        if ($type == 'details') {
            $data['roles'] = Role::get();
            $data['type'] = 'role_details';
        }
        if ($type == 'edit') {
            $data['role'] = User::find($request->id)->roles->pluck('name');
            $data['roles'] = Role::get();
            $data['type'] = 'edit_role_details';
            $data['user_id'] = $request->id;
        }
        return view('auth.roles.data', $data);
    }
    #End Roles Functions

    #Permission Functions
    public function permission_create(Request $request)
    {
        if (isset($request->name)) {
            Permission::create(['name' => $request->name, 'section' => $request->section]);

            session()->flash('success', 'Created Successfuly.');
            return redirect()->back();
        }

        return view('auth.create_permission');
    }

    public function permission_details(Request $request, $type)
    {
        if ($type == 'store') {
            $data['permission'] = \Illuminate\Support\Facades\DB::table('permissions')->get();
            $data['type'] = $type;
        }
        if ($type == 'edit') {
            $data['permission'] = \Illuminate\Support\Facades\DB::table('permissions')->get();
            $data['type'] = $type;
            $data['role'] = Role::find($request->id);
        }
        return view('auth.roles.data', $data);
    }
    #End Permission Functions

    public function active($id)
    {
        User::withTrashed()->find($id)->restore();
        $data = User::where('id', $id)->first();
        if ($data) {
            // $data->is_active = true;
            $data->update();
            return response()->json(['msg' => 'حساب کاربر فعال گردید.', 'status' => true], 200);
        }
        return response()->json(['status' => false], 404);
    }

    public function deactive($id)
    {
        $user = User::find($id);
        // $user->is_active = false;
        $user->update();
        $user->delete();
        return response()->json(['msg' => 'حساب کاربر غیر فعال گردید.', 'status' => true], 200);
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $userRoleId = DB::table('model_has_roles')->where('model_id', $user->id)->get(['role_id']);
        foreach ($userRoleId as $role) {
            $roleName[] = Role::findOrFail($role->role_id)->name;
        }
        return response()->json(['status' => true, 'data' => $user, 'role_name' => $roleName]);
    }

    public function changePasswordByAdmin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'required|confirmed|min:6',
        ], [
            'password.required' => 'کود ضروری میباشد',
            'password.confirmed' => 'کود هم خوانی ندارد',
            'password.min' => 'کود باید حد اقل ۶ خانه باشد',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => false, 'errors' => $validator->errors()->toArray()]);
        } else {
            $user = User::findOrFail($request->password_user_id);
            $user->password = Hash::make($request->password);
            $user->update();
            return response()->json(['status' => true, 'data' => 'رمز عبور موفقانه تجدید گردید.']);
        }
    }
}
