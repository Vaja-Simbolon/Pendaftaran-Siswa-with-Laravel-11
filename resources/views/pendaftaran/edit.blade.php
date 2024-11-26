@extends('layout.template')
@section('title', 'PPMB - UMI')
@section('content')
<div class="container mt-5" style="color: black">
    <div class="row">
        <div class="col-md-12">
            <h2 class="mb-4">Edit Data Mahasiswa Baru</h2>
            @if (session()->has('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <form action="{{ route('pendaftaran.update', $pendaftaran->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label">No. Pendaftaran</label>
                    <input type="text" class="form-control" name="no" value="{{ $pendaftaran->no }}"/>
                    @error('no')
                    <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" class="form-control" name="nama" value="{{ $pendaftaran->nama }}"/>
                    @error('nama')
                    <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Jenis Kelamin</label>
                    <select class="form-control" name="gender">
                        <option value="">Pilih Jenis Kelamin</option>
                        <option value="Laki-laki" {{ $pendaftaran->gender == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="Perempuan" {{ $pendaftaran->gender == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                    @error('gender')
                    <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Tempat Lahir</label>
                    <input type="text" class="form-control" name="tempat" value="{{ $pendaftaran->tempat }}"/>
                    @error('tempat')
                    <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Tanggal Lahir</label>
                    <input type="date" class="form-control" name="tanggal" value="{{ $pendaftaran->tanggal }}"/>
                    @error('tanggal')
                    <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Alamat</label>
                    <input type="text" class="form-control" name="alamat" value="{{ $pendaftaran->alamat }}"/>
                    @error('alamat')
                    <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Asal Sekolah</label>
                    <input type="text" class="form-control" name="asal" value="{{ $pendaftaran->asal_sekolah }}"/>
                    @error('asal')
                    <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Foto Izajah</label>
                    <input type="file" class="form-control" name="foto_izajah"/>
                    <small class="form-text text-muted">Kosongkan jika tidak ingin mengubah foto.</small>
                    @error('foto_izajah')
                    <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Foto Bukti Bayar</label>
                    <input type="file" class="form-control" name="foto_bukti"/>
                    <small class="form-text text-muted">Kosongkan jika tidak ingin mengubah foto.</small>
                    @error('foto_bukti')
                    <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="text-center">
                    <button class="btn btn-info">Submit</button>
                    <a href="{{ route('mahasiswa.tampil') }}" class="btn btn-danger" style="color: white">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
