<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->decimal('stock', 12, 2)->default(0)->change();
        });

        Schema::table('order_items', function (Blueprint $table) {
            $table->decimal('quantity', 12, 2)->change();
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->integer('stock')->change();
        });

        Schema::table('order_items', function (Blueprint $table) {
            $table->integer('quantity')->change();
        });
    }
};
