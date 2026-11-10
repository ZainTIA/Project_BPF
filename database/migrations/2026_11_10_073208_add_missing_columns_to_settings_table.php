<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{
    public function up(): void
    {
        Schema::table('settings', function (Blueprint $table) {
            if (!Schema::hasColumn('settings', 'value')) {
                $table->text('value')->nullable();
            }


            if (!Schema::hasColumn('settings', 'type')) {
                $table->string('type')->default('text');
            }


            if (!Schema::hasColumn('settings', 'created_at')) {
                $table->timestamp('created_at')->nullable();
            }


            if (!Schema::hasColumn('settings', 'updated_at')) {
                $table->timestamp('updated_at')->nullable();
            }
        });
    }


    public function down(): void
    {
        Schema::table('settings', function (Blueprint $table) {
            // Tidak menghapus kolom agar data tetap aman.
        });
    }
};
