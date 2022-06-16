<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Dashboard\Profile\UpdateProfileRequest;
use App\Http\Requests\Dashboard\Profile\UpdatePasswordRequest;

class ProfileController extends Controller
{
    public function index()
    {
        $admin = Admin::findOrFail(Auth::guard('admin')->id());
        // session(['admin' => $admin]);
        return view('admin.profile.profile', compact('admin'));
    }

    public function update(UpdateProfileRequest $request, Admin $admin)
    {

        try {
            $admin->update(
                [
                    'name' => $request->name,
                    'email' => $request->email
                ]
            );
            if (isset($request->image)) {
                if (isset($admin->getMedia('admins')[0])) {
                    $admin->getMedia('admins')[0]->delete();
                }
                $admin->addMediaFromRequest('image')->toMediaCollection('admins');
            }

            return redirect()->back()->with('success', 'تمت العمليه بنجاح');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'فشلت العمليه');
        }
    }

    public function passwordReset()
    {
        return view('admin.profile.password-reset');
    }

    public function passwordUpdate(UpdatePasswordRequest $request)
    {
        $admin = Admin::findOrFail(Auth::guard('admin')->id());
        $admin->update(['password' => Hash::make($request->password)]);
        return redirect()->route('profile')->with('success', 'تمت العملية بنجاح');
    }
}
