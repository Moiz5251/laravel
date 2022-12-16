<?php

//A controller class must be defined at the top of the API route
use App\Http\Controllers\ProductControllerDemo;

//Getting the database URL ["products" This is the last API data url] 
Route::get("products", [ProductControllerDemo::class,'index']);