<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $setting = Setting::first();

        if (!$setting) {
            $setting = new Setting;
        }

        Storage::put('logo.png', file_get_contents(storage_path('app/logo.png')));
        Storage::put('icon.png', file_get_contents(storage_path('app/icon.png')));

        $setting->logo_url = Storage::url('logo.png');
        $setting->icon_url = Storage::url('icon.png');
        $setting->name = config('app.name');

        $setting->save();
    }
}
