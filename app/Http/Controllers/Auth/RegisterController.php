<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('auth');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    protected function profile()
    {
        $data['user'] = User::findOrFail(auth()->id());
        return view('auth.profile', $data);
    }

    protected function update_profile(Request $request)
    {
        $request->validate([
            'password' => $request->password != "" ? 'required|between:8,30|confirmed' : '',
            'name' => 'required',
        ]);

        $user = User::findOrFail(auth()->id());
        if ($request->password != "") {
            if (Hash::check($request->old_password, $user->password))
                $user->password = $request->password != "" ? Hash::make($request->password) : $user->password;
            else
                return redirect()->back()->with('wrong_pwd', 'رمز قبلی اشتباه است');
        }
        $user->name = $request->name;
        $img = $request->has('image') ? Storage::disk('user_images')->put('/', $request->file('image')) : $user->image;
        $user->image = $img;
        $user->update();
        return redirect()->back()->with('success_update', 'موفقانه تغییر نمود');
    }
}
