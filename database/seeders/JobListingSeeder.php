<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\JobListing;

class JobListingSeeder extends Seeder
{
    public function run(): void
    {
        $jobs = [
            [
                'title' => 'Frontend Developer',
                'company' => 'PT Teknologi Maju',
                'location' => 'Jakarta',
                'description' => 'Membangun tampilan web modern menggunakan React dan Tailwind CSS.',
                'type' => 'Full-time',
                'salary' => 'Rp 8.000.000 - Rp 12.000.000',
            ],
            [
                'title' => 'Backend Developer',
                'company' => 'PT Digital Nusantara',
                'location' => 'Bandung',
                'description' => 'Mengembangkan API dan sistem backend menggunakan Laravel.',
                'type' => 'Full-time',
                'salary' => 'Rp 9.000.000 - Rp 15.000.000',
            ],
            [
                'title' => 'UI/UX Designer',
                'company' => 'CV Kreatif Studio',
                'location' => 'Yogyakarta',
                'description' => 'Merancang tampilan aplikasi mobile dan web yang menarik.',
                'type' => 'Part-time',
                'salary' => 'Rp 5.000.000 - Rp 8.000.000',
            ],
            [
                'title' => 'Data Analyst',
                'company' => 'PT Data Insight',
                'location' => 'Surabaya',
                'description' => 'Menganalisis data bisnis dan membuat laporan visualisasi.',
                'type' => 'Full-time',
                'salary' => 'Rp 10.000.000 - Rp 18.000.000',
            ],
            [
                'title' => 'Mobile Developer',
                'company' => 'PT Aplikasi Hebat',
                'location' => 'Jakarta',
                'description' => 'Membuat aplikasi Android dan iOS menggunakan Flutter.',
                'type' => 'Full-time',
                'salary' => 'Rp 10.000.000 - Rp 16.000.000',
            ],
            [
                'title' => 'DevOps Engineer',
                'company' => 'PT Cloud Solusi',
                'location' => 'Jakarta',
                'description' => 'Mengelola infrastruktur cloud dan CI/CD pipeline perusahaan.',
                'type' => 'Full-time',
                'salary' => 'Rp 12.000.000 - Rp 20.000.000',
            ],
            [
                'title' => 'Graphic Designer',
                'company' => 'CV Desain Kreatif',
                'location' => 'Bali',
                'description' => 'Membuat konten visual untuk media sosial dan materi pemasaran.',
                'type' => 'Part-time',
                'salary' => 'Rp 4.000.000 - Rp 7.000.000',
            ],
            [
                'title' => 'Project Manager',
                'company' => 'PT Maju Bersama',
                'location' => 'Jakarta',
                'description' => 'Mengelola proyek teknologi dari perencanaan hingga peluncuran.',
                'type' => 'Full-time',
                'salary' => 'Rp 15.000.000 - Rp 25.000.000',
            ],
            [
                'title' => 'Quality Assurance',
                'company' => 'PT Software Andalan',
                'location' => 'Bandung',
                'description' => 'Melakukan pengujian aplikasi untuk memastikan kualitas produk.',
                'type' => 'Full-time',
                'salary' => 'Rp 7.000.000 - Rp 11.000.000',
            ],
            [
                'title' => 'Content Writer',
                'company' => 'CV Media Kreatif',
                'location' => 'Yogyakarta',
                'description' => 'Menulis konten artikel, blog, dan copywriting untuk platform digital.',
                'type' => 'Part-time',
                'salary' => 'Rp 3.000.000 - Rp 6.000.000',
            ],
        ];

        foreach ($jobs as $job) {
            JobListing::create($job);
        }
    }
}