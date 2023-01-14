<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Appointment;
use App\Models\UserSeller;
use App\Models\Service;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class CustomAuthController extends Controller
{
    public function login()
    {
        return view('auth.signIn');
    }

    public function registration()
    {
        return view('auth.signUp');
    }

    public function registerUser(Request $request)
    {
        $request->validate([
            'FirstName' => 'required',
            'LastName' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|max:25',
        ]);
        $user = new User();

        $user->FirstName = $request->FirstName;
        $user->LastName = $request->LastName;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $res = $user->save();
        if ($res) {
            return back()->with('success', 'You have successfully registered');
        } else {
            return back()->with('error', 'something wrong');
        }
    }

    public function signInUser(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8|max:20',
        ]);
        $credentials = $request->only(['email', 'password']);

        if (Auth::attempt($credentials)) {
            return redirect()->route('feed');
        } else {
            return redirect()
                ->back()
                ->withErrors(['error' => 'Invalid email or password']);
        }
    }

    public function Feed()
    {
        if (Auth::check()) {
            $userId = Auth::id();
            $data = User::where('id', $userId)->first();
        }

        return view('feed', compact('data'));
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }
    public function profile_user()
    {
        if (Auth::check()) {
            $userId = Auth::id();
            $data = User::where('id', $userId)->first();

            $appointments = Appointment::where('user_id', $userId)->get();
        }

        return view('user.user-profile', compact('appointments', 'data'));
    }
    public function edit_profile()
    {
        if (Auth::check()) {
            $userId = Auth::id();
            $data = User::where('id', $userId)->first();
        }

        return view('user.edit-user-profile', compact('data'));
    }
    public function updateProfile(Request $request)
    {
        // Validate the input fields
        $request->validate([
            'FirstName' => 'required',
            'LastName' => 'required',
            'email' => 'required|email|unique:users,email,' . $request->user()->id,
            'profile_image' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        // Update the user's profile
        $user = $request->user();
        $user->FirstName = $request->FirstName;
        $user->LastName = $request->LastName;
        $user->email = $request->email;
        if ($request->hasfile('profile_image')) {
            $file = $request->file('profile_image');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('Images/uploaded-profile', $filename);
            $user->profile_image = $filename;
            $user->save();
        }
        $user->save();

        // Redirect back to the edit profile page with a success message
        return redirect()
            ->route('profile_user')
            ->with('success', 'Profile updated successfully');
    }
    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|max:25',
            'current_password' => [
                'required',
                function ($attribute, $value, $fail) use ($request) {
                    if (!Hash::check($value, $request->user()->password)) {
                        $fail('Incorrect current password');
                    }
                },
            ],
        ]);
        // Check if the current password is correct
        
        $user = $request->user();
        $user->password = Hash::make($request->new_password);
        $user->save();
        return redirect()
            ->route('profile_user')
            ->with('success', 'Profile updated successfully');
    }
   
}
