<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\SaleItem;

class SaleController extends Controller
{
    public function store(Request $request)
{
    $request->validate([
        "customer" => "required|exists:customers,id",
        "items" => "required|array|min:1",
        "items.*.product_id" => "required|exists:products,id",
        "items.*.qty" => "required|integer|min:1",
        "items.*.total" => "required|numeric|min:0",
    ]);

    // Soma total da venda com base nos itens
    $totalVenda = collect($request->items)->sum(function ($item) {
        return floatval($item['total']);
    });

    // Cria a venda principal
    $sale = Sale::create([
        "customer" => $request->customer,
        "total" => $totalVenda,
    ]);

    // Cria os itens da venda
    foreach ($request->items as $item) {
        SaleItem::create([
            "sale_id" => $sale->id,
            "product_id" => $item["product_id"],
            "qty" => $item["qty"],
            "total" => $item["total"],
        ]);
    }

    return response()->json(["message" => "Venda registrada com sucesso"], 201);
}
}