<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFkPenduduksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('penduduks', function(Blueprint $table){
            $table->unsignedBigInteger('dusun_id')->nullable()->after('tanggallahir');
            $table->foreign('dusun_id')->references('id')->on('dusuns');   
        });
            
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('penduduks', function(Blueprint $table){
            $table->dropForeign(['dusun_id']);
        });
    }
}
