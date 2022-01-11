<?php

use Illuminate\Support\Facades\Route;

use App\Http\Livewire\Auth\ForgotPassword;
use App\Http\Livewire\Auth\ResetPassword;
use App\Http\Livewire\Auth\SignUp;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Billing;
use App\Http\Livewire\Profile;
use App\Http\Livewire\Tables;
use App\Http\Livewire\StaticSignIn;
use App\Http\Livewire\StaticSignUp;
use App\Http\Livewire\Rtl;
use App\Http\Livewire\Category\CategoryCreate;
use App\Http\Livewire\Category\CategoryEdit;
use App\Http\Livewire\OrderAdmin\OrderCreate;
use App\Http\Livewire\OrderAdmin\OrderEdit;
use App\Http\Livewire\Complains;
use App\Http\Livewire\ComplainReplay\Reply;



use App\Http\Livewire\LaravelExamples\UserProfile;
use App\Http\Livewire\LaravelExamples\UserManagement;

use App\Http\Controllers\frontend\Mainpage;
use App\Http\Controllers\frontend\Events;
use App\Http\Controllers\frontend\Gallery;
use App\Http\Controllers\frontend\Contact;
use App\Http\Controllers\frontend\About;
use App\Http\Controllers\frontend\Actors;
use App\Http\Controllers\frontend\Order;
use App\Http\Controllers\frontend\Complain;

use Illuminate\Http\Request;

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
Route::get('/',[Mainpage::class, 'index'])->name('main');
Route::get('/events/{id}',[Events::class, 'index'])->name('events');
Route::get('/events-detail/{id}',[Events::class, 'detail'])->name('events-detail');
Route::get('/checkout/{id}',[Events::class, 'checkout'])->name('checkout');
Route::get('/gallery',[Gallery::class, 'index'])->name('gallery');
Route::get('/aboutus',[About::class, 'index'])->name('aboutus');
Route::get('/contactus',[Contact::class, 'index'])->name('contactus');
Route::get('/signin',[Actors::class, 'signin'])->name('signin');
Route::get('/register',[Actors::class, 'register'])->name('register');
Route::post('/storeUser',[Actors::class, 'storeUser']);
Route::post('/do_login',[Actors::class, 'do_login']);
Route::post('/storeOrder',[Order::class, 'storeOrder']);
Route::get('/payment/{any}',[Order::class, 'payment'])->name('payment');
Route::get('/payment',[Order::class, 'paymentList'])->name('paymentList');
Route::post('/uploadStruk',[Order::class, 'uploadStruk'])->name('uploadStruk');

Route::get('/complain',[Complain::class, 'index'])->name('complain');
Route::post('/storeComplain',[Complain::class, 'storeComplain']);

Route::get('/logout',[Actors::class, 'logout'])->name('logout');

Route::get('/generatePDF/{any}', [Order::class, 'generatePDF']);

Route::get('/adminpanel', Login::class)->name('login');

Route::get('/sign-up', SignUp::class)->name('sign-up');
Route::get('/adminpanel/login', Login::class)->name('login');

Route::get('/login/forgot-password', ForgotPassword::class)->name('forgot-password');
 
Route::get('/reset-password/{id}',ResetPassword::class)->name('reset-password')->middleware('signed');

Route::middleware('auth')->group(function () { //admin panel routes

    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/billing', Billing::class)->name('billing');
    Route::get('/complains', Complains::class)->name('complains');
    Route::get('/profile', Profile::class)->name('profile');
    Route::get('/tables', Tables::class)->name('tables');
    Route::get('/static-sign-in', StaticSignIn::class)->name('sign-in');
    Route::get('/static-sign-up', StaticSignUp::class)->name('static-sign-up');
    Route::get('/rtl', Rtl::class)->name('rtl');
    Route::get('/laravel-user-profile', UserProfile::class)->name('user-profile');
    Route::get('/laravel-user-profile/{id}', UserProfile::class)->name('user-profile-edit');
    Route::get('/laravel-user-management', UserManagement::class)->name('user-management');
    Route::get('/category-create', CategoryCreate::class)->name('category-create');
    Route::get('/category-edit/{id}', CategoryEdit::class)->name('category-edit');
    Route::get('/order-create', OrderCreate::class)->name('order-create');
    Route::get('/order-edit/{id}', OrderEdit::class)->name('order-edit');
    Route::get('/order-cancel/{id}', [OrderEdit::class, 'orderCancel'])->name('order-cancel');
    Route::get('/payment-approve/{id}', [Rtl::class, 'paymentApprove'])->name('payment-approve');
    Route::get('/payment-decline/{id}', [Rtl::class, 'paymentDecline'])->name('payment-decline');
    Route::get('/reply-ticket/{id}', Reply::class)->name('reply-ticket');
    Route::post('/sendEmail', [Reply::class,'sendEmail']);
    Route::get('/delete-ticket/{id}', [Reply::class, 'deleteTicket'])->name('delete-ticket');
    Route::get('billing/generatePDF/{id}', [Billing::class, 'generatePDF'])->name('billing/generatePDF');
    Route::get('billing/downloadPDF', [Profile::class, 'downloadPDF'])->name('billing/downloadPDF');
});




