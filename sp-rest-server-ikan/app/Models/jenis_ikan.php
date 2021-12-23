<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jenis_ikan extends Model
{
	use HasFactory;
	protected $guarded = [];

	public function ikans()
	{
		return $this->hasMany(ikan::class, 'id_jenis', 'id');
	}
}
