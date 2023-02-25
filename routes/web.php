<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\OnlineController;


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
    return view('');
});


Route::middleware(['web'])->group(function(){
    Route::get('/',[OnlineController::class,'index'])->name('servers');
    Route::get('/countries/{server}',[OnlineController::class,'countries'])->name('country');
    Route::get('/apps/{server}/{country}',[OnlineController::class,'apps'])->name('apps');
    Route::post('/pay',[OnlineController::class,'pay'])->name('pay');
});

require __DIR__.'/auth.php';

