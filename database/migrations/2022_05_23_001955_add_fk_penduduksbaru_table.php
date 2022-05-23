<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFkPenduduksbaruTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('penduduks', function(Blueprint $table){
            $table->unsignedBigInteger('agama_id')->nullable()->after('dusun_id');
            $table->foreign('agama_id')->references('id')->on('agamas');   
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
            $table->dropForeign(['agama_id']);
        });
    }
}
