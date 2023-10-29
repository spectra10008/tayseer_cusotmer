<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FormRequestController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\InstallmentController;
use App\Http\Controllers\PaymentInstallmentController;
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
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth:beneficiaries', 'verified'])->name('dashboard');

Route::middleware(['auth:beneficiaries'])->group(function () {
    Route::get('/complete-profile', [ProfileController::class, 'complete'])->name('profile.complete');
    Route::patch('/complete-profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::middleware(['auth:beneficiaries','is_sign_up'])->group(function () {
        Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
        Route::get('/edit-profile', [ProfileController::class, 'edit'])->name('profile.edit');

        Route::get('/form-request-cancel/{id}', [FormRequestController::class, 'request_cancel'])->name('form-request.cancel');
        Route::post('/form-request-files/upload', [FormRequestController::class, 'upload_files'])->name('form-request.upload_files');
        Route::get('/form-request-files/delete/{id}', [FormRequestController::class, 'delete_files'])->name('form-request.delete_files');

        Route::resource('/form-requests', FormRequestController::class);
        Route::resource('/payment-installment-request', PaymentInstallmentController::class);


        Route::get('/loans', [LoanController::class, 'index'])->name('loans.index');
        Route::get('/loans/{id}', [LoanController::class, 'show'])->name('loans.show');

        Route::get('/installments', [InstallmentController::class, 'index'])->name('installments.index');


    });

});

require __DIR__.'/auth.php';
