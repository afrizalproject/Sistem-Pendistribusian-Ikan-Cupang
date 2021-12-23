<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class IkanController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
	function index()
	{
		$client = new Client();
		$data = $client->request(
			'GET',
			'http://127.0.0.1:8001/api/ikan',
		)->getBody()->getContents();

		$jenisikan = $client->request(
			'GET',
			'http://127.0.0.1:8001/api/jenis',
		)->getBody()->getContents();

		$fixData = json_decode($data, true);
		$jenisikan = json_decode($jenisikan, true);
		return view('admin.ikan.index', ['data' => $fixData['data'], 'jenisikan' => $jenisikan['data']]);
	}

	function store(Request $request)
	{
		$client = new Client();;
		$res = $client->request('POST', 'http://127.0.0.1:8001/api/ikan', [
			'json' => [
				'nama_ikan' => $request->nama_ikan,
				'harga_ikan' => $request->harga_ikan,
				'jumlah' => $request->jumlah,
				'id_jenis' => $request->id_jenis
			]
		]);
		return redirect(route('ikan.index'));
	}

	public function update(Request $request, $id)
	{
		$client = new Client();
		$data = $client->request('PUT', 'http://127.0.0.1:8001/api/ikan/' . $id, [
			'json' => [
				'nama_ikan' => $request->nama_ikan,
				'harga_ikan' => $request->harga_ikan,
				'jumlah' => $request->jumlah,
				'id_jenis' => $request->id_jenis
			]
		]);
		return redirect(route('ikan.index'));
	}
	public function destroy($id)
	{
		$client = new Client();
		$data = $client->request('DELETE', 'http://127.0.0.1:8001/api/ikan/' . $id);
		return redirect(route('ikan.index'));
	}
}
