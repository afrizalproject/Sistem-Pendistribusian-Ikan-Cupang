<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
	public function index()
	{
		$dataikan = Http::get('http://127.0.0.1:8001/api/ikan')->json();
		$datajenis = Http::get('http://127.0.0.1:8001/api/jenis')->json();
		$datatransaksi = Http::get('http://127.0.0.1:8002/api/transaksi')->json();
		$banyakjenis = count($datajenis['data']);
		$banyakikan = count($dataikan['data']);
		$banyaktransaksi = count($datatransaksi['data']);

		$sumpendapatan = 0;
		for ($i = 0; $i < $banyaktransaksi; $i++) {
			$sumpendapatan += $datatransaksi['data'][$i]['total_harga'];
		}

		return view('admin.dashboard', compact('banyakikan', 'banyakjenis', 'sumpendapatan', 'banyaktransaksi'));
	}
}
