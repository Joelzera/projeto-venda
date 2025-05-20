<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    // Método para cadastrar um novo produto
    public function store(Request $request)
    {
        // Validação dos dados da requisição
        $request->validate([
            "name" => "required|string|max:100",
            "mark" => "required|string|max:100",
            "description" => "required|string",
            "value" => "required|numeric"
        ]);

        // Criação do produto no banco de dados com os dados recebidos

        $products = Product::create([
            "name" => $request->name,
            "mark" => $request->mark,
            "description" => $request->description,
            "value" => $request->value,
        ]);

        // Retorna o produto criado com status HTTP 201 (Created)

        return response()->json($products, 201);
    }

    // Método para listar todos os produtos
    public function index()
    {
        // Retorna todos os produtos do banco de dados em formato JSON
        return response()->json(Product::all());
    }

         // Método para deletar um produto pelo ID
        public function destroy($id)
    {
        // Busca o produto pelo ID
        $product = Product::find($id);

          // Se não encontrar, retorna erro 404
        if (!$product) {
            return response()->json(['message' => 'produto não encontrado'], 404);
        }

        // Deleta o produto encontrado
        $product->delete();

        // Retorna mensagem de sucesso
        return response()->json(['message' => 'produto deletado com sucesso'], 200);
    }

    // Método para atualizar um produto existente
     public function update(Request $request, $id)
    {
        // Busca o produto pelo ID ou falha com erro 404
        $product = Product::findOrFail($id);
        // Atualiza os dados do produto com os dados recebidos
        $product->update($request->all());
         // Retorna o produto atualizado com status 200
        return response()->json($product, 200);
    }
}
