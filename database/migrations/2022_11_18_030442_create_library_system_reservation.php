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
        /*
        Ном түрээслэхэд түүх нь энд хадгалагдана
        */
        Schema::create('library_system_reservation', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('created_by');
            $table->string('type');
            $table->integer('status')->default(2);
            $table->string('address')->nullable();
            $table->bigInteger('book_id')->references('id')->on('library_system_book');
            $table->date('reserve_date')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->datetime('reserve_datetime')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->date('end_date')->default(DB::raw('ADDDATE(CURRENT_TIMESTAMP, INTERVAl "7" DAY)'));
            $table->integer('returned')->default(1);
            $table->bigInteger('fine')->default(0);
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
