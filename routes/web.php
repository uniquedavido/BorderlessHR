<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/', [App\Http\Controllers\JobController::class, 'index']);
Route::get('/jobs/{id}/{job}', [App\Http\Controllers\JobController::class, 'show'])->name('jobs.show');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

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