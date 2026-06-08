<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApplicantProfile extends Model
{
    protected $fillable = [
        'user_id',
        'phone',
        'skills',
        'experience',
        'cv_path',
    ];

    // Relasi balik ke User (One to One)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}