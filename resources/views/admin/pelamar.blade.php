@extends('layouts.adminlte4.main')

@section('header', 'Data Pelamar')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">
                    <i class="bi bi-people-fill me-2"></i>Daftar Pelamar
                </h5>
                <span class="badge bg-white text-primary">{{ $pelamars->count() }} pelamar</span>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover table-striped mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Nomor HP</th>
                                <th>Skills</th>
                                <th>CV</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($pelamars as $i => $pelamar)
                            <tr>
                                <td>{{ $i + 1 }}</td>
                                <td><strong>{{ $pelamar->name }}</strong></td>
                                <td>{{ $pelamar->email }}</td>
                                <td>
                                    @if($pelamar->applicantProfile?->phone)
                                        {{ $pelamar->applicantProfile->phone }}
                                    @else
                                        <span class="badge bg-secondary">Belum diisi</span>
                                    @endif
                                </td>
                                <td>
                                    @if($pelamar->applicantProfile?->skills)
                                        <span class="badge bg-success"><i class="bi bi-check-lg"></i> Ada</span>
                                    @else
                                        <span class="badge bg-warning text-dark">Belum</span>
                                    @endif
                                </td>
                                <td>
                                    @if($pelamar->applicantProfile?->cv_path)
                                        <a href="{{ Storage::url($pelamar->applicantProfile->cv_path) }}"
                                           target="_blank"
                                           class="badge bg-primary text-decoration-none">
                                            <i class="bi bi-file-pdf me-1"></i>Lihat CV
                                        </a>
                                    @else
                                        <span class="badge bg-danger">Belum upload</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.pelamar.show', $pelamar->id) }}"
                                       class="btn btn-sm btn-outline-primary">
                                        <i class="bi bi-eye"></i> Detail
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center text-muted py-4">
                                    <i class="bi bi-inbox fs-4 d-block mb-2"></i>
                                    Belum ada pelamar terdaftar
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('js')
@endpush
