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
        Schema::create('biaya_pendaftarans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('jalur_pendaftaran_id');
            $table->string('biaya');
            $table->string('potongan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('biaya_pendaftaran');
    }
};
