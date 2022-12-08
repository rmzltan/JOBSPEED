<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Service;
use App\Models\userSeller;
use App\Models\Appointment;
use Illuminate\Support\Facades\Auth;
class UserSellerController extends Controller
{

  public function addInfo(){
    $data = array();
        if (Session()->has('signInId')){
            $data = User::where('id', Session()->get('signInId'))->first();
        }

        return view('seller.freelancer-add-info',compact('data'));
  }

  public function updateProfile(Request $request, ){

    $request->validate([
      'description' => 'required',
      'birthday' => 'required',
      'gender' => 'required',
      'address' => 'required',
      'contact_number' => 'required',
      
  ]);

    $user_sell= new UserSeller();

    $user_sell -> description = $request->description;
    $user_sell -> birthday = $request->birthday;
    $user_sell -> gender = $request->gender;
    $user_sell -> address = $request->address; 
    $user_sell -> contact_number = $request->contact_number;

   
    
    if (Session()->has('signInId')){
      $user = User::where('id','=', Session()->get('signInId'))->first();
      $request->session()->put('UserID',$request->birthday);
      $user = User::where('role', $user->role)->first();
      $user->role = 'seller';
      $user->save();
      
      
      
      if($request->hasfile('profile_image'))
      {
          $file = $request->file('profile_image');  
          $extention = $file->getClientOriginalExtension();
          $filename = time().'.'.$extention;
          $file->move('Images/uploaded-profile',$filename);
          $user->profile_image = $filename;
          $user->save();
      } 
      elseif($request->gender == 'Female'){
        $user = User::where('profile_image', $user->profile_image)->first();
        $user->profile_image = 'default-girl.png';
        $user->save();
      }
      else{
        $user = User::where('profile_image', $user->profile_image)->first();
        $user->profile_image = 'default-boy.png';
        $user->save();
      }
      
      
    }
    $user->userSeller()->save($user_sell);
    
   
        
       
             
         
    return redirect('Dashboard');
  
 
  }
  public function dashboard(Request $request, ){
    $data = array();
    
        if (Session()->has('signInId')){
            $data = User::where('id','=', Session()->get('signInId'))->first();
            $sellerData = UserSeller::where('id','=', Session()->get('signInId'))->first(); 

        }
      

        
      if (Session()->has('UserID'))
      {
        if ($data->role=='user'){
          return view('seller.freelancer-add-info',compact('data'));
        }
        elseif ($data->role=='seller'){
          $sellerData = UserSeller::where('user_id', $data->id)->first();
        $services = Service::where('user_seller_id', $sellerData->id)->get();
        $appointment = Appointment::where('service_id', $sellerData->id)->get();
          return view('seller.main',compact('data','sellerData','services','appointment'));
        }
        
       
      }
      else{
        $sellerData = UserSeller::where('user_id', $data->id)->first();
        $services = Service::where('user_seller_id', $sellerData->id)->get();
        $appointment = Appointment::where('user_seller_id', $sellerData->id)->get();
        return view('seller.main',compact('data','sellerData','services','appointment'));
      }
      
     
        
       
          
      
       
      
  }

  /*
  public function updateProfile(Request $request){
    $request->validate([
        'description' => 'required',
        'birthday' => 'required',
        'gender' => 'required',
        'address' => 'required',
        'contact_number' => 'required',
    ]);

    
    $User_Seller = new UserSeller();
    $User_Seller -> description = $request->description;
    $User_Seller-> birthday = $request->birthday;
    $User_Seller -> gender = $request->gender;
    $User_Seller -> address = $request->address;
    $User_Seller -> contact_number = $request->contact_number;
    $res = $User_Seller ->save();
    if ($res) {
        return back()->with('success','You have successfully registered');
        
    }else{
        return back()->with('error','something wrong');
    }
  }*/

}