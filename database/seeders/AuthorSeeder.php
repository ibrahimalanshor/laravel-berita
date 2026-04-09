<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $authors = [
            'Supriyanto',
            'Dewi Sartika',
            'Budi Santoso',
            'Siti Aminah',
            'Ahmad Fauzi',
            'Rina Wijaya',
            'Hendra Gunawan',
            'Lina Marlina',
            'Agus Prasetyo',
            'Yulia Sari'
        ];

        foreach ($authors as $author) {
            Author::create([
                'name' => $author
            ]);
        }
    }
}
