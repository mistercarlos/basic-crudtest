<?php

use App\Http\Controllers\TransferController;
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
Route::group(['middleware' => ['auth']], function(){
Route::get('/transfer', [TransferController::class, 'index']);
Route::get('/create-transfer', [TransferController::class, 'create'])->name('create.transfer');
Route::post('/store-transfer', [TransferController::class, 'store'])->name('store.transfer');
Route::get('/detail-transfer/{transferId}', [TransferController::class, 'show'])->name('detail.transfer');
Route::get('/download/{transferId}', [TransferController::class, 'download'])->name('download');
Route::get('/approve-transfer/{transferId}', [TransferController::class, 'approval'])->name('approve.transfer');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
