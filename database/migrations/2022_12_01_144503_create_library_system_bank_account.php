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
        Schema::create('library_system_bank_account', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('card_num')->references('credit_card_num')->on('library_system_member');
            $table->bigInteger('amount')->default(1_000_000);
            $table->timestamps();
        });
        DB::table('library_system_bank_account')->insert(
            array(
                'card_num' =>100100100,
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
        Schema::dropIfExists('library_system_bank_account');
    }
};
