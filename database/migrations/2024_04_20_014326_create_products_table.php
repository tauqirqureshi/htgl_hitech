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
            $table->string('name');
            $table->string('weight')->nullable();
            $table->string('shape')->nullable();
            $table->string('ri')->nullable();
            $table->string('sg')->nullable();
            $table->string('hardless')->nullable();
            $table->string('micro_obs')->nullable();
            $table->string('comment')->nullable();
            $table->string('color')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
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
