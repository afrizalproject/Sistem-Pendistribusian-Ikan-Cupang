<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ikan extends Model
{
	use HasFactory;
	protected $fillable = [
		'id',
		'nama_ikan',
		'harga_ikan',
		'jumlah',
		'id_jenis',
	];

	protected $table = 'ikans';
	public function jenis_ikan()
	{
		return $this->belongsTo(jenis_ikan::class, 'id_jenis', 'id');
	}
}
