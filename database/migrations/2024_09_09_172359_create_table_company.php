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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('fantasy_name', 180)->nullable();
            $table->string('cnpj', 20)->unique();
            $table->string('phone', 50)->nullable();
            $table->string('email', 180)->nullable();
            $table->boolean('is_active')->default(true);
            $table->unsignedBigInteger('adress_id');
            $table->foreign('adress_id')->references('id')->on('adresses');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
