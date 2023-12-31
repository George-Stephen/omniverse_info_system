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
        Schema::create('tbl_blog', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('author');
            $table->string('title');
            $table->text('content');
            $table->string('featured_image')->nullable();
            $table->date('publication_date')->nullable();
            $table->timestamps();

            $table->foreign('author')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_blog');
    }
};
