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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title', 50);
            $table->text('text');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('photo_path', 255)->default('default.jpeg');

            $table->timestamps();
            //объявления сортируются по дате
            //для ускоренной сортировки нужно добавить индекс
            $table->index('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
