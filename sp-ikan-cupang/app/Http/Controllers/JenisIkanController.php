<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class JenisIkanController extends Controller
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
			'http://127.0.0.1:8001/api/jenis',
		)->getBody()->getContents();

		$fixData = json_decode($data, true);
		// dd($fixData);
		return view('admin.jenis.index', ['data' => $fixData['data']]);
	}

	function store(Request $request)
	{
		$client = new Client();;
		$res = $client->request('POST', 'http://127.0.0.1:8001/api/jenis', [
			'json' => [
				'jenis' => $request->jenis
			]
		]);
		return redirect(route('jenis-ikan.index'));
	}

	public function update(Request $request, $id)
	{
		$client = new Client();
		// dd($request);
		$data = $client->request('PUT', 'http://127.0.0.1:8001/api/jenis/' . $id, [
			'json' => [
				'jenis' => $request->jenis
			]
		]);
		return redirect(route('jenis-ikan.index'));
	}
	public function destroy($id)
	{
		$client = new Client();
		$data = $client->request('DELETE', 'http://127.0.0.1:8001/api/jenis/' . $id);
		return redirect(route('jenis-ikan.index'));
	}
}
