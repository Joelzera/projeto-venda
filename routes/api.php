<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;

Route::get('/clientes', [CustomerController:: class, 'index']);
Route::get('/produtos', [ProductController::class, 'index']);
Route::get('/marcas', [BrandController:: class, 'index']);
Route::get('/vendas', [SaleController::class, 'index']);


Route::post('/clientes', [CustomerController::class, 'store']);
Route::post('/produtos', [ProductController::class, 'store']);
Route::post('/marcas', [BrandController::class, 'store']);
Route::post('/vendas', [SaleController::class, 'store']);

Route::delete('/clientes/deletar/{id}', [CustomerController::class, 'destroy']);
Route::delete('/produtos/deletar/{id}', [ProductController::class, 'destroy']);
Route::delete('/marcas/deletar/{id}', [BrandController::class, 'destroy']);


