@extends('layout.template')
@section('title', 'PPMB - UMI')
@section('content')
<div class="container mt-5" style="color: black">
    <div class="row">
        <div class="col-md-12">
            <h2 class="mb-4">Form Registrasi Mahasiswa Baru</h2>
            @if (session()->has('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <form action="{{ route('pendaftaran.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                @php
                    $noPendaftaran = App\Models\Pendaftaran::generateRegistrationNumber();
                @endphp

                <div class="mb-3">
                    <label class="form-label">No Pendaftaran <small><i>(automatic)</i></small></label>
                    <input type="text" class="form-control" name="no" value="{{ $noPendaftaran }}" disabled />
                    <input type="hidden" name="no" value="{{ $noPendaftaran }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" class="form-control" name="nama" value="{{ old('nama') }}"/>
                    @error('nama')
                        <small class="form-text text-danger">{{ $message }}</small>                        
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Jenis Kelamin</label>
                    <select class="form-control" name="gender">
                        <option value="">Pilih Jenis Kelamin</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                    @error('gender')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Tempat Lahir</label>
                    <input type="text" class="form-control" name="tempat" value="{{ old('tempat') }}"/>
                    @error('tempat')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Tanggal Lahir</label>
                    <input type="date" class="form-control" name="tanggal" value="{{ old('tanggal') }}"/>
                    @error('tanggal')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Alamat</label>
                    <textarea class="form-control" name="alamat">{{ old('alamat') }}</textarea>
                    @error('alamat')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Asal Sekolah</label>
                    <input type="text" class="form-control" name="asal" value="{{ old('asal') }}"/>
                    @error('asal')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Foto Ijazah</label>
                    <input type="file" class="form-control" name="foto_izajah"/>
                    @error('foto_izajah')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Foto Bukti Pembayaran</label>
                    <input type="file" class="form-control" name="foto_bukti"/>
                    @error('foto_bukti')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-info">Daftar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
