<?php

namespace App\Http\Controllers;

use App\Models\Pembeli;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PembeliController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$pembelis = Pembeli::get();
		return response()->json([
			"success" => true,
			"message" => "List transaksi pembelian",
			"data" => $pembelis
		]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$input = $request->all();
		$validator = Validator::make($input, [
			'nama_pembeli' => 'required',
			'alamat' => 'required',
			'no_telp' => 'required',
			'namaikan' => 'required',
			'total_harga' => 'required',
			'jumlah' => 'required'
		]);
		if ($validator->fails()) {
			return $this->sendError('Validation Error.', $validator->errors());
		}
		$pembeli = Pembeli::create($input);
		return response()->json([
			"success" => true,
			"message" => "Transaksi pembelian telah ditambahkan.",
			"data" => $pembeli
		]);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\ikan  $ikan
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($ikan)
	{
		Pembeli::destroy($ikan);
		return response()->json([
			"success" => true,
			"message" => "Transaksi pembelian telah dihapus",
			"data" => $ikan
		]);
	}
}
