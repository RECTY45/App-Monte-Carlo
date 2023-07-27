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
        Schema::create('carlo_r_s', function (Blueprint $table) {
            $table->id();
            $table->string('nilai_random'); 
            $table->string('hasil_kali'); 
            $table->integer('jumlah_pesan_moring'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carlo_r_s');
    }
};
