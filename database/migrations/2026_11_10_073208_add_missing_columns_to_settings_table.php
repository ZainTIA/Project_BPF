
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Jika tabel settings belum ada, buat terlebih dahulu.
        if (!Schema::hasTable('settings')) {
            Schema::create('settings', function (Blueprint $table) {
                $table->id();
                $table->string('key')->unique();
                $table->text('value')->nullable();
                $table->string('type')->default('text');
                $table->timestamps();
            });

            return;
        }

        // Jika tabel sudah ada, periksa kolom yang belum tersedia.
        if (!Schema::hasColumn('settings', 'key')) {
            Schema::table('settings', function (Blueprint $table) {
                $table->string('key')->unique();
            });
        }

        if (!Schema::hasColumn('settings', 'value')) {
            Schema::table('settings', function (Blueprint $table) {
                $table->text('value')->nullable();
            });
        }

        if (!Schema::hasColumn('settings', 'type')) {
            Schema::table('settings', function (Blueprint $table) {
                $table->string('type')->default('text');
            });
        }

        if (!Schema::hasColumn('settings', 'created_at')) {
            Schema::table('settings', function (Blueprint $table) {
                $table->timestamp('created_at')->nullable();
            });
        }

        if (!Schema::hasColumn('settings', 'updated_at')) {
            Schema::table('settings', function (Blueprint $table) {
                $table->timestamp('updated_at')->nullable();
            });
        }
    }

    public function down(): void
    {
        // Tidak menghapus data settings.
    }
};
