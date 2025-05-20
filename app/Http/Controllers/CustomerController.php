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
    
    public function destroy($id)
    {
        $customer = Customer::find($id);

        if (!$customer) {
            return response()->json(['message' => 'Cliente não encontrado'], 404);
        }

        $customer->delete();

        return response()->json(['message' => 'Cliente deletado com sucesso'], 200);
    }

    public function update(Request $request, $id)
    {
        $cliente = Customer::findOrFail($id);

        $cliente->update($request->all());

        return response()->json($cliente);
    }
}
