<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarDBController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\StationController;
use App\Http\Controllers\WhereController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\PositDBController;
use App\Http\Controllers\ReqDBController;
use App\Http\Controllers\HistoryController;


use App\Http\Controllers\EvalutionController;

Route::post("login", [\App\Http\Controllers\AuthController::class, 'login']);
Route::post("register", [\App\Http\Controllers\AuthController::class, 'register']);


Route::group(['middleware' => 'auth:sanctum'], function () {

    // USER
    Route::get("user/id/{id}", [\App\Http\Controllers\AuthController::class, 'show']);
    Route::get("user", [\App\Http\Controllers\AuthController::class, 'index']);

    Route::post("logout", [\App\Http\Controllers\AuthController::class, 'logout']);

    // STATUS
    Route::get("status/search/{status}", [\App\Http\Controllers\StatusController::class, 'search']);
    Route::resource('status', StatusController::class);

    // STATION
    Route::resource('station', StationController::class);

    // req
    Route::resource('req', RequestController::class);
    Route::get("req/status/{req}", [\App\Http\Controllers\RequestController::class, 'searchstatus']);
    Route::get("req/search/{c_chassis}", [\App\Http\Controllers\RequestController::class, 'search']);
    Route::get("req/mycar/{fullname}/{car_status}", [\App\Http\Controllers\RequestController::class, 'searchmycar']);
    // POSITION
    Route::get("position/id/{id}", [\App\Http\Controllers\PositionController::class, 'show']);
    Route::get("position/search/{car_where}/{car_line}", [\App\Http\Controllers\PositionController::class, 'search']);
    Route::get("position/status/{car_where}/{position_status}", [\App\Http\Controllers\PositionController::class, 'searchposition']);
    Route::resource('position', PositionController::class);

    /*  //car
    Route::resource('car', CarController::class);
    Route::get("car/status/{car_status}", [\App\Http\Controllers\CarController::class, 'status']);
    Route::get("car/sort/{sort}", [\App\Http\Controllers\CarController::class, 'status_sort']);
    Route::get("car/search/{car_chassis}", [\App\Http\Controllers\CarController::class, 'search']);
    Route::get("car/name/{fullname}", [\App\Http\Controllers\CarController::class, 'searchname']);
    Route::get("car/id/{car_id}", [\App\Http\Controllers\CarController::class, 'saveID']); */

    // WHERE
    Route::resource('where', WhereController::class);
    Route::get("where/s/{status}", [\App\Http\Controllers\WhereController::class, 'searchstatus']);
    Route::get("where/s/w/{status}", [\App\Http\Controllers\WhereController::class, 'searchstatusforweb']);
    Route::get("where/s/w/{status}/{car_where}", [\App\Http\Controllers\WhereController::class, 'search']);


    // POSIT
    Route::resource('posit', PositDBController::class);
    Route::get("posit/where/{car_where}", [\App\Http\Controllers\PositDBController::class, 'PositWhere']);
    Route::get("posit/where/{car_where}/{line}", [\App\Http\Controllers\PositDBController::class, 'PositWhereLine']);
    Route::get("posit/carid/{car_id}", [\App\Http\Controllers\PositDBController::class, 'car_id']);
    Route::get("posit/search/{car_where}/{line}", [\App\Http\Controllers\PositDBController::class, 'search']);
    Route::get("posit/status/{car_status}", [\App\Http\Controllers\PositDBController::class, 'status']);

    // REQ
    Route::resource('reqDB', ReqDBController::class);
    Route::get("reqDB/mycar/{person}", [\App\Http\Controllers\ReqDBController::class, 'searchmycar']);
    Route::get("reqDB/search/{car_id}", [\App\Http\Controllers\ReqDBController::class, 'search']);



    // HISTORY
    Route::resource('history', HistoryController::class);
    Route::get("history/search/{car_id}", [\App\Http\Controllers\HistoryController::class, 'search']);
});




// CAR
Route::resource('cardb', CarDBController::class);
Route::get("cardb/search/{car_chassis}", [\App\Http\Controllers\CarDBController::class, 'search']);
Route::get("cardb/car/id/{car_id}", [\App\Http\Controllers\CarDBController::class, 'showid']);
Route::get("cardb/status/{car_status}", [\App\Http\Controllers\CarDBController::class, 'status']);
Route::get("cardb/sort/{sort}", [\App\Http\Controllers\CarDBController::class, 'status_sort']);
Route::get("cardb/name/{fullname}", [\App\Http\Controllers\CarDBController::class, 'searchname']);
Route::get("cardb/id/{car_id}", [\App\Http\Controllers\CarDBController::class, 'saveID']);



Route::resource('evaluation', EvalutionController::class);
Route::post("chassis", [\App\Http\Controllers\EvalutionController::class, 'chekchassis']);