@php
    // Single source of truth for JSON-LD. Pages add their own nodes through $extra.
    // "@" . "context" keeps Blade from reading it as a directive.
    $siteUrl = 'https://praveshcomputers.com';
    $crumb = trim($__env->yieldContent('crumb'));
    $pageUrl = trim($__env->yieldContent('canonical')) ?: $siteUrl.'/';
    $pageName = trim($__env->yieldContent('title'));
    $pageType = trim($__env->yieldContent('page_type')) ?: 'WebPage';

    $graph = [
        [
            '@type' => ['LocalBusiness', 'ComputerStore'],
            '@id' => $siteUrl.'/#business',
            'name' => 'Pravesh Computer Services',
            'url' => $siteUrl.'/',
            'image' => asset('Frontend/assets/img/welcome/repair.avif'),
            'logo' => asset('Frontend/assets/img/brand/pcs-logo-web.png'),
            'description' => 'Laptop and computer repair service in Agra offering shop repairs and technician home visits.',
            'sameAs' => ['https://share.google/csZWSgnzKWUpfnMvM'],
            'telephone' => '+91-7579996887',
            'priceRange' => '₹₹',
            'hasMap' => 'https://maps.google.com/?q=39%2FG-106%2C%20Sky%20Tower%2C%20Sanjay%20Place%2C%20Agra%20282002',
            'address' => ['@type' => 'PostalAddress', 'streetAddress' => '39/G-106, Sky Tower, Sanjay Place', 'addressLocality' => 'Agra', 'addressRegion' => 'Uttar Pradesh', 'postalCode' => '282002', 'addressCountry' => 'IN'],
            'areaServed' => array_map(fn ($c) => ['@type' => 'City', 'name' => $c], ['Agra', 'Mathura', 'Firozabad', 'Bharatpur', 'Etmadpur', 'Fatehabad', 'Hathras']),
            'knowsAbout' => ['Laptop repair', 'Computer repair', 'Laptop screen replacement', 'Motherboard repair', 'Data recovery', 'Windows installation'],
            'hasOfferCatalog' => ['@type' => 'OfferCatalog', 'name' => 'Computer repair services', 'itemListElement' => array_map(
                fn ($n) => ['@type' => 'Offer', 'itemOffered' => ['@type' => 'Service', 'name' => $n]],
                ['Laptop repair in Agra', 'Computer home service in Agra', 'Laptop screen and motherboard repair', 'Data recovery and software support']
            )],
            'contactPoint' => [['@type' => 'ContactPoint', 'telephone' => '+91-7579996887', 'contactType' => 'customer service', 'areaServed' => 'IN', 'availableLanguage' => ['en', 'hi']]],
        ],
        [
            '@type' => 'WebSite',
            '@id' => $siteUrl.'/#website',
            'url' => $siteUrl.'/',
            'name' => 'Pravesh Computer Services',
            'inLanguage' => 'en-IN',
            'publisher' => ['@id' => $siteUrl.'/#business'],
        ],
        array_filter([
            '@type' => $pageType,
            '@id' => $pageUrl.'#webpage',
            'url' => $pageUrl,
            'name' => html_entity_decode($pageName),
            'inLanguage' => 'en-IN',
            'isPartOf' => ['@id' => $siteUrl.'/#website'],
            'about' => ['@id' => $siteUrl.'/#business'],
            'breadcrumb' => $crumb !== '' ? ['@id' => $pageUrl.'#breadcrumb'] : null,
        ]),
    ];

    if ($crumb !== '') {
        $graph[] = ['@type' => 'BreadcrumbList', '@id' => $pageUrl.'#breadcrumb', 'itemListElement' => [
            ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => $siteUrl.'/'],
            ['@type' => 'ListItem', 'position' => 2, 'name' => $crumb, 'item' => $pageUrl],
        ]];
    }

    $graph = array_merge($graph, $extra ?? []);
@endphp
<script type="application/ld+json">{!! json_encode(['@'.'context' => 'https://schema.org', '@graph' => $graph], JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE) !!}</script>
