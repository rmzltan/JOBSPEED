<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Service;
use App\Models\Skill;
use App\Models\userSeller;
use App\Models\Appointment;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
class UserSellerController extends Controller
{
    public function addInfo()
    {
        if (Auth::check()) {
            $userId = Auth::id();
            $data = User::where('id', $userId)->first();
        }

        return view('seller.freelancer-add-info', compact('data'));
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'description' => 'required',
            'birthday' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'contact_number' => 'required',
            'profile_image' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $user_sell = new UserSeller();

        $user_sell->description = $request->description;
        $user_sell->birthday = $request->birthday;
        $user_sell->gender = $request->gender;
        $user_sell->address = $request->address;
        $user_sell->contact_number = $request->contact_number;

        if (Auth::check()) {
            $userId = Auth::id();
            $data = User::where('id', $userId)->first();
            $request->session()->put('UserID', $request->birthday);
            $user = User::where('role', $data->role)->first();
            $user->role = 'seller';
            $user->save();

            if ($request->hasfile('profile_image')) {
                $file = $request->file('profile_image');
                $extention = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extention;
                $file->move('Images/uploaded-profile', $filename);
                $user->profile_image = $filename;
                $user->save();
            } elseif ($request->gender == 'Female') {
                $user = User::where('profile_image', $user->profile_image)->first();
                $user->profile_image = 'default-girl.png';
                $user->save();
            } else {
                $user = User::where('profile_image', $user->profile_image)->first();
                $user->profile_image = 'default-boy.png';
                $user->save();
            }
        }
        $user->userSellers()->save($user_sell);

        return redirect('Dashboard');
    }
    public function dashboard(Request $request)
    {
        if (Auth::check()) {
            $userId = Auth::id();
            $data = User::where('id', $userId)->first();
        }

        if ($data->role == 'user') {
            return view('seller.freelancer-add-info', compact('data'));
        } elseif ($data->role == 'seller') {
            $sellerData = UserSeller::where('user_id', $data->id)->first();
            $services = Service::where('user_seller_id', $sellerData->id)->get();
            $appointment = Appointment::where('user_seller_id', $sellerData->id)->get();
            $skills = Skill::where('user_seller_id', $sellerData->id)->get();
            $review = Review::where('user_seller_id', $sellerData->id)->get();
            return view('seller.main', compact('data', 'sellerData', 'services', 'appointment', 'skills', 'review'));
        }
    }
    public function updateSkills(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'user_seller_id' => 'required|exists:user_sellers,id',
        ]);

        $skills = explode(',', $validatedData['name']);

        $skill = new Skill();
        $skill->name = $skills;
        $skill->user_seller_id = $validatedData['user_seller_id'];
        $skill->save();

        return redirect('Dashboard');
    }
    public function deleteSkills($skillId, $nameIndex)
    {
        $skill = Skill::find($skillId);
        $names = collect($skill->name);
        $names->forget($nameIndex);
        $skill->name = $names->all();
        if (empty($skill->name)) {
            $skill->delete();
        } else {
            $skill->save();
        }

        // Redirect the user to the skills list page
        return redirect('/Dashboard');
    }

    public function profile_seller($id)
    {
        $sellerData = UserSeller::where('id', $id)->first();
        $data = User::where('id', $sellerData->user_id)->first();
        $services = Service::where('user_seller_id', $sellerData->id)->get();
        $appointment = Appointment::where('user_seller_id', $sellerData->id)->get();
        $skills = Skill::where('user_seller_id', $sellerData->id)->get();
        $review = Review::where('user_seller_id', $sellerData->id)->get();
        return view('seller.seller-profile', compact('data', 'sellerData', 'services', 'appointment', 'skills', 'review'));
    }

    public function update_description(Request $request)
    {
        $request->validate([
            'description' => 'required',
            'user_seller_id' => 'required'
        ]);

        $user = UserSeller::find($request->user_seller_id);

        if ($user) {
            $user->description = ltrim(rtrim($request->description));
            $user->save();
            return redirect()
                ->back()
                ->with('success', 'Description updated successfully');
        } else {
            return redirect()
                ->back()
                ->with('error', 'User not found');
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
