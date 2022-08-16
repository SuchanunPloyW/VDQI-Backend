<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\StationController;
use App\Http\Controllers\WhereController;
use App\Http\Controllers\PositionController;

Route::post("login",[\App\Http\Controllers\AuthController::class,'login']);
Route::post("register",[\App\Http\Controllers\AuthController::class,'register']);


    Route::group(['middleware' => 'auth:sanctum'], function(){

    Route::post("logout",[\App\Http\Controllers\AuthController::class,'logout']);

    // USER
    Route::get("user/id/{id}",[\App\Http\Controllers\AuthController::class,'show']);
    Route::get("user",[\App\Http\Controllers\AuthController::class,'index']);
    

    

    
    // STATUS
    Route::get("status/search/{status}",[\App\Http\Controllers\StatusController::class,'search']);
    Route::resource('status', StatusController::class);

    // STATION
    Route::resource('station', StationController::class);
 
    
   // WHERE
    Route::resource('where', WhereController::class);
    
   // req
    Route::resource('req', RequestController::class); 
    Route::get("req/status/{req}",[\App\Http\Controllers\RequestController::class,'searchstatus']);
    Route::get("req/search/{c_chassis}",[\App\Http\Controllers\RequestController::class,'search']);

    
    // POSITION
    Route::get("position/id/{id}",[\App\Http\Controllers\PositionController::class,'show']);
    Route::get("position/search/{car_where}/{car_line}",[\App\Http\Controllers\PositionController::class,'search']);
    Route::get("position/status/{car_where}/{position_status}",[\App\Http\Controllers\PositionController::class,'searchposition']);
    Route::resource('position', PositionController::class);

    });
    
    //car
    Route::resource('car', CarController::class);
    Route::get("car/search/{car_chassis}",[\App\Http\Controllers\CarController::class,'search']);
    Route::get("car/name/{fullname}",[\App\Http\Controllers\CarController::class,'searchname']);



    
      
       

   