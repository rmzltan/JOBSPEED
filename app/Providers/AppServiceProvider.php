<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use App\Models\Service;
use App\Models\User;
use App\Models\UserSeller;
use App\Models\Appointment;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        view()->composer('*', function ($view)
        {
            $data = array();
            if (Session()->has('signInId')){
                $data = User::where('id','=', Session()->get('signInId'))->first();
            }
            $sellerData = UserSeller::get();
            $serviceData = Service::get();
            $appointmentData = Appointment::get();
            
            View::share('sellerData', $sellerData);
            View::share('serviceData', $serviceData);
            View::share('data', $data);
            View::share('appointmentData', $appointmentData);
        });
    }
}
