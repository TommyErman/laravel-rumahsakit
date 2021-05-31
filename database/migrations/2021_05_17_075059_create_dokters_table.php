<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoktersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dokters', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('poli_id')->unsigned();
            $table->string('name', 100);
            $table->string('alamat', 100);
            $table->string('nomor_telepon', 100);
            $table->timestamps();
        });

        Schema::table('dokters', function (Blueprint $table) {

            $table->foreign('poli_id')->references('id')->on('polis')
                ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dokters');
    }
}
