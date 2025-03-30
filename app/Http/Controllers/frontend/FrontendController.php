<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Model\Location;
use App\Models\Model\Product;
use App\Models\Model\Rank;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
        public function index (){
            $products = Product::take(3)->get(); // جلب أول 3 منتجات فقط
            $locations = Location::all();
            $ranks = Rank::orderBy('points', 'asc')->get();
            return view('welcome', compact('products','locations','ranks'));
     }


}
