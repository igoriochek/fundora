<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    private array $prices = [
        "en" => "Price from 190,000$, Villa area: 102 m² / Plot: 120 m",
        "lt" => "Kaina nuo 190,000$, Vilos plotas: 102 m² / Sklypas: 120 m",
        "ru" => "Цена от 190 000$, Площадь виллы: 102 м² / Участок: 120 м",
        "pl" => "Cena od 190,000$, Powierzchnia willi: 102 m² / Działka: 120 m"
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::factory()->count(20)->create();

        for ($productId = 1; $productId <= Product::count(); $productId++) {
            foreach (config('app.available_locales') as $locale) {

                DB::table('product_translations')->insert([
                    "name" => $locale . ": " . fake()->name(),
                    "description" => $locale . ": " . fake()->text(rand(200, 300)),
                    "price" => $this->prices[$locale],
                    "main_advantages" => $locale . ": " . fake()->text(100),
                    "locale" => $locale,
                    "product_id" => $productId,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }
        }
    }
}
