<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
   Schema::create('sales', function (Blueprint $table) {
    $table->id();
    $table->unsignedBigInteger('customer');
    $table->decimal('total', 10, 2)->default(0); // <- total da venda
    $table->timestamps();
});
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
