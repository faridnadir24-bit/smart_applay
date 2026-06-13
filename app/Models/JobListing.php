<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobListing extends Model
{
    protected $fillable = [
        'title',
        'company',
        'location',
        'description',
        'type',
        'salary',
    ];

    public function applications()
    {
        return $this->hasMany(Application::class);
    }
}