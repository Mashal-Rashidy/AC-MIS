<?php

namespace App\Http\Controllers;

use App\Models\Employees;
use Carbon\Carbon;
use DataTables;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;
use Morilog\Jalali\Jalalian;

class EmployeesController extends Controller
{
    protected function employeeList(Request $request)
    {
        if ($request->ajax()) {
            $data = Employees::join('users', 'users.id', 'employees.created_by')
                ->select(
                    'employees.id',
                    'employees.employee_card_id',
                    'employees.name',
                    'employees.photo_path',
                    'employees.card_expired_date',
                    'users.name as created_by'
                )
                ->when($request->employee_card_id != '', function ($query) use ($request) {
                    return $query->where('employees.employee_card_id', $request->employee_card_id);
                })
                ->when($request->id != '', function ($query) use ($request) {
                    return $query->where('employees.id', $request->id);
                })
                ->when($request->name != '', function ($query) use ($request) {
                    return $query->where('employees.name', $request->name);
                });
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('card_number', function ($data) {
                    return '<span class="badge badge-dark">' . $data->employee_card_id . '</span>';
                })
                ->addColumn('photo_path', function ($data) {
                    $url = $data->photo_path != '' ? asset($data->photo_path) : asset('logo\blank.png');
                    return $url;
                })
                ->addColumn('action', function ($data) {
                    $btn = "
                     <div class='d-flex justify-contant-inline'>
                         <a onclick='editData(" . $data->id . ")' class='edit_btn ml-1' style='cursor: pointer;' title='تجدید معلومات' ><i class='btn btn-sm btn-outline-info btn-circle flaticon-edit-1'></i></a>
                         <a class='edit_btn ml-1' title='چاپ کارت'  onclick='printEmployeeCard(" . $data->id . ")'><i class='btn btn-outline-dark btn-sm btn-circle flaticon2-printer'></i></a>

                     </div>
                 ";
                    return $btn;
                })
                ->rawColumns(['card_number', 'photo_path', 'action'])
                ->make(true);
        }
        return view('employee.index');
    }

    protected function employeeCreate(Request $request)
    {
        $validate = Validator::make($request->all(),
            [
                'name' => 'required|string',
                'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ],
            [
                'name.required' => 'درج نام کارمند ضروری میباشد',
                'name.string' => 'نام کارمند باید حروف باشد',
                'photo.required' => 'انتخاب عکس ضروری میباشد',
                'photo.mimes' => 'فارمت عکس باید (jpeg,png,jpg)  باشد.',
                'photo.max' => 'سایز عکس باید بیشتر از 2MB نباشد.',
            ]
        );

        if ($validate->fails()) {
            return response()->json(['status' => false, 'errors' => $validate->errors()->toArray()]);
        } else {

            $id = Employees::nextID();
            $employee = new Employees();
            $employee->name = $request->name;
            $employee->card_expired_date = Jalalian::fromCarbon(Carbon::now()->addYear(1))->format('Y-m-d');
            if ($request->file('photo')) {
                $photo = Storage::disk('employee_photos')->put('', new File($request->file('photo')));
                $employee->photo_path = 'storage\employee_photos' . '\/' . $photo;
            }
            $employee->created_by = Auth::id();
            $date = Carbon::now();
            $employee->employee_card_id = 'MIC-' . $date->format('Y') . '-' . $date->format('m') . '-E' . $id;
            $employee->save();
            return response()->json(['status' => true, 'data' => 'معلومات موفقانه ثبت گردید.']);
        }
    }

    protected function employeeEdit($id)
    {
        $data = Employees::findOrFail($id);
        $photo_path = asset($data->photo_path);
        return $data != '' ? response()->json(['status' => true, 'data' => $data, 'photo_path' => $photo_path]) : response()->json(['status' => false, 'data' => 'معلومات موجود نیست', 'photo_path' => asset('logo\blank.png')]);

    }

    protected function employeeUpdate(Request $request)
    {
        $validate = Validator::make($request->all(),
            [
                'employee_id' => 'required',
                'edit_name' => 'required|string',
                'edit_photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ],
            [
                'edit_name.required' => 'درج نام کارمند ضروری میباشد',
                'edit_name.string' => 'نام کارمند باید حروف باشد',
                'edit_photo.required' => 'انتخاب عکس ضروری میباشد',
                'edit_photo.mimes' => 'فارمت عکس باید (jpeg,png,jpg)  باشد.',
                'edit_photo.max' => 'سایز عکس باید بیشتر از 2MB نباشد.',
            ]
        );

        if ($validate->fails()) {
            return response()->json(['status' => false, 'errors' => $validate->errors()->toArray()]);
        } else {
            $employee = Employees::findOrFail($request->employee_id);
            $employee->name = $request->edit_name;
            if ($request->file('photo')) {
                $photo = Storage::disk('employee_photos')->put('', new File($request->file('photo')));
                $employee->photo_path = 'storage\employee_photos' . '\/' . $photo;
            }
            $employee->updated_by = Auth::id();
            $employee->update();
            return response()->json(['status' => true, 'data' => 'معلومات موفقانه تجدید گردید.']);
        }
    }

    protected function employeeCardPrint($id)
    {
        $data = Employees::findOrFail($id);
        $cardData = [
            'id' => 'ID : ' . $data->id,
            'name' => 'Name : ' . $data->name,
            'card_No' => 'Card No : ' . $data->employee_card_id,
            'create_date' => 'Issue Date : ' . Jalalian::fromCarbon($data->created_at)->format('Y-m-d'),
            'photo' => URL::asset($data->photo_path),
        ];
        $card = view('employee.print-card', compact('cardData'))->render();
        return response()->json(['status' => true, 'card' => $card]);
    }

    protected function employeeCardUpdateStatus($id)
    {
        $data = Employees::findOrFail($id);
        $data->printed = true;
        $data->update();
        return response()->json(['status' => true]);
    }

    protected function employeeCardCheckPage()
    {
        return view('employee.check');
    }

    protected function employeeCardCheck(Request $request)
    {
        $data = Employees::find($request->search_id);
        if ($data != '') {
            $show = '
            <tr>
                <th>نمبر کارت کارمند : ' . $data->employee_card_id . '</th>
                <th>اسم کارمند : ' . $data->name . '</th>
                <th>عکس کارمند : <img src="'.asset($data->photo_path).'" width="200px" height="200px"></th>
            </tr>
            ';
        } else {
            $show = '';
        }

        return response()->json($show);
    }

}
