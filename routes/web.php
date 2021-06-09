<?php

use Illuminate\Support\Facades\Route;
/**Admin Controllers**/
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\ForgotPasswordController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ApplicationController;
/**Frontend Controllers**/
use App\Http\Controllers\Frontend\HomeController;
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
Route::get('/linkstorage', function () {
    Artisan::call('storage:link'); 
});
/* Admin Routes Start*/
Route::prefix('admin')->group(function () {
	Route::middleware(['auth', 'PreventBackHistory'])->group(function () {
		Route::name('admin.')->group(function () {
			Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
			Route::get('/users', [UserController::class, 'index'])->name('users');
			Route::get('/user/profile', [UserController::class, 'userProfile'])->name('user.profile');
			Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
			Route::get('/applications', [ApplicationController::class, 'index'])->name('applications');
			Route::get('/applications/complete', [ApplicationController::class, 'completeApplications'])->name('application.complete');
			Route::get('/applications/Pending', [ApplicationController::class, 'pendingApplications'])->name('application.pending');
			Route::post('/user/create', [UserController::class, 'saveUser'])->name('create.user');
			Route::put('/update/user/profile/{id}', [UserController::class, 'updateUserProfile'])->name('update.user.profile');
			Route::get('/edit/user/info/{id}', [UserController::class, 'editUserInfo'])->name('edit.user.info');
			Route::put('/update/user/info/{id}', [UserController::class, 'updateUserInfo'])->name('update.user.info');
			Route::delete('/delete/user/{id}', [UserController::class, 'deleteUser'])->name('delete.user');
			Route::post('/changeStatus', [UserController::class, 'changeStatus'])->name('user.status');
			Route::get('/change/password', [UserController::class, 'changePasswordView'])->name('change.password');
			Route::post('/update/password', [UserController::class, 'updatePassword'])->name('update.password');
		});
	});
	Route::get('/login', [LoginController::class, 'index'])->name('admin.login');
	Route::post('/login', [LoginController::class, 'checkLoginRequest'])->name('admin.login.check');
	Route::post('/logout', [LoginController::class, 'logout'])->name('admin.logout');
	Route::get('/forgot/password', [ForgotPasswordController::class, 'index'])->name('admin.forgot-password');
	Route::post('/send/password/reset/link', [ForgotPasswordController::class, 'sendResetLink'])->name('send.reset.link');
	Route::get('/reset/password/{token}', [ForgotPasswordController::class, 'resetPassword'])->name('password.reset');
	Route::post('password/update', [ForgotPasswordController::class, 'updatePassword'])->name('password.update');
});

/* Admin Routes End*/

/** Frontend Route Start */
	Route::get('/', [HomeController::class, 'index'])->name('home');
	Route::get('/aadhar/new-enrolment', [HomeController::class, 'create'])->name('new-enrolment');
	Route::get('/aadhar/update-enrolment', [HomeController::class, 'updateEnrolmentForm'])->name('update-enrolment');
/** Frontend Route End */


