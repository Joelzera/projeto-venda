<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|string|max:100",
            "mark" => "required|string|max:100",
            "description" => "required|string",
            "value" => "required|numeric"
        ]);

        $products = Product::create([
            "name" => $request->name,
            "mark" => $request->mark,
            "description" => $request->description,
            "value" => $request->value,
        ]);

        return response()->json($products, 201);
    }
}
