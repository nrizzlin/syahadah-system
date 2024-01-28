<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpecialistsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Solat',
            'Doa',
            'Al-Quran',
            'Hadith',
            'Fiqh',
            'Fasting',
            'Zakat',
            'Hajj',
            'Dawah',
            'Islamic History',
            'Islamic Ethics and Morality',
            'Islamic Art and Architecture',
        ];

        foreach ($categories as $category) {
            DB::table('specialists')->insert([
                'category' => $category,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
