<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ApplicantProfileController extends Controller
{
    // Tampilkan halaman biodata
    public function index()
    {
        $profile = Auth::user()->applicantProfile;
        return view('applicant.biodata', compact('profile'));
    }

    // Simpan / update biodata
    public function update(Request $request)
    {
        $request->validate([
            'phone'      => 'nullable|string|max:20',
            'skills'     => 'nullable|string',
            'experience' => 'nullable|string',
        ]);

        Auth::user()->applicantProfile()->updateOrCreate(
            ['user_id' => Auth::id()],
            $request->only('phone', 'skills', 'experience')
        );

        return redirect()->route('applicant.biodata')
            ->with('success', 'Biodata berhasil disimpan!');
    }

    // Upload CV PDF
    public function uploadCv(Request $request)
    {
        $request->validate([
            'cv' => 'required|file|mimes:pdf|max:2048',
        ]);

        $profile = Auth::user()->applicantProfile()->firstOrCreate(
            ['user_id' => Auth::id()]
        );

        // Hapus CV lama jika ada
        if ($profile->cv_path) {
            Storage::disk('public')->delete($profile->cv_path);
        }

        // Simpan CV baru ke storage/app/public/cv_files
        $path = $request->file('cv')->store('cv_files', 'public');
        $profile->update(['cv_path' => $path]);

        return redirect()->route('applicant.biodata')
            ->with('success', 'CV berhasil diupload!');
    }
}