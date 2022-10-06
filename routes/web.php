<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\AdminController;

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
    return view('welcome');
});
Route::get('/profile', function () {
    return view('profile');
});

Route::get('/addpet', function () {
    return view('addpet');
});
Route::get('/petprofile', function () {
    return view('petprofile');
});
Route::get('/receipt', function () {
    return view('receipt');
});


Route::get('/consultation', function () {
    return view('consultation');
});

Route::get('/addpet', function () {
    return view('addpet');
});
Route::get('/petprofile', function () {
    return view('petprofile');
});

Route::middleware('authorize:Admin')->group(function () {
    Route::get('/employee', [ViewController::class, 'employee'])->name('employee');
    Route::get('/employee/position/{id}', [ViewController::class, 'edit_position'])->name('employee.edit_position');
    Route::post('/employee/position/{id}', [EmployeeController::class, 'change_position'])->name('employee.change_position');
    Route::get('/employee/delete/{id}', [EmployeeController::class, 'destroy'])->name('employee.delete');
    Route::get('/json/employee', [EmployeeController::class, 'get'])->name('employee.data');
    Route::post('/employee/import', [EmployeeController::class, 'import'])->name('employee.import');
    Route::get('/employee/export', [EmployeeController::class, 'export'])->name('employee.export');

    Route::get('/customer', [ViewController::class, 'customer'])->name('customer');
    Route::get('/json/customer', [CustomerController::class, 'get'])->name('customer.data');
    Route::post('/customer/import', [CustomerController::class, 'import'])->name('customer.import');
    Route::get('/customer/export', [CustomerController::class, 'export'])->name('customer.export');
    Route::get('/customer/deactivate/{id}', [CustomerController::class, 'deactivate'])->name('customer.deactivate');
    Route::get('/customer/activate/{id}', [CustomerController::class, 'activate'])->name('customer.activate');
});

Route::middleware('authorize:Employee')->group(function () {
    Route::get('pet/{id}/consult', [ViewController::class, 'consult'])->name('consult');
    Route::post('pet/{id}/consult', [HistoryController::class, 'store'])->name('consult.add');
});

Route::middleware('authorize:Admin, Employee')->group(function () {
    Route::get('/service', [ViewController::class, 'service'])->name('service');
    Route::get('/service/add', [ViewController::class, 'addService'])->name('service.add');
    Route::get('/service/edit/{id}', [ViewController::class, 'editService'])->name('service.edit');

    Route::get('/json/service', [ServiceController::class, 'get'])->name('service.data');
    Route::post('/service/store', [ServiceController::class, 'store'])->name('service.store');
    Route::post('/service/update/{id}', [ServiceController::class, 'update'])->name('service.update');
    Route::get('/service/delete/{id}', [ServiceController::class, 'destroy'])->name('service.delete');

    Route::get('/pet/edit/{id}', [ViewController::class, 'editPet'])->name('pet.edit');
    Route::post('/pet/update/{id}', [PetController::class, 'update'])->name('pet.update');
    Route::get('/pet/delete/{id}', [PetController::class, 'destroy'])->name('pet.delete');
    Route::get('/pet', [ViewController::class, 'pet'])->name('pet');
    Route::get('/json/pet', [PetController::class, 'get'])->name('pet.data');
    Route::post('/pet/import', [PetController::class, 'import'])->name('pet.import');
    Route::get('/pet/export', [PetController::class, 'export'])->name('pet.export');

    Route::get('/pet/{id}/history', [ViewController::class, 'pet_history'])->name('history');

    Route::get('/json/transaction', [TransactionController::class, 'get'])->name('transaction.data');
    Route::get('/transactions', [ViewController::class, 'transactions'])->name('transactions');
    Route::get('/transaction/{id}/approve', [TransactionController::class, 'transaction_approve'])->name('transaction.approve');
});

Route::middleware('authorize:Customer')->group(function () {
    Route::get('/profile', [ViewController::class, 'profile'])->name('profile');
    Route::post('/profile/update/{id}', [UserController::class, 'update'])->name('user.update');

    Route::get('/pet/add', [ViewController::class, 'addPet'])->name('pet.add');
    Route::post('/pet/store', [PetController::class, 'store'])->name('pet.store');

    Route::get('/transaction', [ViewController::class, 'transaction'])->name('transaction');
    Route::get('/transaction/service/{service}', [ViewController::class, 'transaction_pet'])->name('transaction.pet');
    Route::get('/transaction/service/{service}/pet/{pet}', [TransactionController::class, 'transaction_add'])->name('transaction.add');
    Route::get('/transaction/{id}/delete', [TransactionController::class, 'transaction_delete'])->name('transaction.delete');
    Route::get('/checkout', [ViewController::class, 'checkout'])->name('checkout');
    Route::get('/transaction/add', [TransactionController::class, 'store'])->name('transaction.store');
});

Route::post('/admin/add', [AdminController::class, 'store'])->name('admin.store');
Route::get('/admin/add', [ViewController::class, 'admin_add'])->name('admin.add');
Route::get('/signin', [ViewController::class, 'signin'])->name('signin');
Route::get('/signup', [ViewController::class, 'signup'])->name('signup');
Route::post('/signin', [UserController::class, 'authUser'])->name('user.auth');
Route::get('/signout', [UserController::class, 'logout'])->name('user.logout');
Route::post('/signup', [CustomerController::class, 'store'])->name('customer.store');

Route::get('/employee/add', [ViewController::class, 'addEmployee'])->name('employee.add');
Route::post('/employee/store', [EmployeeController::class, 'store'])->name('employee.store');


Route::get('/services', [ViewController::class, 'services'])->name('services');

Route::get('/service/{id}/comment', [ViewController::class, 'comment'])->name('comment');
Route::get('/service/{id}/comment/add', [ViewController::class, 'comment_add'])->name('comment.add');
Route::post('/service/{id}/comment/add', [CommentController::class, 'store'])->name('comment.store');

Route::get('/chart/pet_illness', [ViewController::class, 'pet_illness'])->name('chart.pet_illness');
Route::get('/json/pet_illness', [ChartController::class, 'pet_illness'])->name('pet_illness.data');
