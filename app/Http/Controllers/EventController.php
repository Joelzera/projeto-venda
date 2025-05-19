<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Sale;

class EventController extends Controller
{
    public function index() {

         $brands = Brand::all();
         $customers = Customer::all();
         $products = Product::all();
         $sale = Sale::all();
         return view('home', ['brands' => $brands], ['customers' => $customers], ['products' => $products], ['sale', $sale]);
    }
}
