<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIkansTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ikans', function (Blueprint $table) {
			$table->id();
			$table->string('nama_ikan');
			$table->string('harga_ikan');
			$table->integer('jumlah');
			$table->unsignedBigInteger('id_jenis');
			$table->foreign('id_jenis')->references('id')->on('jenis_ikans')->onDelete('cascade');
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
		Schema::dropIfExists('ikans');
	}
}
