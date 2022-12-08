<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Service;

use App\Models\userSeller;
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
            
            $NewAppointment= new Appointment();
           
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
            
            
            $serviceData = Service::find($id);
            $serviceData->appointments()->save($NewAppointment);
           
            
           
          
            
            return redirect('/feed');
        
    }
    public function ServicePayment($id){
        $data = array();
        if (Session()->has('signInId')){
            $data = User::where('id','=', Session()->get('signInId'))->first();
        }
        $serviceData = Service::find($id);
        return view('feed.payment',compact('serviceData','data',));
        
    }
    public function ShowAllAppointment(){
        $data = array();
    
        if (Session()->has('signInId')){
            $data = User::where('id','=', Session()->get('signInId'))->first();
            

        }
        $sellerData = UserSeller::where('user_id', $data->id)->first();
        $services = Service::where('user_seller_id', $sellerData->id)->get();
        
        $appointment = Appointment::where('service_id', $sellerData->id)->get();
          return view('seller.appointments  ',compact('data','sellerData','services','appointment'));
    }
    
    public function editAppointment(Request $request,$id){
        $appointment = Appointment::find($id);
        $appointment->status  = 'Approved';
        $appointment->save();
        $data = array();
    
        if (Session()->has('signInId')){
            $data = User::where('id','=', Session()->get('signInId'))->first();
            

        }
        $sellerData = UserSeller::where('user_id', $data->id)->first();
        $services = Service::where('user_seller_id', $sellerData->id)->get();
        
        $appointment = Appointment::where('service_id', $sellerData->id)->get();
          return view('seller.appointments  ',compact('data','sellerData','services','appointment'));
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
