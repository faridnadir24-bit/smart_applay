<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Dashboard Admin
    public function dashboard()
    {
        $totalPelamar    = User::role('user')->count();
        $sudahIsiPhone   = User::role('user')->whereHas('applicantProfile', fn($q) => $q->whereNotNull('phone'))->count();
        $sudahIsiSkills  = User::role('user')->whereHas('applicantProfile', fn($q) => $q->whereNotNull('skills'))->count();
        $sudahUploadCv   = User::role('user')->whereHas('applicantProfile', fn($q) => $q->whereNotNull('cv_path'))->count();

        $pelamars = User::role('user')->with('applicantProfile')->latest()->get();

        return view('admin.dashboard', compact(
            'totalPelamar', 'sudahIsiPhone',
            'sudahIsiSkills', 'sudahUploadCv', 'pelamars'
        ));
    }
    public function pelamarIndex()
    {
        $pelamars = User::role('user')->with('applicantProfile')->latest()->get();
        return view('admin.pelamar', compact('pelamars'));
    }

    // Detail pelamar
    public function show($id)
    {
        $pelamar = User::role('user')->with('applicantProfile')->findOrFail($id);
        return view('admin.show', compact('pelamar'));
    }
}