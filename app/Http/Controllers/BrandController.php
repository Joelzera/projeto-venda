<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
     public function store(Request $request)
    {
        $request->validate([
            "name" => "required|string|max:100",
        ]);

        $brands = Brand::create([
            "name" => $request->name,
        ]);

        return response()->json($brands, 201);
    }
}
