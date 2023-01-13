<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserSeller;
use App\Models\service;
use App\Models\Review;
use App\Models\User;
use App\Models\Skill;
use Illuminate\Support\Facades\Auth;
class SellerServiceController extends Controller
{
    public function saveService(Request $request){
        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'location' => 'required',
            'minPricing' => 'required',
            'maxPricing' => 'required',
            'description' => 'required',
            'service_image' => 'required',
            
        ]);
        
        $NewService= new Service();
       
        $NewService -> title = $request->title;
        $NewService -> category = $request->category;
        $NewService -> location = $request->location;
        $NewService -> minPricing = $request->minPricing; 
        $NewService -> maxPricing = $request->maxPricing;
        $NewService -> description = $request->description;
        
        if($request->hasfile('service_image'))
        {
            $file = $request->file('service_image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('Images\uploaded-services',$filename);
            $NewService->service_image = $filename;
        }
        
        
        if (Auth::check()) {
            $userId = Auth::id();
            $data = User::where('id', $userId)->first();
        }
        $userSeller = UserSeller::where('user_id', $data->id)->first();
        $userSeller->services()->save($NewService);
    
        
       
      
      
        return redirect('Dashboard');
    }
    
    public function serviceDetails($id){
        if (Auth::check()) {
            $userId = Auth::id();
            $data = User::where('id', $userId)->first();
        }
        $serviceData = Service::find($id);
        return view('seller.service-details',compact('serviceData','data',));
        
    }

    public function editService($id)
    {
        if (Auth::check()) {
            $userId = Auth::id();
            $data = User::where('id', $userId)->first();
        }
        $serviceData = service::find($id);
        return view('seller.edit-service',compact('serviceData','data'));
    }

    public function updateService(Request $request,$id)
    {

        $serviceData = service::find($id);
        $serviceData->title = $request->input('title');
        $serviceData->category = $request->input('category');
        $serviceData->location = $request->input('location');
        $serviceData->minPricing = $request->input('minPricing');
        $serviceData->maxPricing = $request->input('maxPricing');
        $serviceData->description = $request->input('description');
        $serviceData->update();
        return redirect()->back()->with('status', 'Service updated successfully');
    }

    public function deleteService(Request $request,$id)
    {
        $serviceData = service::find($id);
        $serviceData -> delete();
        return redirect('Dashboard')->with('message','Service Deleted Successfully');
    }

    public function FeedServiceDetails($id){
        
        $serviceData = Service::find($id);
        $sellerData = UserSeller::where('id','=', $serviceData->user_seller_id)->first();
        $data = User::where('id','=', $sellerData->user_id)->first();
        $skills = Skill::where('user_seller_id', $sellerData->id)->get();
        $review = Review::where('service_id', $serviceData->id)->get();
        return view('feed.service-details-jobfeed',compact('serviceData','data','sellerData','skills','review'));
        
    }
    public function ServiceAppointment($id){
        if (Auth::check()) {
            $userId = Auth::id();
            $data = User::where('id', $userId)->first();
        }
        $serviceData = Service::find($id);
        return view('feed.appointment',compact('serviceData','data',));
        
    }
   
}
