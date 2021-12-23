@extends('layouts.master')
@section('title')
    Ikan
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Ikan</h4>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal">
                        Tambah Ikan
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form class="forms-sample" action="{{ route('ikan.store') }}" method="POST">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="ikan">Jenis Ikan</label>
                                            <select class="form-control" id="exampleFormControlSelect2" name="id_jenis">
                                                <option>- Pilih jenis ikan -</option>
                                                @foreach ($jenisikan as $ji)
                                                    <option value="{{ $ji['id'] }}">{{ $ji['jenis'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="nama_ikan">Nama Ikan</label><br>
                                            <input type="text" name="nama_ikan" class="form-control" id="nama_ikan"
                                                placeholder="Masukkan nama ikan" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="harga_ikan">Harga per ekor</label><br>
                                            <input type="number" name="harga_ikan" class="form-control" id="harga_ikan"
                                                placeholder="Masukkan harga ikan" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="jumlah">Jumlah</label><br>
                                            <input type="number" name="jumlah" class="form-control" id="jumlah"
                                                placeholder="Masukkan jumlah ikan" required>
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
                                <th>Jenis Ikan</th>
                                <th>Nama Ikan</th>
                                <th>Harga per ekor</th>
                                <th>Jumlah</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $ikan)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $ikan['jenis_ikan']['jenis'] }}</td>
                                    <td>{{ $ikan['nama_ikan'] }}</td>
                                    <td>{{ $ikan['harga_ikan'] }}</td>
                                    <td>{{ $ikan['jumlah'] }}</td>
                                    <td>
                                        <button type="button" class="btn btn-info" data-id="{{ $ikan['id'] }}"
                                            data-toggle="modal" data-target="#exampleModal2{{ $ikan['id'] }}"
                                            id="updatebutton">
                                            Edit
                                        </button>
                                        <button type="button" class="btn btn-danger hap delete"
                                            onclick="hapusData({{ $ikan['id'] }})">Hapus</button>
                                        @if ($data != null)
                                            <div class="modal fade" id="exampleModal2{{ $ikan['id'] }}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Edit jenis
                                                            </h5>
                                                            <button type="button" class="close"
                                                                data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form class="forms-sample"
                                                            action="{{ route('ikan.update', ['ikan' => $ikan['id']]) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label for="ikan">Jenis Ikan</label><br>
                                                                    <select class="form-control" name="id_jenis"
                                                                        id="exampleFormControlSelect2">
                                                                        <option>- Pilih jenis ikan -</option>
                                                                        @foreach ($jenisikan as $ji)
                                                                            <option
                                                                                {{ $ji['id'] == $ikan['id_jenis'] ? 'selected' : '' }}
                                                                                value="{{ $ji['id'] }}">
                                                                                {{ $ji['jenis'] }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="nama_ikan">Nama Ikan</label><br>
                                                                    <input type="text" name="nama_ikan"
                                                                        class="form-control"
                                                                        value="{{ $ikan['nama_ikan'] }}" id="nama_ikan"
                                                                        placeholder="Masukkan nama ikan" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="harga_ikan">Harga per ekor</label><br>
                                                                    <input type="number" name="harga_ikan"
                                                                        class="form-control"
                                                                        value="{{ $ikan['harga_ikan'] }}" id="harga_ikan"
                                                                        placeholder="Masukkan harga ikan" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="jumlah">Jumlah</label><br>
                                                                    <input type="number" name="jumlah"
                                                                        value="{{ $ikan['jumlah'] }}"
                                                                        class="form-control" id="jumlah"
                                                                        placeholder="Masukkan jumlah ikan" required>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Update
                                                                    Jenis</button>
                                                            </div>
                                                        </form>
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
                console.log(id);
                $(document).on('click', '.delete', function() {
                    $.ajax({
                        url: 'ikan/' + id,
                        type: 'DELETE',
                        data: {
                            "_token": "{{ csrf_token() }}"
                        }
                    });

                    location.reload()
                })

            } else {

            }

        }
    </script>
@endpush
