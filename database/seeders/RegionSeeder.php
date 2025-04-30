<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Country;
use Illuminate\Support\Facades\DB;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $regions = [
            'Kenya' => ['Nairobi', 'Mombasa', 'Kisumu', 'Nakuru', 'Eldoret', 'Meru', 'Kitui'],
            'Uganda' => ['Kampala', 'Entebbe', 'Gulu', 'Mbarara', 'Jinja', 'Mbale'],
            'Tanzania' => ['Dar es Salaam', 'Arusha', 'Mwanza', 'Dodoma', 'Mbeya', 'Tanga'],
            'Rwanda' => ['Kigali', 'Musanze', 'Rubavu', 'Huye', 'Muhanga'],
            'South Africa' => ['Cape Town', 'Johannesburg', 'Durban', 'Pretoria', 'Port Elizabeth'],
            'Nigeria' => ['Lagos', 'Abuja', 'Port Harcourt', 'Kano', 'Ibadan', 'Benin City'],
            'Ghana' => ['Accra', 'Kumasi', 'Takoradi', 'Tamale', 'Ashaiman'],
            'Egypt' => ['Cairo', 'Alexandria', 'Giza', 'Sharm El Sheikh', 'Luxor'],
            'Ethiopia' => ['Addis Ababa', 'Mekelle', 'Gondar', 'Dire Dawa', 'Bahir Dar'],
            'Morocco' => ['Casablanca', 'Rabat', 'Marrakech', 'Fes', 'Tangier'],
            'Greece' => ['Athens', 'Thessaloniki', 'Patras', 'Heraklion', 'Larissa'],
            'France' => ['Paris', 'Marseille', 'Lyon', 'Toulouse', 'Nice'],
            'United Kingdom' => ['London', 'Manchester', 'Birmingham', 'Liverpool', 'Edinburgh'],
            'USA' => ['California', 'New York', 'Texas', 'Florida', 'Illinois', 'Washington'],
            'Canada' => ['Toronto', 'Vancouver', 'Montreal', 'Ottawa', 'Calgary'],
            'Germany' => ['Berlin', 'Munich', 'Hamburg', 'Frankfurt', 'Cologne'],
            'United Arab Emirates' => ['Abu Dhabi', 'Dubai', 'Sharjah', 'Ajman', 'Fujairah'],
        ];
        foreach ($regions as $countryName => $regionNames) {
            $country = Country::where('name', $countryName)->first();
            if ($country) {
                foreach ($regionNames as $regionName) {
                    DB::table('regions')->insert([
                        'country_id' => $country->id,
                        'name' => $regionName,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }
        }
    
    }
}
