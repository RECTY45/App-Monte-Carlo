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
        Schema::create('carlo_p_d_s', function (Blueprint $table) {
            $table->id();
            $table->decimal('distribusi_densitas');
            $table->decimal('distribusi_komulatif');
            $table->string('tag_number');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carlo_p_d_s');
    }
};
