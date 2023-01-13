<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use App\Models\Service;
use App\Models\User;
use App\Models\UserSeller;
use App\Models\Appointment;
use Illuminate\Support\Facades\Auth;
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
            $data = null;
            if (Auth::check()) {
                $userId = Auth::id();
                $data = User::where('id', $userId)->first();
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
