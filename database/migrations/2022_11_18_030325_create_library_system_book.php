<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('library_system_book', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title', 100);
            $table->string('author', 30);
            $table->smallInteger('flag');
            $table->string('publisher', 100)->nullable();
            $table->date('published_date')->nullable();
            $table->decimal('isbn', 29, 0)->unique();
            $table->decimal('price', 22, 2);
            $table->text('detail')->nullable();
            $table->integer('category');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('library_system_book');
    }
};
