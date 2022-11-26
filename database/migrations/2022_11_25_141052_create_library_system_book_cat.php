<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('library_system_book_cat', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 30);
            $table->timestamps();
        });
        DB::table('library_system_book_cat')->insert(
            array(
                'name' => 'Adventure'
            )
        );
        DB::table('library_system_book_cat')->insert(
            array(
                'name' => 'Fantasy'
            )
        );
        DB::table('library_system_book_cat')->insert(
            array(
                'name' => 'Isekai'
            )
        );
        DB::table('library_system_book_cat')->insert(
            array(
                'name' => 'Temuuder'
            )
        );
        DB::table('library_system_book_cat')->insert(
            array(
                'name' => 'Professional'
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('library_system_book_cat');
    }
};
