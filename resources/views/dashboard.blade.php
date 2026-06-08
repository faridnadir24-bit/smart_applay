@extends('layouts.adminlte4.main')

@push('css')
@endpush

@section('header', 'Dashboard')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Selamat Datang di SmartApply! 👋</h5>
                <p class="card-text">
                    Halo, <strong>{{ Auth::user()->name }}</strong>!
                    Silakan lengkapi biodata kamu untuk mulai menggunakan SmartApply.
                </p>
                <a href="{{ route('applicant.biodata') }}" class="btn btn-primary">
                    <i class="bi bi-person-lines-fill"></i> Lengkapi Biodata
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
@endpush