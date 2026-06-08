@extends('layouts.adminlte4.main')

@section('header', 'Dashboard Admin')

@section('content')

{{-- Stats Cards --}}
<div class="row mb-4">
    <div class="col-lg-3 col-6">
        <div class="small-box text-bg-primary">
            <div class="inner">
                <h3>{{ $totalPelamar }}</h3>
                <p>Total Pelamar</p>
            </div>
            <a href="{{ route('admin.pelamar.index') }}" class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                Lihat Semua <i class="bi bi-arrow-right-circle ms-1"></i>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="small-box text-bg-success">
            <div class="inner">
                <h3>{{ $sudahUploadCv }}</h3>
                <p>Sudah Upload CV</p>
            </div>
            <a href="{{ route('admin.pelamar.index') }}" class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                Lihat Detail <i class="bi bi-arrow-right-circle ms-1"></i>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="small-box text-bg-warning">
            <div class="inner">
                <h3>{{ $sudahIsiSkills }}</h3>
                <p>Sudah Isi Skills</p>
            </div>
            <a href="{{ route('admin.pelamar.index') }}" class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                Lihat Detail <i class="bi bi-arrow-right-circle ms-1"></i>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="small-box text-bg-danger">
            <div class="inner">
                <h3>{{ $totalPelamar - $sudahUploadCv }}</h3>
                <p>Belum Upload CV</p>
            </div>
            <a href="{{ route('admin.pelamar.index') }}" class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                Lihat Detail <i class="bi bi-arrow-right-circle ms-1"></i>
            </a>
        </div>
    </div>
</div>

{{-- Welcome Card --}}
<div class="row">
    <div class="col-12">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h5 class="card-title mb-0">
                    <i class="bi bi-house-fill me-2"></i>Selamat Datang, {{ Auth::user()->name }}!
                </h5>
            </div>
            <div class="card-body">
                <p class="text-muted mb-0">
                    Ini adalah panel admin SmartApply. Gunakan menu <strong>Data Pelamar</strong>
                    untuk melihat daftar lengkap pelamar dan CV mereka.
                </p>
            </div>
        </div>
    </div>
</div>

@endsection

@push('js')
@endpush