<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;


class ProductControllerDemo extends Controller

{

	public function index(){

		$products = Product::all();
		return response()->json(['products'=>$products], 200);
	}

}

