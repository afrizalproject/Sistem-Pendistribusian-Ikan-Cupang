@extends('layouts.master')
@section('title')
    Jenis Ikan
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Jenis Ikan</h4>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal">
                        Tambah Jenis Ikan
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
                                <form class="forms-sample" action="{{ route('jenis-ikan.store') }}" method="POST">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="jenis-ikan">Jenis Ikan</label>
                                            <input type="text" name="jenis" class="form-control" id="jenis-ikan"
                                                placeholder="Masukkan jenis ikan" required>
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
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $jenis)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $jenis['jenis'] }}</td>
                                    <td>
                                        <button type="button" class="btn btn-info" data-id="{{ $jenis['id'] }}"
                                            data-toggle="modal" data-target="#exampleModal2{{ $jenis['id'] }}"
                                            id="updatebutton">
                                            Edit
                                        </button>
                                        <button type="button" class="btn btn-danger hap delete"
                                            onclick="hapusData({{ $jenis['id'] }})">Hapus</button>
                                        @if ($data != null)
                                            <div class="modal fade" id="exampleModal2{{ $jenis['id'] }}" tabindex="-1"
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
                                                            action="{{ route('jenis-ikan.update', ['jenis_ikan' => $jenis['id']]) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label for="jenis-ikan">Jenis Ikan</label><br>
                                                                    <input type="text" value="{{ $jenis['jenis'] }}"
                                                                        name="jenis" class="form-control" id="jenis-ikan"
                                                                        placeholder="Masukkan jenis ikan" required>
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
                        url: 'jenis-ikan/' + id,
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
