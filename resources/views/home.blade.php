@extends('layout.template')
@section('title', 'PPMB - UMI')
@if (session()->has('success'))
    <div class="alert alert-light text-center" role="alert" id="success-alert"
        style="position: fixed; top: 1%; left: 50%; transform: translateX(-50%); z-index: 1050;">
        Selamat Datang Kembali {{ auth()->user()->name }}!!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@section('content')
    {{-- content --}}
    @include('layout.card')
@endsection
