<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;


Route::post('/clientes', [CustomerController::class, 'store']);
Route::post('/produtos', [ProductController::class, 'store']);
Route::post('/marcas', [BrandController::class, 'store']);
Route::post('/vendas', [SaleController::class, 'store']);
