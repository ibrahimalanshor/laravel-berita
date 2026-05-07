<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $image = 'authors/image.jpg';
        Storage::put($image, file_get_contents(storage_path('app/' . $image)));

        Author::factory(10)
            ->create();
    }
}
