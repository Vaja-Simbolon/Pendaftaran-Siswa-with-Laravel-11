@extends('layout.template')
@section('title', 'PPMB - UMI')
@section('content')
    <style>
        .btn-group .btn {
            margin-right: 5px;
        }

        .table-responsive {
            overflow-x: auto;
        }
    </style>
    <div class="container mt-5" style="color: black">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h2 class="mb-4">Data Mahasiswa Baru</h2>
                    <div class="input-group" style="width: 300px;">
                        <input type="text" id="searchInput" class="form-control" placeholder="Cari Mahasiswa...">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button" onclick="searchTable()"><i
                                    class="fa fa-search"></i></button>
                        </div>
                    </div>
                </div>
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <a class="btn btn-primary btn-sm" href="{{ route('pendaftaran.tampil') }}"><i class="fa fa-plus"></i> Tambah Data</a>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead style="background-color: #345d81; color: white;">
                            <tr class="text-center">
                                <th>No Pendaftaran</th>
                                <th>Nama</th>
                                <th>Gender</th>
                                <th>Tempat, Tanggal Lahir</th>
                                <th>Alamat</th>
                                <th>Asal Sekolah</th>
                                <th>Foto Ijazah</th>
                                <th>Foto Bukti Bayar</th>
                                <th>Status Daftar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="pendaftaranTableBody">
                            @foreach ($pendaftaran as $data)
                                <tr class="text-center pendaftaran-row" id="pendaftaran-{{ $data->id }}">
                                    <td>{{ $data->no }}</td>
                                    <td>{{ $data->nama }}</td>
                                    <td>{{ $data->gender }}</td>
                                    <td>{{ $data->ttl }}</td>
                                    <td>{{ $data->alamat }}</td>
                                    <td>{{ $data->asal_sekolah }}</td>
                                    <td><img src="{{ asset('Foto_izajah/' . $data->izajah) }}" class="img-fluid rounded"
                                            style="width: 150px;"></td>
                                    <td><img src="{{ asset('Foto_buktiBayar/' . $data->bukti_bayar) }}"
                                            class="img-fluid rounded" style="width: 150px;"></td>
                                    <td id="status-{{ $data->id }}"><b>{{ $data->status_daftar }}</b></td>
                                    <td>
                                        <form action="{{ route('pendaftaran.destroy', $data->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <div class="btn-group" role="group">
                                                <button type="button" class="btn btn-info btn-sm"
                                                    onclick="terimaPendaftaran({{ $data->id }})"><i
                                                        class="fa fa-check-circle"></i></button>
                                                <a href="{{ route('pendaftaran.edit', $data->id) }}" class="btn btn-success btn-sm"><i
                                                        class="fa fa-pencil-square"></i></a>
                                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>
                                                </button>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div>
                    <hr>
                    <h6>Keterangan :</h6>
                        <li class="btn btn-info btn-sm"><i class="fa fa-check-circle"></i></li>Terima <br>
                        <li class="btn btn-success btn-sm"><i class="fa fa-pencil-square"></i></li>Edit <br>
                        <li class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></li>Hapus
                </div>
            </div>
        </div>
    </div>

    <script>
        function terimaPendaftaran(id) {
            $.ajax({
                url: '/pendaftaran/terima/' + id,
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    $('#status-' + id).text('Diterima');
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                }
            });
        }

        function searchTable() {
            var searchValue = document.getElementById('searchInput').value.toLowerCase();
            var rows = document.querySelectorAll('#pendaftaranTableBody .pendaftaran-row');

            rows.forEach(function(row) {
                var rowText = row.innerText.toLowerCase();
                if (rowText.includes(searchValue)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        }
    </script>
@endsection
