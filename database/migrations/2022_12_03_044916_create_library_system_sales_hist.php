<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    /*
    Зарагдсан номний түүх энд хадгалагдан
    */
    public function up()
    {
        Schema::create('library_system_sales_hist', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('created_by');
            $table->integer('status')->default(2);
            $table->string('address')->nullable();
            $table->bigInteger('book_id')->references('id')->on('library_system_book');
            $table->date('selled_date')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->datetime('selled_datetime')->default(DB::raw('CURRENT_TIMESTAMP'));
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
        Schema::dropIfExists('library_system_sales_hist');
    }
};
