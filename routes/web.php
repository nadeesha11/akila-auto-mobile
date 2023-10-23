<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\qrcodeController;
use App\Http\Controllers\serviceController;
use App\Http\Controllers\vehicleRegister;
use App\Http\Controllers\vehicleReportController;
use Illuminate\Support\Facades\Route;
use PHPUnit\Framework\Test;
use PHPUnit\TextUI\XmlConfiguration\Group;

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


Route::get('/', [adminController::class,'index']);


// Route::get('/qrcode/{telephone}', [adminController::class,'qrcode']);
Route::get('/qrcode/{telephone}', [qrcodeController::class,'qrcode']);





Route::post('/login', [adminController::class,'login'])->name('login');
Route::get('/logout', [adminController::class,'logout'])->name('logout');



Route::group(['middleware'=>['AuthCheck']],function(){


    Route::get('/dashboard', [dashboardController::class,'index'])->name('dashBoard');




    //start service routes
    Route::get('/services', [serviceController::class,'index'])->name('service');
    Route::post('/services/store', [serviceController::class,'store'])->name('service.store');
    Route::get('/services/recieve',[serviceController::class,'recieve'])->name('service.recieve');
    Route::get('/services/{id}/edit',[serviceController::class,'edit'])->name('service.edit');
    Route::delete('/services/delete/{id}',[serviceController::class,'delete'])->name('service.delete');

    //end service routes


    // start register rouetes
    Route::get('/register',[vehicleRegister::class,'index'])->name('register.index');
    Route::post('/register/store', [vehicleRegister::class,'store'])->name('vehicleRegister.store');
    Route::get('/register/recieve',[vehicleRegister::class,'recieve'])->name('register.recieve');
    Route::get('/register/{id}/more',[vehicleRegister::class,'more'])->name('register.more');
    // let url = '{{ url('register/records') }}'+'/'+record_id;
    
    Route::get('/register/records/{id}',[vehicleRegister::class,'records'])->name('register.records');

    // end register rouetes



    // start vehicle records
    
 
    Route::get('get-services',[vehicleReportController::class,'autotype'])->name('get-services');
    Route::post('/add_issues',[vehicleReportController::class,'add_issue'])->name('vehicleReport.add_issue');


    Route::get('/issues/display/{telephone}',[vehicleReportController::class,'dislpay_issues'])->name('issues.display');



    Route::get('/history/display/{telephone}',[vehicleReportController::class,'dislpay_history'])->name('issues.history');
    Route::delete('/issues/delete/{id}',[vehicleReportController::class,'delete'])->name('vehicleReport.delete');
    Route::get('/issues/{id}/edit',[vehicleReportController::class,'edit'])->name('issues.edit');
    Route::post('/edit_issues',[vehicleReportController::class,'edit_issue'])->name('vehicleReport.edit_issue');
    Route::post('/restore_issues',[vehicleReportController::class,'restore'])->name('vehicleReport.restore');
     // end vehicle records

    
    
    Route::get('/printPrieview/{contact}',[vehicleReportController::class,'print']);
    Route::get('/invoice/{contact}/status',[vehicleReportController::class,'status_update']);
 

    // dashboard start
    Route::get('/dashboard/data',[dashboardController::class,'getdata'])->name('dashboard.data');


     // dashboard end





});









