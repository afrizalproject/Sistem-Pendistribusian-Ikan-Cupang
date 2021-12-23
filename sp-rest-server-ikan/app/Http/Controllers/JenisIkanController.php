<?php

namespace App\Http\Controllers;

use App\Models\jenis_ikan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JenisIkanController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$jenisIkans = jenis_ikan::get();
		return response()->json([
			"success" => true,
			"message" => "Daftar Jenis Ikan",
			"data" => $jenisIkans
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
			'jenis' => 'required',
		]);
		if ($validator->fails()) {
			return $this->sendError('Validation Error.', $validator->errors());
		}
		$jenis = jenis_ikan::create($input);
		return response()->json([
			"success" => true,
			"message" => "Jenis ikan telah ditambahkan.",
			"data" => $jenis
		]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Models\jenis_ikan  $jenis_ikan
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		// dd($request->all());
		$input = $request->all();
		$validator = Validator::make($input, [
			'jenis' => 'required',
		]);
		if ($validator->fails()) {
			return $this->sendError('Validation Error.', $validator->errors());
		}
		$data = jenis_ikan::find($id);
		$jenis = $data->update($input);
		return response()->json([
			"success" => true,
			"message" => "Jenis ikan telah diupdate.",
			"data" => $jenis
		]);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\jenis_ikan  $jenis_ikan
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($jenis_ikan)
	{
		jenis_ikan::destroy($jenis_ikan);
		return response()->json([
			"success" => true,
			"message" => "Jenis ikan telah dihapus",
			"data" => $jenis_ikan
		]);
	}
}
