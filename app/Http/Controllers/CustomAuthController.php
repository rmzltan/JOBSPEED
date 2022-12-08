<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Session;

class CustomAuthController extends Controller
{
    public function login(){
        return view('auth.SignIn');
    }

    public function registration(){
        return view('auth.SignUp');
    }

    public function registerUser(Request $request){
        $request->validate([
            'FirstName' => 'required',
            'LastName' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|max:12',
        ]); 
        $user = new User();
        
        $user -> FirstName = $request->FirstName;
        $user -> LastName = $request->LastName;
        $user -> email = $request->email;
        $user -> password = Hash::make($request->password);
        $res = $user ->save();
        if ($res) {
            return back()->with('success','You have successfully registered');
            
        }else{
            return back()->with('error','something wrong');
        }
    }

    public function signInUser(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8|max:12',
        ]);
        $user = User::where('email','=', $request->email)->first(); 
        if ($user){
            if(Hash::check($request->password,$user->password)){
                $request->session()->put('signInId',$user->id);
                return redirect('Feed');
            }else{
                return back()->with('error', 'Your password is incorrect.');
            }
        }else{
            return back()->with('error', 'This email is not registered.');
        }
    }

    public function Feed(){
        $data = array();
        if (Session()->has('signInId')){
            $data = User::where('id','=', Session()->get('signInId'))->first();
        }

        return view('feed',compact('data'));
        
    }
    
    public function logout(){
        if (Session()->has('signInId')){
            Session()->pull('signInId');
            return redirect('index.blade.php');
        }
        
    }
    
}
