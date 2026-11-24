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
        Schema::create('mixing', function (Blueprint $table) {
            $table->id();
            $table->foreignId('engineer_id')->constrained('engineers')->onDelete('cascade');
            $table->string('name', 200);
            $table->string('audio_file', 200);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mixing');
    }
};
