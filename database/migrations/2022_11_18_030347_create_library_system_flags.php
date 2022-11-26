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
        Schema::create('library_system_flags', function (Blueprint $table) {
            $table->decimal('id', 1, 0);
            $table->string('name');
            $table->timestamps();
        });
        DB::table('library_system_flags')->insert(
            array(
                'id' => 1,
                'name' => 'Цахим'
            )
        );
        DB::table('library_system_flags')->insert(
            array(
                'id' => 2,
                'name' => 'Хэвлэмэл'
            )
        );
        DB::table('library_system_flags')->insert(
            array(
                'id' => 3,
                'name' => 'Цахим болон Хэвлэмэл'
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
        Schema::dropIfExists('library_system_flags');
    }
};
