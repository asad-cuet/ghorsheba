<?php

use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\Customer\CustomerDashboardComponent;
use App\Http\Livewire\Sprovider\SproviderDashboardComponent;
use App\Http\Livewire\Sprovider\SproviderProfileComponent;
use App\Http\Livewire\Customer\CustomerProfileComponent;
use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\Admin\OrderDetailsComponent;
use App\Http\Livewire\Admin\OrderViewComponent;
use App\Http\Livewire\ServiceCategoriesComponent;
use App\Http\Livewire\Admin\AdminServiceCategoryComponent;
use App\Http\Livewire\Admin\AdminAddServiceCategoryComponent;
use App\Http\Livewire\Admin\AdminEditServiceCategoryComponent;
use App\Http\Livewire\ServiceCategoriesDetailComponent;
use App\Http\Livewire\ContactComponent;
use App\Http\Livewire\Admin\AdminContactComponent;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\BookController;         // Ordering Backend here
use App\Http\Controllers\HandleOrderController;
use App\Http\Livewire\TermsOfUseComponent;
use App\Http\Livewire\AboutUsComponent;
use App\Http\Livewire\PrivacyComponent;
use App\Http\Livewire\UserEditProfileComponent;
use App\Http\Livewire\UserProfileComponent;
use App\Http\Livewire\Sprovider\EditSproviderProfileComponent;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminStudentController;
use App\Http\Controllers\AdminSVPController;
// use App\Http\Controllers\RegistrationController;

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



// Route::get('/', function () {return view('home');})->name('home');

Route::get('/',HomeComponent::class)->name('home');

Route::get('/service-category-view/{category_id}',ServiceCategoriesDetailComponent::class)->name('home.service_category_view');

Route::get('/service-categories',ServiceCategoriesComponent::class)->name('home.service_categories');
Route::get('/contact-us',ContactComponent::class)->name('home.contact');
Route::get('/terms-of-use',TermsOfUseComponent::class)->name('home.terms_of_use');
Route::get('/about-us',AboutUsComponent::class)->name('home.about_us');
Route::get('/privacy',PrivacyComponent::class)->name('home.privacy');

Route::get('/autocomplete',[SearchController::class,'autocomplete'])->name('autocomplete');
Route::post('/search',[SearchController::class,'searchService'])->name('searchService');
// Route::get('/register', [RegistrationController::class,'index']);
// Route::post('/register',[RegistrationController::class,'register']);

//For Customer
// Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {
//     Route::get('/customer/dashboard', [CustomerDashboardComponent::class,'render'])->name('customer.dashboard');
// });

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('/customer/dashboard',CustomerDashboardComponent::class)->name('customer.dashboard');
    Route::get('/customer/book/cod/{id?}',[BookController::class,'Cod'])->name('customer.book');
    Route::post('/customer/book/online/{id?}',[BookController::class,'online'])->name('customer.online');
    Route::get('/user/profile',UserProfileComponent::class)->name('user.profile');
    Route::get('/user/profile/edit',UserEditProfileComponent::class)->name('user.editprofile');
});


//For Service Provider
// Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified','authsprovider'])->group(function () {
//     Route::get('/sprovider/dashboard', [SproviderDashboardComponent::class,'render'])->name('sprovider.dashboard');
// });
Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified','authsprovider'])->group(function () {
    Route::get('/sprovider/dashboard',SproviderDashboardComponent::class)->name('sprovider.dashboard');
    Route::get('/sprovider/profile',SproviderProfileComponent::class)->name('sprovider.profile');
    Route::get('/sprovider/profile/edit',EditSproviderProfileComponent::class)->name('sprovider.edit_profile');
    Route::get('/sprovider/order-complete/{order_id}',[HandleOrderController::class,'provider_complete'])->name('sprovider.provider_complete');
});

//For Admin
// Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified', 'authadmin'])->group(function () {
//     Route::get('/admin/dashboard',[AdminDashboardComponent::class,'render'])->name('admin.dashboard');
// });

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified', 'authadmin'])->group(function () {
    
    Route::get('/admin/service-categories',AdminServiceCategoryComponent::class)->name('admin.service_categories');
    Route::get('/admin/dashboard',AdminDashboardComponent::class)->name('admin.dashboard');
    Route::get('/admin/service-category/add',AdminAddServiceCategoryComponent::class)->name('admin.add_service_category');
    Route::get('/admin/service-category/edit/{category_id}',AdminEditServiceCategoryComponent::class)->name('admin.edit_service_category');
    Route::get('/admin/contacts',AdminContactComponent::class)->name('admin.contacts');
    Route::get('/admin/new-order',OrderDetailsComponent::class)->name('admin.new-order');
    Route::get('/admin/order-view/{order_id?}',OrderViewComponent::class)->name('admin.new-view');
    Route::get('/admin/payment-accepted/{id?}',[HandleOrderController::class,'payment_accepted'])->name('admin.payment-completed');
    Route::get('/admin/order-completed/{id?}',[HandleOrderController::class,'order_completed'])->name('admin.order-completed');
    Route::post('/admin/order-to-provider/{order_id?}',[HandleOrderController::class,'order_to_provide'])->name('admin.order-completed');
    
    Route::get('/admin/students',[AdminStudentController::class,'index'])->name('admin.students');
    Route::get('/admin/students/create',[AdminStudentController::class,'create'])->name('admin.students.create');
    Route::post('/admin/students/store',[AdminStudentController::class,'store'])->name('admin.students.store');
    Route::get('/admin/students/edit/{id}',[AdminStudentController::class,'edit'])->name('admin.students.edit');
    Route::post('/admin/students/store/{id}',[AdminStudentController::class,'update'])->name('admin.students.update');
    Route::get('/admin/students/destroy/{id}',[AdminStudentController::class,'destroy'])->name('admin.students.destroy');

    Route::get('/admin/service-providers',[AdminSVPController::class,'index'])->name('admin.service-providers');
    Route::get('/admin/service-providers/create',[AdminSVPController::class,'create'])->name('admin.service-providers.create');
    Route::post('/admin/service-providers/store',[AdminSVPController::class,'store'])->name('admin.service-providers.store');
    Route::get('/admin/service-providers/edit/{id}',[AdminSVPController::class,'edit'])->name('admin.service-providers.edit');
    Route::post('/admin/service-providers/store/{id}',[AdminSVPController::class,'update'])->name('admin.service-providers.update');
    Route::get('/admin/service-providers/destroy/{id}',[AdminSVPController::class,'destroy'])->name('admin.service-providers.destroy');
});