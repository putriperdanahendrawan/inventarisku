<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangruangansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barangruangans', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_barang')->unsigned();
            $table->bigInteger('id_ruangan')->unsigned();
            $table->integer('jumlah');
            $table->foreign('id_barang')->references('id')
            ->on('barangs')->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreign('id_ruangan')->references('id')
            ->on('ruangans')->onUpdate('cascade')
            ->onDelete('cascade');

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
        Schema::dropIfExists('barangruangans');
    }
}
