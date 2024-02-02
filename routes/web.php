<?php

use App\Http\Controllers\ContestController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware(['auth', 'verified','check_is_active'])->prefix('dashboard')->group(function () {

    Route::controller(ProfileController::class)->group(function () {
        Route::get('/', 'dashboard')->name('dashboard');
    });

    Route::controller(\App\Http\Controllers\EmployeeController::class)->middleware('can:show_employees')->group(function () {
        Route::get('/employees/datatable', 'datatable')->name('employees.datatable');
        Route::get('/disableEmployees/{id}', 'disable')->name('employees.disable');
        Route::resource('employees', \App\Http\Controllers\EmployeeController::class);
    });

    Route::controller(\App\Http\Controllers\UserController::class)->middleware('can:show_users')->group(function () {
        Route::get('/users/datatable', 'datatable')->name('users.datatable');
        Route::get('/disableUsers/{id}', 'disable')->name('users.disable');
        Route::resource('users', \App\Http\Controllers\UserController::class);
    });

    Route::controller(\App\Http\Controllers\PermissionController::class)->middleware('can:show_permissions')->group(function () {
        Route::get('/permissions/datatable', 'datatable')->name('permissions.datatable');
        Route::get('/disablePermissions/{id}', 'disable')->name('permissions.disable');
        Route::resource('permissions', \App\Http\Controllers\PermissionController::class);
    });

    Route::controller(\App\Http\Controllers\CategoryController::class)->middleware('can:show_categories')->group(function () {
        Route::get('/categories/datatable', 'datatable')->name('category.datatable');
        Route::get('/disableCategories/{id}', 'disable')->name('category.disable');
        Route::resource('categories', \App\Http\Controllers\CategoryController::class);
    });

    Route::controller(\App\Http\Controllers\SeasonController::class)->middleware('can:show_seasons')->group(function () {
        Route::get('/seasons/datatable', 'datatable')->name('season.datatable');
        Route::get('/disableSeasons/{id}', 'disable')->name('season.disable');
        Route::resource('seasons', \App\Http\Controllers\SeasonController::class);
    });

    Route::controller(\App\Http\Controllers\OrderController::class)->group(function () {
        Route::get('/orders/datatable', 'datatable')->name('order.datatable');
        Route::POST('/orders/create/new', 'createOrder')->name('createOrder');
        Route::get('/orders/datatable/all', 'datatableAllOrders')->middleware('can:show_orders')->name('order.datatable.all');
        Route::get('/orders/orders/all', 'indexAllOrders')->middleware('can:show_orders')->name('contest.orders.all');
        Route::post('/change/status/order/', 'change_status_order')->name('order.change_status_order');
        Route::resource('orders', \App\Http\Controllers\OrderController::class);


        Route::get('/orders/get/cat1', 'GetOrderCat1')->name('GetOrderCat1');
        Route::get('/orders/get/cat2', 'GetOrderCat2')->name('GetOrderCat2');
        Route::get('/orders/get/cat3', 'GetOrderCat3')->name('GetOrderCat3');
        Route::get('/orders/get/cat4', 'GetOrderCat4')->name('GetOrderCat4');
        Route::get('/orders/get/cat5', 'GetOrderCat5')->name('GetOrderCat5');

        Route::post('/orders/create/new/cat', 'createNewOrderCat')->name('createNewOrderCat');

        Route::post('/orders/create/new/cat1', 'createNewOrderCat1')->name('createNewOrderCat1');
        Route::post('/orders/create/new/cat2', 'createNewOrderCat2')->name('createNewOrderCat2');
        Route::post('/orders/create/new/cat3', 'createNewOrderCat3')->name('createNewOrderCat3');
        Route::post('/orders/create/new/cat4', 'createNewOrderCat4')->name('createNewOrderCat4');
        Route::post('/orders/create/new/cat5', 'createNewOrderCat5')->name('createNewOrderCat5');
        Route::post('/orders/create/new/cat6', 'createNewOrderCat6')->name('createNewOrderCat6');
        Route::post('/orders/create/new/test', 'createNewOrderTest')->name('createNewOrderTest');



        Route::POST('/orders/create/cat1', 'createOrderCat1')->name('createOrderCat1');
        Route::POST('/orders/create/cat2', 'createOrderCat2')->name('createOrderCat2');
        Route::POST('/orders/create/cat3', 'createOrderCat3')->name('createOrderCat3');
        Route::POST('/orders/create/cat4', 'createOrderCat4')->name('createOrderCat4');
        Route::POST('/orders/create/cat5', 'createOrderCat5')->name('createOrderCat5');
        Route::POST('/orders/create/cat6', 'createOrderCat6')->name('createOrderCat6');
        Route::POST('/orders/create/test', 'createOrderTest')->name('createOrderTest');
    });


    Route::controller(ContestController::class)->middleware('can:show_contest')->group(function () {
        Route::get('/contests/datatable', 'datatable')->name('contest.datatable');
        Route::get('/disableContests/{id}', 'disable')->name('contest.disable');
        Route::resource('contests', \App\Http\Controllers\ContestController::class);
    });

    Route::controller(\App\Http\Controllers\ContactController::class)->group(function () {
        Route::get('/contacts-requests/datatable', 'datatable')->name('contacts.datatable');
        Route::get('contacts-requests/details/{id}', 'requests')->name('contacts.requests');
        Route::post('contacts-requests/details/reply/{id}', 'reply')->name('contacts.reply');
        Route::resource('contacts', \App\Http\Controllers\ContactController::class);
    });

    Route::resource('profile', ProfileController::class);

});


require __DIR__.'/auth.php';
