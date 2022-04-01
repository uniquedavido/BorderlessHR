<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
 
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get('/dashboard', function(){
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Auth::routes(['verify' => true]);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('home');

// Job Routes
Route::get('/', [App\Http\Controllers\JobController::class, 'index']);
Route::get('/jobs/{id}/{job}', [App\Http\Controllers\JobController::class, 'show'])->name('jobs.show');
Route::get('/jobs/create', [App\Http\Controllers\JobController::class, 'create'])->name('jobs.create');
Route::post('/jobs/store', [App\Http\Controllers\JobController::class, 'store'])->name('jobs.store');
Route::get('/job/{id}/edit', [App\Http\Controllers\JobController::class, 'edit'])->name('job.edit');
Route::get('/jobs/my-job', [App\Http\Controllers\JobController::class, 'myjob'])->name('jobs.my-job');
Route::get('/jobs/applications', [App\Http\Controllers\JobController::class, 'applicants'])->name('jobs.applications');
Route::get('/jobs/alljobs', [App\Http\Controllers\JobController::class, 'alljobs'])->name('jobs.alljobs');

// Company Routes
Route::get('/company/{id}/{company}', [App\Http\Controllers\CompanyController::class, 'index'])->name('company.index');
Route::get('/company/create', [App\Http\Controllers\CompanyController::class, 'create'])->name('company.create');
Route::post('/company/create', [App\Http\Controllers\CompanyController::class, 'store'])->name('company.store');
Route::post('/company/coverphoto', [App\Http\Controllers\CompanyController::class, 'coverPhoto'])->name('cover.photo');
Route::post('/company/logo', [App\Http\Controllers\CompanyController::class, 'companyLogo'])->name('company.logo');

// User Profile Routes
Route::get('user/profile', [App\Http\Controllers\UserProfileController::class, 'index'])->name('profile.index');
Route::post('user/profile/create', [App\Http\Controllers\UserProfileController::class, 'store'])->name('profile.create');
Route::post('user/coverletter', [App\Http\Controllers\UserProfileController::class, 'coverletter'])->name('profile.coverletter');
Route::post('user/resume', [App\Http\Controllers\UserProfileController::class, 'resume'])->name('profile.resume');
Route::post('user/avatar', [App\Http\Controllers\UserProfileController::class, 'avatar'])->name('profile.avatar');

// Employer Routes
Route::view('employer/register', 'auth.employer_register')->name('employer.register');
Route::post('emp/register', [App\Http\Controllers\EmployerRegisterController::class, 'employerRegister'])->name('emp.register');
Route::post('/applications/{id}', [App\Http\Controllers\JobController::class, 'apply'])->name('apply');

// Save and Unsave Jobs
Route::post('/save/{id}', [App\Http\Controllers\FavouriteJobController::class, 'saveJob'])->name('save');
Route::post('/unsave/{id}', [App\Http\Controllers\FavouriteJobController::class, 'unsaveJob'])->name('unsave');

// Search
Route::get('/jobs/search', [App\Http\Controllers\JobController::class, 'searchJobs'])->name('jobs.search');