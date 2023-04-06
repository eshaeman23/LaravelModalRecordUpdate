<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\usercontroller;
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

Route::get("/create",[usercontroller::class,'create']);
Route::post("/store",[usercontroller::class,'store']);
Route::get("/fetch",[usercontroller::class,'fetch']);
Route::post("/getdata",[usercontroller::class,'getdata']);
Route::post("/update",[usercontroller::class,'update']);


