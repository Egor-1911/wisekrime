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
        Schema::create('beats', function (Blueprint $table) {
            $table->id();
            $table->string('title', 200);
            $table->time('duration');
            $table->integer('bpm');
            $table->string('key', 10);
            $table->decimal('price', 10);
            $table->string('cover_image', 200)->nullable();
            $table->string('audio_file', 200);
            $table->string('genre', 50);
            $table->boolean('availability')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('beats');
    }
};
