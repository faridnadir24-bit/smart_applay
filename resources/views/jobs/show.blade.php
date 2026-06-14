@extends('layouts.adminlte4.main')

@section('header', 'Detail Lowongan')

@section('content')

    <a href="{{ route('jobs.index') }}" class="btn btn-secondary mb-3">
        ← Kembali ke Daftar Lowongan
    </a>

    <div class="card shadow-sm border-0 rounded-3">
        <div class="card-body p-4">

            <div class="d-flex justify-content-between align-items-start mb-3">
                <h2 class="fw-bold">{{ $jobListing->title }}</h2>
                <span class="badge {{ $jobListing->type == 'Full-time' ? 'bg-success' : 'bg-warning text-dark' }} fs-6">
                    {{ $jobListing->type }}
                </span>
            </div>

            <p class="text-muted"><i class="bi bi-building me-2"></i>{{ $jobListing->company }}</p>
            <p class="text-muted"><i class="bi bi-geo-alt me-2"></i>{{ $jobListing->location }}</p>
            <p class="text-success fw-bold"><i class="bi bi-cash me-2"></i>{{ $jobListing->salary ?? 'Negosiasi' }}</p>

            <hr>

            <h5 class="fw-bold">Deskripsi Pekerjaan</h5>
            <p class="text-secondary">{{ $jobListing->description }}</p>

            <hr>

            @auth
                @if($hasApplied)
                    <div class="alert alert-success">
                        ✅ Kamu sudah melamar pekerjaan ini!
                        <a href="{{ route('applications.index') }}" class="alert-link">Lihat lamaran kamu</a>
                    </div>
                @else
                    <h5 class="fw-bold mb-3">📝 Kirim Lamaran</h5>
                    @if(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif
                    <form method="POST" action="{{ route('jobs.apply', $jobListing->id) }}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label fw-bold">Cover Letter <span class="text-danger">*</span></label>
                            <textarea name="cover_letter" class="form-control @error('cover_letter') is-invalid @enderror"
                                rows="5" placeholder="Tuliskan motivasi dan alasan kamu melamar posisi ini...">{{ old('cover_letter') }}</textarea>
                            @error('cover_letter')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Expected Salary (Gaji yang Diharapkan)</label>
                            <input type="text" name="expected_salary" class="form-control"
                                placeholder="Contoh: Rp 8.000.000 - Rp 10.000.000"
                                value="{{ old('expected_salary') }}">
                            <small class="text-muted">Opsional - kosongkan jika ingin negosiasi</small>
                        </div>
                        <button type="submit" class="btn btn-primary px-4">
                            🚀 Kirim Lamaran
                        </button>
                    </form>
                @endif
            @else
                <div class="alert alert-warning">
                    <a href="{{ route('login') }}" class="alert-link fw-bold">Login</a> terlebih dahulu untuk melamar.
                </div>
            @endauth

        </div>
    </div>

@endsection