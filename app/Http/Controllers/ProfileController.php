<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function show()
    {
        $employee = User::find(auth()->id());
        return view('employee.profile', ['employee' => $employee]);
    }
    public function edit()
    {
        $employee = User::find(auth()->id());
        return view('employee.edit-profile', ['employee' => $employee]);
    }
    public function update(Request $request)
    {

        $request->validate([
            'new-name' => ['required', Rule::unique('users', 'name')->ignore(auth()->id())],
            'new-email' => ['required', 'email', Rule::unique('users', 'email')->ignore(auth()->id())],
            'new-password' => 'required|min:5',
        ]);
        $user = User::find(auth()->id());
        if ($request->has('new-profile')) {
            $request->validate([
                'new-profile' => 'image'
            ]);
            if ($user->profile) {
                unlink(public_path('assets/image/profile/' . $user->profile));
            }

            $photo = $request->file('new-profile');
            $imagename = time() . '.' . $photo->extension();

            $photo->move(public_path('assets/image/profile'), $imagename);
            $user->profile = $imagename;
        }

        $user->name = $request->input('new-name');
        $user->email = $request->input('new-email');
        $user->password = $request->input('new-password');
        $user->save();
        return to_route('profile')->with('msg', 'Updated successfully');


        return $request->all();
    }
}
