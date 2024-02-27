<?php

use App\Http\Controllers\DemoController;
use Illuminate\Support\Facades\Route;


Route::get('/',[DemoController::class,'uploadpage']);
Route::post('/upload-file',[DemoController::class,'upload']);