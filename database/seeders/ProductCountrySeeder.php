<?php

namespace Database\Seeders;

use App\Models\ProductCountry;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductCountrySeeder extends Seeder
{
    private array $countryNames = [
        "en" => [
            "Spain",
            "Northern Cyprus",
            "Indonesia",
            "Vietnam",
            "Cambodia"
        ],
        "lt" => [
            "Ispanija",
            "Šiaurės Kipras",
            "Indonezija",
            "Vietnamas",
            "Kambodža"
        ],
        "ru" => [
            "Испания",
            "Северный Кипр",
            "Индонезия",
            "Вьетнам",
            "Камбоджа"
        ],
        "pl" => [
            "Hiszpania",
            "Cypr Północny",
            "Indonezja",
            "Wietnam",
            "Kambodża"
        ]
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProductCountry::factory()->count(5)->create();

        foreach (config('app.available_locales') as $locale) {
            static $countryId = 1;

            foreach ($this->countryNames[$locale] as $countryName) {
                DB::table('product_country_translations')->insert([
                    "name" => $countryName,
                    "locale" => $locale,
                    "product_country_id" => $countryId
                ]);
                $countryId++;
            }

            $countryId = 1;
        }
    }
}
