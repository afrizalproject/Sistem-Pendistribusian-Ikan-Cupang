<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TransaksiController extends Controller
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
			'http://127.0.0.1:8002/api/transaksi',
		)->getBody()->getContents();

		$ikan = $client->request(
			'GET',
			'http://127.0.0.1:8001/api/ikan',
		)->getBody()->getContents();

		$fixData = json_decode($data, true);
		$fixIkan = json_decode($ikan, true);
		return view('admin.transaksi.index', ['data' => $fixData['data'], 'fixIkan' => $fixIkan['data']]);
	}

	function store(Request $request)
	{
		$client = new Client();

		$res = $client->request('POST', 'http://127.0.0.1:8002/api/transaksi', [
			'json' => [
				'nama_pembeli' => $request->nama_pembeli,
				'alamat' => $request->alamat,
				'no_telp' => $request->no_telp,
				'namaikan' => $request->namaikan,
				'total_harga' => $request->total_harga,
				'jumlah' => $request->jumlah
			]
		]);


		$id = 0;
		$stokawal = 0;

		$dataikan = Http::get('http://127.0.0.1:8001/api/ikan')->json();
		for ($i = 0; $i < count($dataikan['data']); $i++) {
			if ($request->namaikan == $dataikan['data'][$i]['nama_ikan']) {
				$id = $dataikan['data'][$i]['id'];
				$stokawal = $dataikan['data'][$i]['jumlah'];
			}
		}

		$data = $client->request('PUT', 'http://127.0.0.1:8001/api/ikan/' . $id, [
			'json' => [
				'jumlah' => $stokawal - $request->jumlah
			]
		]);

		return redirect(route('transaksi.index'));
	}

	public function destroy($id)
	{
		$client = new Client();
		$data = $client->request('DELETE', 'http://127.0.0.1:8002/api/transaksi/' . $id);
		return redirect(route('transaksi.index'));
	}
}
