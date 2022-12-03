<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Termwind\Components\Raw;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('library_system_extenseion_request', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('created_by');
            $table->bigInteger('res_id');
            $table->integer('status');
            $table->date('issued_date')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('issued_datetime')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->date('accepted_date')->nullable();
            $table->date('accepted_datetime')->nullable();
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
        Schema::dropIfExists('library_system_extenseion_request');
    }
};
