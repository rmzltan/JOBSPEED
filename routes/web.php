<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\UserSellerController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SellerServiceController;
use App\Http\Controllers\AppointmentController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\HomeController;

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

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/add-info', [UserSellerController::class, 'addInfo']);

    Route::post('add-desc', [UserSellerController::class, 'updateProfile']);
    Route::post('/update-skills', [UserSellerController::class, 'updateSkills']);
    Route::delete('/skills/{skill}/names/{name}', [UserSellerController::class, 'deleteSkills']);
    //seller

    Route::get('/Dashboard', [UserSellerController::class, 'dashboard']);
    Route::get('/Add-Service', [UserSellerController::class, 'addService']);

    Route::get('/seller/{id}', [UserSellerController::class, 'profile_seller']);
    
    Route::post('/edit-description', [UserSellerController::class, 'update_description']);

    Route::get('/Add-Service', function () {
        return view('seller.add-service');
    });

    //CRUD
    Route::post('save-service', [SellerServiceController::class, 'saveService']);
    Route::get('edit-service/{id}', [SellerServiceController::class, 'editService']);
    Route::put('update-service/{id}', [SellerServiceController::class, 'updateService']);
    //service details
    Route::get('service-details/{id}', [SellerServiceController::class, 'serviceDetails']);
    Route::delete('service-details/{id}', [SellerServiceController::class, 'deleteService']);

    //feed service details
    Route::get('service-details-jobfeed/{id}', [SellerServiceController::class, 'FeedServiceDetails']);
    Route::get('Appointment/{id}', [SellerServiceController::class, 'ServiceAppointment']);

    // Appointment
    Route::post('save-appointment/{id}', [AppointmentController::class, 'saveAppointment']);
    Route::get('payment/{id}', [AppointmentController::class, 'ServicePayment']);
    Route::get('appointments', [AppointmentController::class, 'ShowAllAppointment'])->name('allAppoinment');
    Route::put('appointments/{id}/update-status-approve', [AppointmentController::class, 'updateStatusApprove']);
    Route::put('appointments/{id}/update-status-complete', [AppointmentController::class, 'updateStatusComplete']);
    Route::put('appointments/{id}/update-status-mark-finished', [AppointmentController::class, 'updateStatusMarkFinished']);

    Route::get('/feed', [CustomAuthController::class, 'feed'])->name('feed');
    
    //User-profile
    Route::get('/profile', [CustomAuthController::class, 'profile_user'])->name('profile_user');
    Route::get('/edit-profile', [CustomAuthController::class, 'edit_profile']);
    Route::post('/update-profile', [CustomAuthController::class, 'updateProfile'])->name('update-profile');
    Route::post('/change-password', [CustomAuthController::class, 'changePassword'])->name('change-password');
   
    
   
});

Route::get('/About-Us.blade.php', function () {
    return view('extra.About-Us');
});

 // review
 Route::post('/services/{id}/reviews', [ReviewController::class, 'store']);
Route::get('/', function () {
    return view('index');
});

Route::get('/index.blade.php', function () {
    return view('index');
});

Route::middleware(['guest'])->group(function () {
    Route::get('/SignIn.blade.php', [CustomAuthController::class, 'login'])->name('login');
    Route::get('/SignUp.blade.php', [CustomAuthController::class, 'registration']);
    Route::post('/register-user', [CustomAuthController::class, 'registerUser'])->name('register-user');
    Route::post('/signIn-user', [CustomAuthController::class, 'signInUser'])->name('signIn-user');
});

//for authentication of the user


Route::get('/logout', [CustomAuthController::class, 'logout']);

//add user description route

//extra
Route::get('/privacy.blade.php', function () {
    return view('extra.privacy');
});


Route::get('/terms.blade.php', function () {
    return view('extra.terms');
});

Auth::routes(['verify' => true]);

Route::get('/home', [HomeController::class, 'index']);
