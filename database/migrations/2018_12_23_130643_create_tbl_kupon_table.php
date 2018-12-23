<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblKuponTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_kupon', function (Blueprint $table) {
            $table->increments('id_kupon');
            $table->integer('id_barang');
            $table->double('diskon');
            $table->date('tgl_mulai_berlaku');
            $table->date('tgl_expired');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_kupon');
    }
}
