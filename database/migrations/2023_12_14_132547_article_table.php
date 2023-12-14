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
        Schema::create('article', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('gambar_article')->nullable();
            $table->text('content');
            $table->string('kategori')->nullable();
            $table->string('status')->default('Draft'); // Updated default value to 'Draft'
            $table->foreignId('user_id')->constrained('users');
            $table->unsignedBigInteger('kategori_id'); // Foreign key column
            $table->foreign('kategori_id')->references('id')->on('kategori')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('article');
    }
};

