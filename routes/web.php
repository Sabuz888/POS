<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Middleware\TokenVerificationMiddleware;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Web API Routes
Route::post('/registration', [UserController::class, 'UserRegistration']);
Route::post('/login', [UserController::class, 'UserLogin']);
Route::post('/otp', [UserController::class, 'sendOTPCode']);
Route::post('/verify-otp', [UserController::class, 'verifyOTPCode']);

// User Logout
Route::get('/logout', [UserController::class, 'logout']);

// Page Routes
Route::get('/', [HomeController::class, 'home']);
Route::get('/userLogin', [UserController::class, 'loginPage']);
Route::get('/userRegistration', [UserController::class, 'registrationPage']);
Route::get('/sendOTP', [UserController::class, 'sendOtpPage']);
Route::get('/verifyOtp', [UserController::class, 'verifyOtpPage']);


Route::middleware([TokenVerificationMiddleware::class])->group(function () {

    // Web API Routes
    Route::post('/resetPass', [UserController::class, 'resetPass']);
    Route::get('/user-profile', [UserController::class, 'userProfile']);
    Route::post('/updateProfile', [UserController::class, 'updateProfile']);

    // Page Routes
    Route::get('/resetPass', [UserController::class, 'resetPassPage']);
    Route::get('/dashboard', [DashboardController::class, 'dashboardPage']);
    Route::get('/userProfile', [UserController::class, 'profilePage']);
    Route::get('/categoryPage', [CategoryController::class, 'CategoryPage']);
    Route::get('/customerPage', [CustomerController::class, 'CustomerPage']);
    Route::get('/productPage', [ProductController::class, 'ProductPage']);
    Route::get('/salePage', [InvoiceController::class, 'SalePage']);
    Route::get('/invoicePage', [InvoiceController::class, 'InvoicePage']);
    Route::get('/reportPage', [ReportController::class, 'ReportPage']);

    // Category API
    Route::post("/create-category", [CategoryController::class, 'CategoryCreate']);
    Route::get("/list-category", [CategoryController::class, 'CategoryList']);
    Route::post("/delete-category", [CategoryController::class, 'CategoryDelete']);
    Route::post("/update-category", [CategoryController::class, 'CategoryUpdate']);
    Route::post("/category-by-id", [CategoryController::class, 'CategoryByID']);

    // Customer API
    Route::post("/create-customer", [CustomerController::class, 'CustomerCreate']);
    Route::get("/list-customer", [CustomerController::class, 'CustomerList']);
    Route::post("/delete-customer", [CustomerController::class, 'CustomerDelete']);
    Route::post("/update-customer", [CustomerController::class, 'CustomerUpdate']);
    Route::post("/customer-by-id", [CustomerController::class, 'CustomerByID']);


    // Product Api
    Route::post("/create-product", [ProductController::class, 'CreateProduct']);
    Route::post("/delete-product", [ProductController::class, 'DeleteProduct']);
    Route::post("/product-by-id", [ProductController::class, 'ProductByID']);
    Route::get("/list-product", [ProductController::class, 'ProductList']);
    Route::post("/update-product", [ProductController::class, 'UpdateProduct']);

    // Invoice Api
    Route::post("/invoice-create", [InvoiceController::class, 'invoiceCreate']);
    Route::get("/invoice-select", [InvoiceController::class, 'invoiceSelect']);
    Route::post("/invoice-details", [InvoiceController::class, 'InvoiceDetails']);
    Route::post("/invoice-delete", [InvoiceController::class, 'invoiceDelete']);

    // Summary & Report
    Route::get("/sales-report/{FormDate}/{ToDate}", [ReportController::class, 'SalesReport']);
    Route::get("/summary", [DashboardController::class, 'Summary']);
});













