<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('pesanan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('hewan_id')->constrained('hewan')->onDelete('cascade');
            $table->foreignId('layanan_id')->constrained('layanan')->onDelete('cascade');
            $table->date('tanggal_pesanan');
            $table->enum('status', ['pending', 'confirmed', 'in_progress', 'completed', 'cancelled']);
            $table->decimal('total_harga', 10, 2);
            $table->text('catatan')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pesanan');
    }
};