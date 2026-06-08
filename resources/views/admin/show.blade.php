@extends('layouts.adminlte4.main')

@section('header', 'Detail Pelamar')

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-primary text-white d-flex justify-content-between">
                <h5 class="card-title mb-0">
                    <i class="bi bi-person-fill me-2"></i>{{ $pelamar->name }}
                </h5>
                <a href="{{ route('admin.dashboard') }}" class="btn btn-sm btn-light">
                    <i class="bi bi-arrow-left me-1"></i>Kembali
                </a>
            </div>
            <div class="card-body">
                <table class="table table-borderless">
                    <tr>
                        <td width="150"><strong><i class="bi bi-person me-2 text-primary"></i>Nama</strong></td>
                        <td>: {{ $pelamar->name }}</td>
                    </tr>
                    <tr>
                        <td><strong><i class="bi bi-envelope me-2 text-primary"></i>Email</strong></td>
                        <td>: {{ $pelamar->email }}</td>
                    </tr>
                    <tr>
                        <td><strong><i class="bi bi-telephone me-2 text-primary"></i>Nomor HP</strong></td>
                        <td>: {{ $pelamar->applicantProfile?->phone ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td><strong><i class="bi bi-tools me-2 text-primary"></i>Skills</strong></td>
                        <td>: {{ $pelamar->applicantProfile?->skills ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td><strong><i class="bi bi-briefcase me-2 text-primary"></i>Pengalaman</strong></td>
                        <td>: {{ $pelamar->applicantProfile?->experience ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td><strong><i class="bi bi-calendar me-2 text-primary"></i>Daftar</strong></td>
                        <td>: {{ $pelamar->created_at->format('d M Y') }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h5 class="card-title mb-0">
                    <i class="bi bi-file-earmark-pdf-fill me-2"></i>CV Pelamar
                </h5>
            </div>
            <div class="card-body text-center">
                @if($pelamar->applicantProfile?->cv_path)
                    <i class="bi bi-file-pdf text-danger" style="font-size: 64px;"></i>
                    <p class="mt-2 text-muted">CV tersedia</p>
                    <a href="{{ Storage::url($pelamar->applicantProfile->cv_path) }}"
                       target="_blank"
                       class="btn btn-primary w-100 mb-2">
                        <i class="bi bi-eye me-1"></i> Lihat CV
                    </a>
                    <a href="{{ Storage::url($pelamar->applicantProfile->cv_path) }}"
                       download
                       class="btn btn-outline-primary w-100">
                        <i class="bi bi-download me-1"></i> Download CV
                    </a>
                @else
                    <i class="bi bi-file-earmark-x text-secondary" style="font-size: 64px;"></i>
                    <p class="mt-2 text-muted">Pelamar belum upload CV</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection