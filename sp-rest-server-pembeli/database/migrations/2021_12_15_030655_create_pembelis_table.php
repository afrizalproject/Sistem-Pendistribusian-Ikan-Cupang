<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembelisTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pembelis', function (Blueprint $table) {
			$table->id();
			$table->string('nama_pembeli');
			$table->string('alamat');
			$table->string('no_telp');
			$table->string('namaikan');
			$table->float('total_harga');
			$table->integer('jumlah');
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
		Schema::dropIfExists('pembelis');
	}
}
