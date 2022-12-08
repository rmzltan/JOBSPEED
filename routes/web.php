<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\UserSellerController;
use App\Http\Controllers\SellerServiceController;
use App\Http\Controllers\AppointmentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/index.blade.php', function () {
    return view('index');
});


//for authentication of the user 
Route::get('/SignIn.blade.php',[CustomAuthController::class,'login']);  
Route::get('/SignUp.blade.php', [CustomAuthController::class,'registration']);
Route::post('/register-user',[CustomAuthController::class,'registerUser'])->name('register-user');
Route::post('/signIn-user',[CustomAuthController::class,'signInUser'])->name('signIn-user');
Route::get('/feed',[CustomAuthController::class,'feed']);
Route::get('/logout',[CustomAuthController::class,'logout']);

//add user description route
Route::get('/add-info',[UserSellerController::class,'addInfo']);

Route::post('update-profile',[UserSellerController::class,'updateProfile']) ->name('update-profile');

//seller

Route::get('/Dashboard',[UserSellerController::class,'dashboard']);
Route::get('/Add-Service',[UserSellerController::class,'addService']);

Route::get('/Add-Service', function () {
    
    return view('seller.add-service');
});

//CRUD
Route::post('save-service',[SellerServiceController::class,'saveService']);
Route::get('edit-service/{id}', [SellerServiceController::class, 'editService']);
Route::put('update-service/{id}', [SellerServiceController::class, 'updateService']);
//service details
Route::get('service-details/{id}',[SellerServiceController::class,'serviceDetails']);
Route::delete('service-details/{id}',[SellerServiceController:: class,'deleteService']);

//feed service details
Route::get('service-details-jobfeed/{id}',[SellerServiceController::class,'FeedServiceDetails']);
Route::get('Appointment/{id}',[SellerServiceController::class,'ServiceAppointment']);


// Appointment
Route::post('save-appointment/{id}',[AppointmentController::class,'saveAppointment']);
Route::get('payment/{id}',[AppointmentController::class,'ServicePayment']);
Route::get('appointments',[AppointmentController::class,'ShowAllAppointment']);
Route::post('edit-appointment/{id}', [AppointmentController::class, 'editAppointment']);
//extra
Route::get('/privacy.blade.php', function () {
    return view('extra.privacy');
});


Route::get('/About-Us.blade.php', function () {
    return view('extra.About-Us');
});
Route::get('/terms.blade.php', function () {
    return view('extra.terms');
});
