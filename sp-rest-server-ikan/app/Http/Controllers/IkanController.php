<?php

namespace App\Http\Controllers;

use App\Models\ikan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class IkanController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$ikans = ikan::with('jenis_ikan')->get();
		return response()->json([
			"success" => true,
			"message" => "Daftar Ikan",
			"data" => $ikans
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
			'nama_ikan' => 'required',
			'harga_ikan' => 'required',
			'jumlah' => 'required',
			'id_jenis' => 'required'
		]);
		if ($validator->fails()) {
			return $this->sendError('Validation Error.', $validator->errors());
		}
		$ikan = ikan::create($input);
		return response()->json([
			"success" => true,
			"message" => "Data ikan telah ditambahkan.",
			"data" => $ikan
		]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Models\ikan  $ikan
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		// dd($request->all());
		$input = $request->all();
		$validator = Validator::make($input, [
			'jumlah' => 'required'
		]);
		if ($validator->fails()) {
			return $this->sendError('Validation Error.', $validator->errors());
		}
		$data = ikan::find($id);
		$ikan = $data->update($input);
		return response()->json([
			"success" => true,
			"message" => "Data ikan telah diupdate.",
			"data" => $ikan
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
		ikan::destroy($ikan);
		return response()->json([
			"success" => true,
			"message" => "Data ikan telah dihapus",
			"data" => $ikan
		]);
	}
}
