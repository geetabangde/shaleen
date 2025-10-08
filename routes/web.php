<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\Admin\PackingTypeController;
use App\Http\Controllers\Admin\LedgerMasterController;
use App\Http\Controllers\Admin\PurchaseController;
use App\Http\Controllers\Admin\SaleController;
use App\Http\Controllers\Admin\BagController;
use App\Http\Controllers\Admin\DynamicModulesController;
use App\Http\Controllers\Admin\ModuleRecordController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\SaleContractController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\AttendanceController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\PermissionController;

// Home route
Route::get('/', fn() => view('welcome'));

// ================= LOGIN / LOGOUT ================= //
Route::prefix('admin')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('admin.login')->middleware('admin.guest');
    Route::get('/register', [LoginController::class, 'userRegister'])->name('admin.UserRegister')->middleware('admin.guest');
    Route::post('/add-register', [LoginController::class, 'store'])->name('admin.newUserRegister');
    Route::post('/login', [LoginController::class, 'login'])->name('admin.login.submit');
    Route::get('/logout', [LoginController::class, 'logout'])->name('admin.logout');
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard')->middleware('auth.admin');
    Route::get('packing-type', [PackingTypeController::class, 'index'])->name('admin.packingType');

    // Ledger Master
    Route::prefix('vendors')->name('admin.ledgerMaster.')->group(function () {
        Route::get('/', [LedgerMasterController::class, 'index'])->name('index');
        Route::get('create', [LedgerMasterController::class, 'create'])->name('create');
        Route::post('store', [LedgerMasterController::class, 'store'])->name('store');
        Route::get('edit/{id}', [LedgerMasterController::class, 'edit'])->name('edit');
        Route::post('update/{id}', [LedgerMasterController::class, 'update'])->name('update');
        Route::get('delete/{id}', [LedgerMasterController::class, 'destroy'])->name('delete');
        Route::get('view/{id}', [LedgerMasterController::class, 'show'])->name('view');
    });

    // Purchase
    Route::prefix('raw-material')->name('admin.purchase.')->group(function () {
        Route::get('/', [PurchaseController::class, 'index'])->name('index');
        Route::get('create', [PurchaseController::class, 'create'])->name('create');
        Route::get('edit/{id}', [PurchaseController::class, 'edit'])->name('edit');
        Route::get('view/{id}', [PurchaseController::class, 'show'])->name('view');
        Route::get('delete/{id}', [PurchaseController::class, 'destroy'])->name('delete');
        Route::post('store', [PurchaseController::class, 'store'])->name('store');
        Route::post('update/{id}', [PurchaseController::class, 'update'])->name('update');
        Route::post('update-status/{id}', [PurchaseController::class, 'updateStatus'])->name('statusupdate');
    });
    // saleContracts
    Route::prefix('sale-international')->name('admin.saleContracts.')->group(function () {
        Route::get('/', [SaleContractController::class, 'index'])->name('index');
        Route::get('create', [SaleContractController::class, 'create'])->name('create');
        Route::get('edit/{id}', [SaleContractController::class, 'edit'])->name('edit');
        Route::get('view/{id}', [SaleContractController::class, 'show'])->name('view');
        Route::get('delete/{id}', [SaleContractController::class, 'destroy'])->name('delete');
        Route::post('store', [SaleContractController::class, 'store'])->name('store');
        Route::post('update/{id}', [SaleContractController::class, 'update'])->name('update');
        Route::post('update-status/{id}', [SaleContractController::class, 'updateStatus'])->name('statusupdate');
    });

    // Sale
    Route::prefix('sale')->name('admin.sale.')->group(function () {
        Route::get('/', [SaleController::class, 'index'])->name('index');
        Route::get('create', [SaleController::class, 'create'])->name('create');
        Route::get('edit/{id}', [SaleController::class, 'edit'])->name('edit');
        Route::get('view/{id}', [SaleController::class, 'show'])->name('view');
        Route::get('delete/{id}', [SaleController::class, 'destroy'])->name('delete');
        Route::post('store', [SaleController::class, 'store'])->name('store');
        Route::post('update/{id}', [SaleController::class, 'update'])->name('update');
        Route::post('sub-sale-store/{id}', [SaleController::class, 'subSaleStore'])->name('subSale.store');
        Route::put('sub-sale/{id}/mark-delivered', [SaleController::class, 'markDelivered'])->name('subSale.markDelivered');
        Route::get('invoice/{sale}/{subSale?}', [SaleController::class, 'invoice'])->name('invoice');

    });

    // Bags
    Route::prefix('bags')->name('admin.bags.')->group(function () {
        Route::get('/', [BagController::class, 'index'])->name('index');
        Route::get('create', [BagController::class, 'create'])->name('create');
        Route::get('edit/{id}', [BagController::class, 'edit'])->name('edit');
        Route::get('view/{id}', [BagController::class, 'show'])->name('view');
        Route::get('delete/{id}', [BagController::class, 'destroy'])->name('delete');
        Route::post('store', [BagController::class, 'store'])->name('store');
        Route::post('update/{id}', [BagController::class, 'update'])->name('update');
        Route::post('update-status/{id}', [BagController::class, 'updateStatus'])->name('Bagstatusupdate');
    });
    //users
     Route::prefix('users')->name('admin.users.')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('create', [UserController::class, 'create'])->name('create');
        Route::get('edit/{id}', [UserController::class, 'edit'])->name('edit');
        Route::get('view/{id}', [UserController::class, 'show'])->name('view');
        Route::get('delete/{id}', [UserController::class, 'destroy'])->name('delete');
        Route::post('store', [UserController::class, 'store'])->name('store');
        Route::post('update/{id}', [UserController::class, 'update'])->name('update');
        Route::get('update-status/{id}', [UserController::class, 'toggleStatus'])->name('toggleStatus');
    });
    // Settings
     Route::prefix('settings')->name('admin.settings.')->group(function () {
        Route::get('/', [SettingController::class, 'index'])->name('index');
        Route::get('create', [SettingController::class, 'create'])->name('create');
        Route::get('edit/{id}', [SettingController::class, 'edit'])->name('edit');
        Route::get('view/{id}', [SettingController::class, 'show'])->name('view');
        Route::get('delete/{id}', [SettingController::class, 'destroy'])->name('delete');
        Route::post('store', [SettingController::class, 'store'])->name('store');
        Route::post('update/{id}', [SettingController::class, 'update'])->name('update');
    });
   

    // Dynamic Modules
    Route::prefix('dynamic-modules')->name('admin.dynamicmodules.')->group(function () {
        Route::get('/', [DynamicModulesController::class, 'index'])->name('index');
        Route::get('create', [DynamicModulesController::class, 'create'])->name('create');
        Route::get('edit/{module}', [DynamicModulesController::class, 'edit'])->name('edit');
        Route::get('delete/{module}', [DynamicModulesController::class, 'destroy'])->name('delete');
        Route::post('update/{module}', [DynamicModulesController::class, 'update'])->name('update');
        Route::post('store', [DynamicModulesController::class, 'store'])->name('store');
    });

    // Modules + Records (nested)
    Route::prefix('modules')->name('admin.modules.')->group(function () {
        Route::resource('/', DynamicModulesController::class)->parameters(['' => 'module']);

        Route::prefix('{module}/records')->name('records.')->group(function () {
            Route::get('/', [ModuleRecordController::class, 'index'])->name('index');
            Route::get('create', [ModuleRecordController::class, 'create'])->name('create');
            Route::post('/', [ModuleRecordController::class, 'store'])->name('store');
            Route::get('{record}/edit', [ModuleRecordController::class, 'edit'])->name('edit');
            Route::get('{record}/view', [ModuleRecordController::class, 'view'])->name('view');
            Route::put('{record}', [ModuleRecordController::class, 'update'])->name('update');
            Route::delete('{record}', [ModuleRecordController::class, 'destroy'])->name('destroy');
        });
    });

    Route::prefix('attendances')->name('admin.attendances.')->middleware(['check.admin.token','auth.admin'])->group(function () {
        Route::get('/', [AttendanceController::class, 'index'])->name('index');
        Route::get('create', [AttendanceController::class, 'create'])->name('create');
        Route::get('edit/{id}', [AttendanceController::class, 'edit'])->name('edit');
        Route::get('view/{id}', [AttendanceController::class, 'show'])->name('view');
        Route::get('delete/{id}', [AttendanceController::class, 'destroy'])->name('delete');
        Route::post('store', [AttendanceController::class, 'store'])->name('store');
        Route::post('update/{id}', [AttendanceController::class, 'update'])->name('update');
        Route::get('update-status/{id}', [AttendanceController::class, 'toggleStatus'])->name('toggleStatus');
    });
    Route::prefix('role')->name('admin.role.')->middleware(['check.admin.token','auth.admin'])->group(function () {
        Route::get('/', [RoleController::class, 'index'])->name('index');
        Route::get('/create', [RoleController::class, 'create'])->name('create');
        Route::post('/store', [RoleController::class, 'store'])->name('store');
        Route::get('/delete/{id}', [RoleController::class, 'destroy'])->name('delete');
        Route::get('/edit/{id}', [RoleController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [RoleController::class, 'update'])->name('update');
    }); 
    // Route::prefix('permissions')->middleware('admin.token.session','auth.admin')->group(function () {
     Route::prefix('permissions')->name('admin.permissions.')->middleware(['check.admin.token','auth.admin'])->group(function () {
        Route::get('/', [PermissionController::class, 'index'])->name('index');
        Route::get('/create', [PermissionController::class, 'create'])->name('create');
        Route::post('/store', [PermissionController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [PermissionController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [PermissionController::class, 'update'])->name('update');
        Route::get('/delete/{id}', [PermissionController::class, 'destroy'])->name('delete');
    });
});
