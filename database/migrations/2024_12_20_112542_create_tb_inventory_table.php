<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Laravel\Prompts\table;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tb_inventory', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('item_name');
            $table->integer('total_items');
            $table->integer('total_items_good');
            $table->integer('total_items_crash');
            $table->foreignUuid('id_lab')->constrained('tb_lab');
            $table->foreignUuid('id_year')->constrained('tb_year');
            $table->foreignUuid('id_category')->constrained('tb_category');
            $table->text('spesification');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_inventory');
    }
};
