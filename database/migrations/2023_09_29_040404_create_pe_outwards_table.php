<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pe_outwards', function (Blueprint $table) {
            $table->id();
            $table->integer('vno');
            $table->date('vdate');
            $table->foreignId('contact_id')->references('id')->on('contacts');
            $table->foreignId('order_id')->references('id')->on('orders');
            $table->foreignId('style_id')->references('id')->on('styles');
            $table->decimal('total_qty',11,3);
            $table->string('receiver_details',11,3);
            $table->string('active_id', 3)->nullable();
            $table->foreignId('user_id')->references('id')->on('users');
            $table->timestamps();
        });

        Schema::create('pe_outward_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pe_outward_id')->references('id')->on('pe_outwards');
            $table->foreignId('colour_id')->references('id')->on('colours');
            $table->foreignId('size_id')->references('id')->on('sizes');
            $table->decimal('qty',11,3);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pe_outward_items');
        Schema::dropIfExists('pe_outwards');
    }
};
