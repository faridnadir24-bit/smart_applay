@extends('layouts.adminlte4.main')

@push('css')
@endpush

@section('header', 'Biodata Pelamar')

@section('content')
<div class="row">
    <div class="col-md-10 col-lg-8">

        {{-- Alert Sukses --}}
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        {{-- FORM BIODATA --}}
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="card-title mb-0">
                    <i class="bi bi-person-fill me-2"></i>Data Diri
                </h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('applicant.biodata.update') }}">
                    @csrf

                    {{-- Nama --}}
                    <div class="mb-3">
                        <label class="form-label">Nama</label>
                        <input type="text"
                               class="form-control bg-light"
                               value="{{ Auth::user()->name }}"
                               disabled>
                    </div>

                    {{-- Email --}}
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="text"
                               class="form-control bg-light"
                               value="{{ Auth::user()->email }}"
                               disabled>
                    </div>

                    {{-- Nomor HP --}}
                    <div class="mb-3">
                        <label for="phone" class="form-label">Nomor HP</label>
                        <input type="text"
                               id="phone"
                               name="phone"
                               class="form-control @error('phone') is-invalid @enderror"
                               placeholder="08xxxxxxxxxx"
                               value="{{ $profile->phone ?? '' }}">
                        @error('phone')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Skills --}}
                    <div class="mb-3">
                        <label for="skills" class="form-label">Skills</label>
                        <textarea id="skills"
                                  name="skills"
                                  rows="3"
                                  class="form-control @error('skills') is-invalid @enderror"
                                  placeholder="Contoh: PHP, Laravel, JavaScript, MySQL">{{ $profile->skills ?? '' }}</textarea>
                        @error('skills')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Pengalaman --}}
                    <div class="mb-3">
                        <label for="experience" class="form-label">Pengalaman Kerja</label>
                        <textarea id="experience"
                                  name="experience"
                                  rows="4"
                                  class="form-control @error('experience') is-invalid @enderror"
                                  placeholder="Contoh: 2 tahun sebagai Backend Developer di PT. ABC">{{ $profile->experience ?? '' }}</textarea>
                        @error('experience')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save me-1"></i> Simpan Biodata
                    </button>
                </form>
            </div>
        </div>

        {{-- FORM UPLOAD CV --}}
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="card-title mb-0">
                    <i class="bi bi-file-earmark-pdf-fill me-2"></i>
                    Upload CV <small class="text-muted">(PDF, maks. 2MB)</small>
                </h5>
            </div>
            <div class="card-body">

                {{-- Status CV --}}
                @if($profile && $profile->cv_path)
                    <div class="alert alert-info">
                        <i class="bi bi-file-pdf me-2"></i>CV saat ini tersimpan.
                        <a href="{{ Storage::url($profile->cv_path) }}"
                           target="_blank"
                           class="alert-link ms-2">
                            <i class="bi bi-eye me-1"></i>Lihat CV
                        </a>
                    </div>
                @else
                    <div class="alert alert-warning">
                        <i class="bi bi-exclamation-triangle me-2"></i>Belum ada CV yang diupload.
                    </div>
                @endif

                <form method="POST"
                      action="{{ route('applicant.upload-cv') }}"
                      enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="cv" class="form-label">Pilih File CV (PDF)</label>
                        <input type="file"
                               id="cv"
                               name="cv"
                               accept=".pdf"
                               class="form-control @error('cv') is-invalid @enderror">
                        @error('cv')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">Format: PDF | Ukuran maksimal: 2MB</div>
                    </div>

                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-upload me-1"></i> Upload CV
                    </button>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection

@push('js')
@endpush