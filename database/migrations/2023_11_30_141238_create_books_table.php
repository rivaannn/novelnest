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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
<<<<<<< HEAD
            $table->string('title');
            $table->text("description");
            $table->string("price");
            $table->string("book_number")->default('');
            $table->integer("writter_id");
=======
            $table->string('judul');
            $table->text("sinopsis");
            $table->float("price");
            $table->float("isbn");
            $table->integer("writer_id");
>>>>>>> main
            $table->integer("publisher_id");
            $table->integer('category_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
