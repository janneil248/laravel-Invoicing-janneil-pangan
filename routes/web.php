<?php
use Illuminate\Support\Facades\Auth; 
use App\Http\Controllers\CountryController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\SessionController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/usertest', function () {
    return view('user/users');
});

Route::get('countries', [CountryController::class, 'index']);
Route::get('countries/create', [CountryController::class, 'create']);
Route::get('countries/edit/{id}', [CountryController::class, 'edit']);
Route::get('countries/{id}', [CountryController::class, 'show']);
Route::put('countries/edit/{id}', [CountryController::class, 'update']);
Route::post('countries', [CountryController::class, 'store']);
Route::delete('countries/delete/{id}', [CountryController::class, 'destroy']);
Route::get('countries/user/{id}', [CountryController::class, 'userxbranch']);

Route::get('branches', [BranchController::class, 'index']);
Route::get('branches/create', [BranchController::class, 'create']);
Route::get('branches/edit/{id}', [BranchController::class, 'edit']);
Route::get('branches/{id}', [BranchController::class, 'show']);
Route::put('branches/edit/{id}', [BranchController::class, 'update']);
Route::post('branches', [BranchController::class, 'store']);
Route::delete('branches/delete/{id}', [BranchController::class, 'destroy']);


Route::get('users', [UserController::class, 'index']);
Route::get('users/create', [UserController::class, 'create']);
Route::get('users/edit/{id}', [UserController::class, 'edit']);
Route::get('users/{id}', [UserController::class, 'show']);
Route::put('users/edit/{id}', [UserController::class, 'update']);
Route::post('users', [UserController::class, 'store']);
Route::delete('users/delete/{id}', [UserController::class, 'destroy']);

Route::get('customers', [CustomerController::class, 'index']);
Route::get('customers/create', [CustomerController::class, 'create']);
Route::get('customers/edit/{id}', [CustomerController::class, 'edit']);
Route::get('customers/{id}', [CustomerController::class, 'show']);
Route::put('customers/edit/{id}', [CustomerController::class, 'update']);
Route::post('customers', [CustomerController::class, 'store']);
Route::delete('customers/delete/{id}', [CustomerController::class, 'destroy']);

Route::get('items', [ItemController::class, 'index']);
Route::get('items/create', [ItemController::class, 'create']);
Route::get('items/edit/{id}', [ItemController::class, 'edit']);
Route::get('items/{id}', [ItemController::class, 'show']);
Route::put('items/edit/{id}', [ItemController::class, 'update']);
Route::post('items', [ItemController::class, 'store']);
Route::delete('items/delete/{id}', [ItemController::class, 'destroy']);

Route::get('transactions/{id}', [TransactionController::class, 'show']);
Route::get('transactions/create', [TransactionController::class, 'create']);
Route::post('transactions', [TransactionController::class, 'store']);
Route::delete('transactions/delete/{id}', [TransactionController::class, 'destroy']);
// Route::delete('transactions/deleteitem/{id}', [TransactionController::class, 'destroyItem']);

Route::get('invoices', [InvoiceController::class, 'index']);
Route::get('invoices/create', [InvoiceController::class, 'create']);
Route::get('invoices/{id}', [InvoiceController::class, 'show']);
Route::post('invoices', [InvoiceController::class, 'store']);


Route::get('sales', [SaleController::class, 'index']);

Route::get('login', [SessionController::class, 'index']);
Route::post('/login', [SessionController::class, 'store']);



Auth::routes();

Route::get('/home', [App\Http\Controllers\InvoiceController::class, 'index'])->name('home');
