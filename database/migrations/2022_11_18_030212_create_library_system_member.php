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
        Schema::create('library_system_member', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 30);
            $table->string('address', 200);
            $table->string('reg_num', 10)->unique();
            $table->decimal('phone_num', 8, 0)->unique();
            $table->string('email', 100)->unique();
            $table->string('password',64);
            $table->decimal('credit_card_num', 16, 0)->unique()->nullable();
            $table->smallInteger('role')->references('id')->on('library_system_roles')->default(1);
            $table->timestamps();
        });
        DB::table('library_system_member')->insert(
            array(
                'name' => 'Temuuder',
                'email'=> 'narangereltemuuder@icloud.com',
                'address'=> 'nalaikh',
                'reg_num'=> 'UI99100258',
                'phone_num' => '99196406',
                'password' =>md5('manager123'),
                'role'=> '3'

            )
            
        );
        DB::table('library_system_member')->insert(
            array(
                'name' => 'Nurmukhamet',
                'email'=> 'nurkasultan25@gmail.com',
                'address'=> 'nalaikh',
                'reg_num'=> 'UD02250912',
                'phone_num' => '89501512',
                'password' =>md5('admin123'),
                'role'=> '3'

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
        Schema::dropIfExists('library_system_member');
    }
};
