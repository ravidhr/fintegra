<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblMasterBarangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_master_barang', function (Blueprint $table) {
            $table->increments('id_barang');
            $table->integer('kategori_id');
            $table->string('nm_barang');
            $table->integer('harga_beli');
            $table->integer('harga_jual');
            $table->integer('id_supplier');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_master_barang');
    }
}
