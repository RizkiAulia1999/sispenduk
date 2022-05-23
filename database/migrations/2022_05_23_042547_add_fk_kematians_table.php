<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFkKematiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kematians', function(Blueprint $table){
            $table->unsignedBigInteger('penduduk_id')->nullable()->after('id');
            $table->foreign('penduduk_id')->references('id')->on('penduduks');   
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kematians', function(Blueprint $table){
            $table->dropForeign(['penduduk_id']);
        });
    }
}
