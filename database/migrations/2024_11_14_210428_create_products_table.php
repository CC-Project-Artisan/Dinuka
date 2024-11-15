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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('productName');
            $table->text('productDescription');
            $table->decimal('productPrice', 10, 2); // Change to decimal
            $table->unsignedBigInteger('category_id'); // Add category_id
            $table->integer('productQuantity');
            $table->json('productImages');
            $table->float('weight')->nullable();
            $table->string('dimensions')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            // $table->unsignedBigInteger('category_id')->nullable()->after('user_id');
            // $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
