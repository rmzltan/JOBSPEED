<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Appointment;
use App\Models\UserSeller;
use App\Models\Service;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
           if (Auth::check()) {
            $userId = Auth::id();
            $data = User::where('id', $userId)->first();
            $serviceswithusers =  DB::table('service')
                ->join('user_sellers', 'service.user_seller_id', '=', 'user_sellers.id')
                ->join('users', 'user_sellers.user_id', '=', 'users.id')
                ->select('users.FirstName', 'users.LastName')
                ->get();
             $servicePage = Service::orderBy('created_at', 'desc')->paginate(8);
        }
        return view('Feed', compact('data', 'serviceswithusers', 'servicePage'));
    }
}
