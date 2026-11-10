<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();


            $table->foreignId('order_id')
                ->constrained()
                ->cascadeOnDelete();


            $table->string('transaction_code')->unique();


            $table->enum('payment_method', [
                'bank_transfer',
                'e_wallet'
            ]);


            $table->decimal('amount', 12, 2);


            $table->enum('payment_status', [
                'pending',
                'paid',
                'failed',
                'refunded'
            ])->default('pending');


            $table->string('payment_proof')->nullable();


            $table->timestamp('paid_at')->nullable();
            $table->text('admin_note')->nullable();


            $table->timestamps();


            $table->index(['order_id', 'payment_status']);
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
