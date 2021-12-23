@extends('layouts.master')
@section('title')
    Dashboard
@endsection
@section('content')
    <div class="row page-title-header">
        <div class="col-12">
            <div class="page-header">
                <h4 class="page-title">Dashboard</h4>


            </div>
             <div class="page-header">
                <h6>Sistem Pendistribusian Ikan Cupang</h6>
                </div>
        </div>
    </div>
    <!-- Page Title Header Ends-->
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="d-flex">
                                <div class="wrapper">
                                    <h3 class="mb-0 font-weight-semibold">{{ $banyakjenis }}</h3>
                                    <h5 class="mb-0 font-weight-medium text-primary">Banyak Jenis Ikan</h5>
                                </div>
                                <div class="wrapper my-auto ml-auto ml-lg-4">
                                    <canvas height="50" width="100" id="stats-line-graph-1"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mt-md-0 mt-4">
                            <div class="d-flex">
                                <div class="wrapper">
                                    <h3 class="mb-0 font-weight-semibold">{{ $banyakikan }}</h3>
                                    <h5 class="mb-0 font-weight-medium text-primary">Banyak Ikan</h5>
                                </div>
                                <div class="wrapper my-auto ml-auto ml-lg-4">
                                    <canvas height="50" width="100" id="stats-line-graph-2"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mt-md-0 mt-4">
                            <div class="d-flex">
                                <div class="wrapper">
                                    <h3 class="mb-0 font-weight-semibold">{{ $banyaktransaksi }}</h3>
                                    <h5 class="mb-0 font-weight-medium text-primary">Banyak Transaksi</h5>
                                    <p class="mb-0 text-muted">+57.62(+0.76%)</p>
                                </div>
                                <div class="wrapper my-auto ml-auto ml-lg-4">
                                    <canvas height="50" width="100" id="stats-line-graph-3"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mt-md-0 mt-4">
                            <div class="d-flex">
                                <div class="wrapper">
                                    <h3 class="mb-0 font-weight-semibold">{{ $sumpendapatan }}</h3>
                                    <h5 class="mb-0 font-weight-medium text-primary">Total Pendapatan</h5>
                                </div>
                                <div class="wrapper my-auto ml-auto ml-lg-4">
                                    <canvas height="50" width="100" id="stats-line-graph-4"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
