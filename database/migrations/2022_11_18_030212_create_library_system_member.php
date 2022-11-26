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
        Schema::create('library_system_member', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 30);
            $table->string('address', 200);
            $table->string('reg_num', 10)->unique();
            $table->decimal('phone_num', 8, 0)->unique();
            $table->string('email', 100)->unique();
            $table->decimal('credit_card_num', 16, 0)->unique()->nullable();
            $table->smallInteger('role')->references('id')->on('library_system_roles');
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
        Schema::dropIfExists('library_system_member');
    }
};
