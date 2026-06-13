<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    // Tampilkan riwayat lamaran milik user
    public function index()
    {
        $applications = Application::with('jobListing')
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('applications.index', compact('applications'));
    }
}