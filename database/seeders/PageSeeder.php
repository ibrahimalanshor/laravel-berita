<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pages = [
            'Redaksi',
            'Ketentuan Penggunaan',
            'Kebijakan Privasi',
            'Kebijakan Cookie',
            'Pedoman Media Siber',
            'Tentang Kami',
            'Kontak Kami',
            'Disclaimer',
            'Karir',
            'Peta Situs',
        ];

        foreach ($pages as $page) {
            Page::create([
                'name' => $page,
                'slug' => Str::slug($page)
            ]);
        }
    }
}
