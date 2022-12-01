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
        Schema::create('library_system_reservation', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('created_by');
            $table->integer('status')->default(2);
            $table->date('reserve_date');
            $table->datetime('reserve_datetime');
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
        Schema::dropIfExists('library_system_reservation');
    }
};
