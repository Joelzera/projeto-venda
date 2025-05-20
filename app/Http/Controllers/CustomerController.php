<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|string|max:100",
            "cpf" => "required|string|max:14",
            "telefone" => "required|string|max:18",
            "email" => "required|string|max:100"
        ]);

        $customers = Customer::create([
            "name" => $request->name,
            "cpf" => $request->cpf,
            "telefone" => $request->telefone,
            "email" => $request->email,
        ]);

        return response()->json($customers);
    }

     public function index()
    {
        return response()->json(Customer::all());
    }
    
}
