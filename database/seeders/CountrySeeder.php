<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
    public function run(): void
    {
        $countries = [
            'Kenya',
            'Uganda',
            'Tanzania',
            'Rwanda',
            'South Africa',
            'Nigeria',
            'Ghana',
            'Egypt',
            'Ethiopia',
            'Morocco',
            'Greece',
            'Paris'
        ];

        foreach ($countries as $name) {
            DB::table('countries')->insert([
                'name' => $name,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
