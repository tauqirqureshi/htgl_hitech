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
        Schema::table('products', function (Blueprint $table) {
            //
            $table->string('hitech_no')->nullable();
            $table->string('size')->nullable();
            $table->string('xrays')->nullable();
            $table->string('natural_face')->nullable();
            $table->string('treatment_created_faces')->nullable();
            $table->string('making')->nullable();
            $table->string('indain_name')->nullable();
            $table->string('inclussion')->nullable();
            $table->string('stone_name')->nullable();
			$table->string('species')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            //
        });
    }
};