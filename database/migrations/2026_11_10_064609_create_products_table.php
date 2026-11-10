<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();


            $table->foreignId('category_id')
                ->constrained()
                ->restrictOnDelete();


            $table->string('name');
            $table->string('slug')->unique();
            $table->string('sku')->unique();


            $table->text('description')->nullable();


            $table->string('size', 30)->nullable();


            $table->decimal('price', 12, 2);


            $table->unsignedInteger('stock')->default(1);


            $table->enum('condition', [
                'like_new',
                'good',
                'fair'
            ])->default('good');


            $table->enum('status', [
                'available',
                'sold',
                'draft'
            ])->default('available');


            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
