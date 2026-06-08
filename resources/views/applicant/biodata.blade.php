@extends('layouts.adminlte4.main')

@push('css')
@endpush

@section('header', 'Biodata Pelamar')

@section('content')

{{-- Alert Sukses --}}
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
        <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<div class="row">
    {{-- FORM BIODATA --}}
    <div class="col-lg-7">
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-primary text-white">
                <h5 class="card-title mb-0">
                    <i class="bi bi-person-fill me-2"></i>Data Diri
                </h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('applicant.biodata.update') }}">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Nama</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-person"></i></span>
                            <input type="text" class="form-control bg-light"
                                   value="{{ Auth::user()->name }}" disabled>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Email</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                            <input type="text" class="form-control bg-light"
                                   value="{{ Auth::user()->email }}" disabled>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label fw-semibold">Nomor HP</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-telephone"></i></span>
                            <input type="text" id="phone" name="phone"
                                   class="form-control @error('phone') is-invalid @enderror"
                                   placeholder="08xxxxxxxxxx"
                                   value="{{ $profile->phone ?? '' }}">
                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="skills" class="form-label fw-semibold">Skills</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-tools"></i></span>
                            <textarea id="skills" name="skills" rows="3"
                                      class="form-control @error('skills') is-invalid @enderror"
                                      placeholder="Contoh: PHP, Laravel, JavaScript, MySQL">{{ $profile->skills ?? '' }}</textarea>
                            @error('skills')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-text">Pisahkan setiap skill dengan koma</div>
                    </div>

                    <div class="mb-4">
                        <label for="experience" class="form-label fw-semibold">Pengalaman Kerja</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-briefcase"></i></span>
                            <textarea id="experience" name="experience" rows="4"
                                      class="form-control @error('experience') is-invalid @enderror"
                                      placeholder="Contoh: 2 tahun sebagai Backend Developer di PT. ABC">{{ $profile->experience ?? '' }}</textarea>
                            @error('experience')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">
                        <i class="bi bi-save me-1"></i> Simpan Biodata
                    </button>
                </form>
            </div>
        </div>
    </div>

    {{-- SIDEBAR KANAN --}}
    <div class="col-lg-5">
        {{-- FORM UPLOAD CV --}}
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-primary text-white">
                <h5 class="card-title mb-0">
                    <i class="bi bi-file-earmark-pdf-fill me-2"></i>
                    Upload CV
                </h5>
            </div>
            <div class="card-body">
                @if($profile && $profile->cv_path)
                    <div class="alert alert-success py-2">
                        <i class="bi bi-file-check-fill me-2"></i>
                        CV sudah terupload.
                        <a href="{{ Storage::url($profile->cv_path) }}"
                           target="_blank" class="alert-link ms-1">
                            <i class="bi bi-eye me-1"></i>Lihat CV
                        </a>
                    </div>
                @else
                    <div class="alert alert-warning py-2">
                        <i class="bi bi-exclamation-triangle me-2"></i>
                        Belum ada CV yang diupload.
                    </div>
                @endif

                <form method="POST"
                      action="{{ route('applicant.upload-cv') }}"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="cv" class="form-label fw-semibold">
                            Pilih File CV
                        </label>
                        <input type="file" id="cv" name="cv" accept=".pdf"
                               class="form-control @error('cv') is-invalid @enderror">
                        @error('cv')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">
                            <i class="bi bi-info-circle me-1"></i>
                            Format: PDF | Maks: 2MB
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success w-100">
                        <i class="bi bi-upload me-1"></i> Upload CV
                    </button>
                </form>
            </div>
        </div>

        {{-- Info Card --}}
        <div class="card shadow-sm border-primary">
            <div class="card-header bg-primary text-white">
                <h6 class="card-title mb-0">
                    <i class="bi bi-lightbulb-fill me-2"></i>Tips Pengisian
                </h6>
            </div>
            <div class="card-body">
                <ul class="list-unstyled mb-0 small">
                    <li class="mb-2">
                        <i class="bi bi-check-circle-fill text-success me-2"></i>
                        Isi skills secara lengkap agar AI bisa menganalisis dengan akurat
                    </li>
                    <li class="mb-2">
                        <i class="bi bi-check-circle-fill text-success me-2"></i>
                        Pengalaman kerja ditulis secara kronologis
                    </li>
                    <li class="mb-2">
                        <i class="bi bi-check-circle-fill text-success me-2"></i>
                        CV harus format PDF dan maksimal 2MB
                    </li>
                    <li>
                        <i class="bi bi-check-circle-fill text-success me-2"></i>
                        Data yang lengkap menghasilkan surat lamaran yang lebih baik
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

@endsection

@push('js')
@endpush