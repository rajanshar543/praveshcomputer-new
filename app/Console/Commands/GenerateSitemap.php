<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class GenerateSitemap extends Command
{
    protected $signature = 'sitemap:generate';
    protected $description = 'Generate sitemap for website';

    public function handle()
    {
        $sitemap = Sitemap::create();
        $siteUrl = 'https://praveshcomputers.com';

        // Public static and local SEO landing pages.
        $staticPages = [
            '/',
            '/about-us',
            '/contact-us',
            '/laptop-computer-repair-services',
            '/laptop-repairing-in-agra',
            '/laptop-repairing-in-mathura',
            '/laptop-repairing-in-firozabad',
            '/laptop-repairing-in-bharatpur',
            '/laptop-repairing-in-etmadpur',
            '/laptop-repairing-in-fatehabad',
            '/laptop-repairing-in-hathras',
        ];

        foreach ($staticPages as $page) {
            $sitemap->add(Url::create($siteUrl.$page));
        }

        // Write only URLs that have a public GET route.
        $sitemap->writeToFile(public_path('sitemap.xml'));

        $this->info('Sitemap generated successfully at /public/sitemap.xml');
    }
}
