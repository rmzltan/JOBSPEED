<?php

namespace App\Http\Controllers;

use App\Mail\TestEmail;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Models\UserSeller;
class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function saveAppointment (Request $request,$id)
    {
            $request->validate([
                'FirstName' => 'required',
                'LastName' => 'required',
                'date' => 'required',
                'time' => 'required',
                'email' => 'required',
                'contact' => 'required',
                'city' => 'required',
                'street' => 'required',
                'message' => 'required',
                'payment' => 'required',
                
            ]);
            $request->request->add(['user_id' => auth()->id()]);
           
            // Set the service_id and user_seller_id fields based on the service
            $service = Service::find($id);
            
            $request->request->add(['service_id' => $service->id]);
            $request->request->add(['user_seller_id' => $service->user_seller_id]);
            $NewAppointment= new Appointment();
            $NewAppointment->user_id = $request->user_id;
            $NewAppointment->service_id = $request->service_id;
            $NewAppointment->user_seller_id = $request->user_seller_id;
            $NewAppointment -> FirstName = $request->FirstName;
            $NewAppointment -> LastName = $request->LastName;
            $NewAppointment -> date = $request->date;
            $NewAppointment -> time = $request->time; 
            $NewAppointment -> email = $request->email;
            $NewAppointment -> contact = $request->contact;
            $NewAppointment -> city = $request->city;
            $NewAppointment -> street = $request->street;
            $NewAppointment -> message = $request->message;
            $NewAppointment -> payment = $request->payment;
            
            
            $NewAppointment->save();
           
            $sellerID = UserSeller::where('id', '=', $service->user_seller_id)->first();
            $userSeller = User::where('id', '=', $sellerID->user_id)->first();
            $mailData = [
                "FirstName" => $userSeller->email
                ];
            Mail::to($userSeller->email)->send(new TestEmail($mailData));
          
            return redirect('/feed');
        
    }
    public function ServicePayment($id){
        if (Auth::check()) {
            $userId = Auth::id();
            $data = User::where('id', $userId)->first();
        }
        $serviceData = Service::find($id);
        return view('feed.payment',compact('serviceData','data',));
        
    }
    public function ShowAllAppointment(){
        if (Auth::check()) {
            $userId = Auth::id();
            $data = User::where('id', $userId)->first();
        }
        
        $sellerData = UserSeller::where('user_id', $data->id)->first();
        $services = Service::where('user_seller_id', $sellerData->id)->get();
        $appointments = Appointment::where('user_seller_id', $sellerData->id)->get();
          return view('seller.appointments  ',compact('data','sellerData','services','appointments'));
    }
    
    public function updateStatusApprove($id)
        {
            // Retrieve the appointment with the given ID
            $appointment = Appointment::find($id);
            // Update the status column
            $appointment->status = 'ongoing';
            // Save the changes
            $appointment->save();
            // Redirect the user back to the previous page
            return back();
        }
    public function updateStatusComplete($id)
        {
            // Retrieve the appointment with the given ID
            $appointment = Appointment::find($id);
            // Update the status column
            $appointment->status = 'completed';
            // Save the changes
            $appointment->save();
            // Redirect the user back to the previous page
            return back();
        }
        public function updateStatusMarkFinished($id)
        {
            // Retrieve the appointment with the given ID
            $appointment = Appointment::find($id);
            // Update the status column
            $appointment->status = 'waiting for payment release';
            // Save the changes
            $appointment->save();
            // Redirect the user back to the previous page
            return back();
        }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function show(Appointment $appointment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function edit(Appointment $appointment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Appointment $appointment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment $appointment)
    {
        //
    }
}
