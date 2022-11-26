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
        Schema::create('library_system_roles', function (Blueprint $table) {
            $table->smallInteger('id');
            $table->string('name', 30);
            $table->timestamps();
        });
        DB::table('library_system_roles')->insert(
            array(
                'id' => 1,
                'name' => 'Хэрэглэгч'
            )
        );
        DB::table('library_system_roles')->insert(
            array(
                'id' => 2,
                'name' => 'Худалдагч'
            )
        );
        DB::table('library_system_roles')->insert(
            array(
                'id' => 3,
                'name' => 'Менежир'
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
        Schema::dropIfExists('library_system_roles');
    }
};
