@extends('layouts.adminlte4.main')

@section('header', 'Dashboard')

@section('content')

{{-- Stats Cards --}}
<div class="row mb-4">
    <div class="col-lg-3 col-6">
        <div class="small-box text-bg-primary">
            <div class="inner">
                <h3><i class="bi bi-person-fill"></i></h3>
                <p>{{ Auth::user()->name }}</p>
            </div>
            <a href="{{ route('applicant.biodata') }}" class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                Lihat Profil <i class="bi bi-arrow-right-circle ms-1"></i>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="small-box text-bg-{{ $profile?->phone ? 'success' : 'warning' }}">
            <div class="inner">
                <h3><i class="bi bi-telephone-fill"></i></h3>
                <p>{{ $profile?->phone ?? 'Belum diisi' }}</p>
            </div>
            <a href="{{ route('applicant.biodata') }}" class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                {{ $profile?->phone ? 'Ubah Nomor' : 'Isi Sekarang' }}
                <i class="bi bi-arrow-right-circle ms-1"></i>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="small-box text-bg-{{ $profile?->skills ? 'success' : 'warning' }}">
            <div class="inner">
                <h3><i class="bi bi-tools"></i></h3>
                <p>Skills</p>
            </div>
            <a href="{{ route('applicant.biodata') }}" class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                {{ $profile?->skills ? 'Sudah diisi ✓' : 'Belum diisi' }}
                <i class="bi bi-arrow-right-circle ms-1"></i>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="small-box text-bg-{{ $profile?->cv_path ? 'success' : 'danger' }}">
            <div class="inner">
                <h3><i class="bi bi-file-earmark-pdf-fill"></i></h3>
                <p>CV / Resume</p>
            </div>
            <a href="{{ route('applicant.biodata') }}" class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                {{ $profile?->cv_path ? 'Sudah diupload ✓' : 'Belum diupload' }}
                <i class="bi bi-arrow-right-circle ms-1"></i>
            </a>
        </div>
    </div>
</div>

{{-- Info & Checklist --}}
<div class="row">
    <div class="col-lg-7">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h5 class="card-title mb-0">
                    <i class="bi bi-house-fill me-2"></i>Selamat Datang di SmartApply!
                </h5>
            </div>
            <div class="card-body">
                <p class="mb-2">Halo, <strong>{{ Auth::user()->name }}</strong>! 👋</p>
                <p class="text-muted mb-3">SmartApply membantu kamu membuat surat lamaran kerja otomatis berbasis AI.</p>
                <hr>
                <h6 class="fw-bold mb-3">Cara Menggunakan SmartApply:</h6>
                <div class="d-flex align-items-start mb-2">
                    <span class="badge bg-primary me-3 mt-1">1</span>
                    <span>Lengkapi <strong>Biodata</strong> kamu</span>
                </div>
                <div class="d-flex align-items-start mb-2">
                    <span class="badge bg-primary me-3 mt-1">2</span>
                    <span>Upload <strong>CV</strong> format PDF (maks. 2MB)</span>
                </div>
                <div class="d-flex align-items-start mb-3">
                    <span class="badge bg-primary me-3 mt-1">3</span>
                    <span>Gunakan fitur <strong>Generator Surat Lamaran</strong></span>
                </div>
                <a href="{{ route('applicant.biodata') }}" class="btn btn-primary">
                    <i class="bi bi-person-lines-fill me-1"></i> Lengkapi Biodata
                </a>
            </div>
        </div>
    </div>

    <div class="col-lg-5">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h5 class="card-title mb-0">
                    <i class="bi bi-clipboard-check-fill me-2"></i>Kelengkapan Profil
                </h5>
            </div>
            <div class="card-body p-0">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span><i class="bi bi-envelope-fill text-primary me-2"></i>Email</span>
                        <span class="badge bg-success"><i class="bi bi-check-lg"></i> Lengkap</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span><i class="bi bi-telephone-fill text-primary me-2"></i>Nomor HP</span>
                        @if($profile?->phone)
                            <span class="badge bg-success"><i class="bi bi-check-lg"></i> Lengkap</span>
                        @else
                            <span class="badge bg-warning text-dark">Belum diisi</span>
                        @endif
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span><i class="bi bi-tools text-primary me-2"></i>Skills</span>
                        @if($profile?->skills)
                            <span class="badge bg-success"><i class="bi bi-check-lg"></i> Lengkap</span>
                        @else
                            <span class="badge bg-warning text-dark">Belum diisi</span>
                        @endif
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span><i class="bi bi-briefcase-fill text-primary me-2"></i>Pengalaman</span>
                        @if($profile?->experience)
                            <span class="badge bg-success"><i class="bi bi-check-lg"></i> Lengkap</span>
                        @else
                            <span class="badge bg-warning text-dark">Belum diisi</span>
                        @endif
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span><i class="bi bi-file-earmark-pdf-fill text-primary me-2"></i>CV</span>
                        @if($profile?->cv_path)
                            <span class="badge bg-success"><i class="bi bi-check-lg"></i> Sudah diupload</span>
                        @else
                            <span class="badge bg-danger">Belum diupload</span>
                        @endif
                    </li>
                </ul>
            </div>
            <div class="card-footer text-center">
                @php
                    $filled = collect([$profile?->phone, $profile?->skills, $profile?->experience, $profile?->cv_path])->filter()->count();
                    $percent = ($filled / 4) * 100;
                @endphp
                <small>Kelengkapan: {{ $filled }}/4</small>
                <div class="progress mt-2" style="height: 8px;">
                    <div class="progress-bar bg-primary" style="width: {{ $percent }}%"></div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('js')
@endpush