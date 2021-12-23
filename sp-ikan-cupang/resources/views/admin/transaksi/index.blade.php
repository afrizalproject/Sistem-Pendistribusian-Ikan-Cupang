@extends('layouts.master')
@section('title')
    Transaksi
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Transaksi</h4>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal">
                        Tambah transaksi
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Tambah transaksi</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form class="forms-sample" action="{{ route('transaksi.store') }}" method="POST">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="jumlah">Jumlah</label>
                                            <input type="text" name="jumlah" class="form-control" id="jumlah"
                                                placeholder="Masukkan jumlah ikan" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="ikan">Ikan</label>
                                            <select id="ikan" class="form-control" id="exampleFormControlSelect2"
                                                name="namaikan">
                                                <option>- Pilih ikan -</option>
                                                @foreach ($fixIkan as $ik)
                                                    <option value="{{ $ik['nama_ikan'] }}" id="{{ $ik['harga_ikan'] }}">
                                                        {{ $ik['nama_ikan'] }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="total_harga">Total Harga</label>
                                            <input type="text" name="total_harga" value="0" class="form-control"
                                                id="total_harga" placeholder="Total harga" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="nama_pembeli">Nama Pembeli</label>
                                            <input type="text" name="nama_pembeli" class="form-control" id="nama_pembeli"
                                                placeholder="Masukkan nama pembeli" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="alamat">Alamat Pengiriman</label>
                                            <input type="text" name="alamat" class="form-control" id="alamat"
                                                placeholder="Masukkan alamat pengiriman" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="no_telp">Nomor telp.</label>
                                            <input type="number" name="no_telp" class="form-control" id="no_telp"
                                                placeholder="Masukkan nomor telp." required>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Kembali</button>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Pembeli</th>
                                <th>Nama Ikan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $transaksi)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $transaksi['nama_pembeli'] }}</td>
                                    <td>{{ $transaksi['namaikan'] }}</td>
                                    <td>
                                        <button type="button" class="btn btn-info" data-id="{{ $transaksi['id'] }}"
                                            data-toggle="modal" data-target="#exampleModal2{{ $transaksi['id'] }}"
                                            id="updatebutton">
                                            Detail
                                        </button>
                                        <button type="button" class="btn btn-danger hap delete"
                                            onclick="hapusData({{ $transaksi['id'] }})">Hapus</button>
                                        @if ($data != null)
                                            <div class="modal fade" id="exampleModal2{{ $transaksi['id'] }}"
                                                tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Detail
                                                                transaksi
                                                            </h5>
                                                            <button type="button" class="close"
                                                                data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <h1>{{ $transaksi['nama_pembeli'] }}</h1>
                                                            <ul>
                                                                <li>
                                                                    Nama Ikan : {{ $transaksi['namaikan'] }}
                                                                </li>
                                                                <li>
                                                                    Jumlah : {{ $transaksi['jumlah'] }}
                                                                </li>
                                                                <li>
                                                                    Total Harga : {{ $transaksi['total_harga'] }}
                                                                </li>
                                                                <li>
                                                                    Nomor Telp. : {{ $transaksi['no_telp'] }}
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        function hapusData(id) {
            var r = confirm("Apa anda yakin untuk menghapus data ini?");
            if (r == true) {
                $(document).on('click', '.delete', function() {
                    console.log(id);
                    $.ajax({
                        url: 'transaksi/' + id,
                        type: 'DELETE',
                        data: {
                            "_token": "{{ csrf_token() }}"
                        },
                        // success: function(response) {
                        //     alert("Details saved successfully!!!");
                        // },
                        // error: function(xhr, ajaxOptions, thrownError) {
                        //     alert(xhr.status);
                        //     alert(thrownError);
                        // }
                    });

                    location.reload()
                })

            } else {

            }

        }
    </script>
    <script>
        $(function() {
            $("#ikan").change(function() {
                var jumlah = document.getElementById('jumlah').value;
                if (jumlah != 0) {
                    var option = $('option:selected', this).attr('id');

                    var total = option * jumlah;
                    document.getElementById("total_harga").value = total;
                }

            });
        });
    </script>
@endpush
