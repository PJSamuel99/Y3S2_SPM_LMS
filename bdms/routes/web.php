<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ResearchController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\ReportController;


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
    return view('auth.login');
});


Route::middleware(['auth:sanctum', 'verified'])
    ->get('/dashboard','App\Http\Controllers\Controller@dashboard')->name('dashboard');
// Protecting all end-points against un authorized users and SQL Injections
Route::group(['middleware' => 'auth'], function() {


    // Route::get('/user/activity-logs', [ActivityLogController::class, 'index'])->name('user.activity-logs');
    // //Truncate table
    // Route::get('/user/delete-logs', [Controller::class, 'deleteLogs'])->name('user.delete');
    // Route::get('/user/delete-activity-logs', [ActivityLogController::class, 'deleteLogs'])->name('user.activity-log-delete');
    // Route::get('/appointment/custom-create', [AppointmentController::class, 'customCreate'])->name('appointment.customCreate');

    // update password
    Route::get('/user/profile/{id}', [Controller::class, 'profile'])->name('user.profile');
    Route::post('/user/profile/{id}', [Controller::class, 'profileUpdate'])->name('user.profile-update');
    Route::get('/user/update-password', [Controller::class, 'updatePassword'])->name('user.update-password');
    Route::post('/user/update-password', [Controller::class, 'passwordUpdate'])->name('user.password-update');


    

    Route::resources([
    'user' => Controller::class,
    'research-paper' => ResearchController::class,
    'subject' => SubjectController::class,
    'report' => ReportController::class,
]);


});

