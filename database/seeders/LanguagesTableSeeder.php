<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $language = new Language();
        $language->name = 'English';
        $language->lang = 'en';
        $language->slug = 'en';
        $language->default = 1;
        $language->status = 1;
        $language->save();

        $language = new Language();
        $language->name = 'Indonesian';
        $language->lang = 'id';
        $language->slug = 'id';
        $language->default = 0;
        $language->status = 1;
        $language->save();
    }
}
