<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;

class SaleController extends Controller
{
     public function store(Request $request)
    {
        $request->validate([
            "customer" => "required|string",
            "product" => "required|string",
            "qty" => "required|integer",
            "total" => "required|numeric"
        ]);

        $sales = Sale::create([
            "customer" => $request->customer,
            "product" => $request->product,
            "qty" => $request->qty,
            "total" => $request->total,
        ]);

        return response()->json($sales, 201);
    }

    public function index()
    {
        return response()->json(Sale::all());
    }
}
