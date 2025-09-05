<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PageSeeder extends Seeder
{
    private array $pages = [
        [
            'uri' => 'about-us',
            'alias' => 'aboutUs'
        ],
        [
            'uri' => 'services',
            'alias' => 'services'
        ],
        [
            'uri' => 'faq',
            'alias' => 'faq'
        ]
    ];

    private array $pageData = [
        'en' => [
            'names' => [
                'About us',
                'Services',
                'FAQ'
            ],
            'titles' => [
                'Fundora – Global Real Estate Opportunities',
                'Our Services',
                'FAQ'
            ]
        ],
        'lt' => [
            'names' => [
                'Apie mus',
                'Paslaugos',
                'DUK'
            ],
            'titles' => [
                'Fundora – Global Real Estate Opportunities',
                'Paslaugos',
                'Dažnai užduodami klausimai'
            ]
        ],
        'ru' => [
            'names' => [
                'О нас',
                'Услуги',
                'FAQ'
            ],
            'titles' => [
                'Fundora – Global Real Estate Opportunities',
                'Наши услуги',
                'Часто задаваемые вопросы'
            ]
        ],
        'pl' => [
            'names' => [
                'O nas',
                'Usługi',
                'FAQ'
            ],
            'titles' => [
                'Fundora – Global Real Estate Opportunities',
                'Usługi',
                'Często zadawane pytania'
            ]
        ]
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->pages as $page) {
            Page::factory()->create([
                'uri' => $page['uri'],
                'alias' => $page['alias']
            ]);
        }

        foreach (config('app.available_locales') as $locale) {

            for ($i = 0; $i < count($this->pages); $i++) {
                $currentPageData = $this->pageData[$locale];

                DB::table('page_translations')->insert([
                    "name" => $currentPageData['names'][$i],
                    "title" => $currentPageData['titles'][$i],
                    "locale" => $locale,
                    "page_id" => $i + 1,
                    "created_at" => now(),
                    "updated_at" => now()
                ]);
            }
        }
    }
}
