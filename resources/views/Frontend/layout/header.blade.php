<!DOCTYPE html>
<html lang="en-IN">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Laptop & Computer Repair in Agra | Pravesh Computer Services')</title>
    <meta name="description" content="@yield('meta_description', 'Reliable laptop and computer repair in Agra with home visit and shop service. Screen, motherboard, keyboard, software and data recovery support.')">
    @hasSection('meta_keywords')<meta name="keywords" content="@yield('meta_keywords')">@endif
    <meta name="robots" content="@yield('robots', 'index, follow, max-image-preview:large')">
    <link rel="canonical" href="@yield('canonical', 'https://praveshcomputers.com/')">
    <meta property="og:locale" content="en_IN"><meta property="og:type" content="website">
    <meta property="og:site_name" content="Pravesh Computer Services">
    <meta property="og:title" content="@yield('og_title', 'Laptop & Computer Repair in Agra')">
    <meta property="og:description" content="@yield('og_description', 'Expert laptop and desktop repair, home visits and honest support across Agra.')">
    <meta property="og:url" content="@yield('canonical', 'https://praveshcomputers.com/')">
    <meta property="og:image" content="{{ asset('Frontend/assets/img/welcome/repair.avif') }}">
    <meta property="og:image:alt" content="Laptop and computer repair at Pravesh Computer Services, Agra">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('og_title', 'Laptop & Computer Repair in Agra')">
    <meta name="twitter:description" content="@yield('og_description', 'Expert laptop and desktop repair, home visits and honest support across Agra.')">
    <meta name="twitter:image" content="{{ asset('Frontend/assets/img/welcome/repair.avif') }}">
    <meta name="theme-color" content="#07111f">
    <link rel="icon" href="{{ url('/favicon.ico') }}" sizes="any">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('Frontend/assets/img/logo/apple-touch-icon.png') }}?v=2">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('Frontend/assets/img/logo/favicon-32x32.png') }}?v=2">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('Frontend/assets/img/logo/favicon-16x16.png') }}?v=2">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('Frontend/assets/img/logo/android-chrome-192x192.png') }}?v=2">
    <link rel="manifest" href="{{ asset('Frontend/assets/img/logo/site.webmanifest') }}?v=2">
    <link rel="stylesheet" href="{{ asset('Frontend/assets/css/plugins/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Frontend/assets/css/plugins/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('Frontend/assets/css/theme.css') }}">
    <link rel="stylesheet" href="{{ asset('Frontend/assets/css/typography.css') }}">
    <link rel="stylesheet" href="{{ asset('Frontend/assets/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('Frontend/assets/css/premium-home.css') }}">
    <link rel="stylesheet" href="{{ asset('Frontend/assets/css/home-marquee.css') }}">
    <link rel="stylesheet" href="{{ asset('Frontend/assets/css/hero-layout-fix.css') }}">
    <link rel="stylesheet" href="{{ asset('Frontend/assets/css/process-section.css') }}">
    <link rel="stylesheet" href="{{ asset('Frontend/assets/css/section-cta.css') }}">
    <link rel="stylesheet" href="{{ asset('Frontend/assets/css/sticky-forms.css') }}">
    <link rel="stylesheet" href="{{ asset('Frontend/assets/css/about-image-fix.css') }}">
    <link rel="stylesheet" href="{{ asset('Frontend/assets/css/header-nav-fix.css') }}">
    <link rel="stylesheet" href="{{ asset('Frontend/assets/css/popup-feedback.css') }}">
    <link rel="stylesheet" href="{{ asset('Frontend/assets/css/inner-pages.css') }}">
    <link rel="stylesheet" href="{{ asset('Frontend/assets/css/brand-logo-fix.css') }}">
    <link rel="stylesheet" href="{{ asset('Frontend/assets/css/card-icon-fix.css') }}">
    <link rel="stylesheet" href="{{ asset('Frontend/assets/css/city-pages.css') }}">
    @stack('styles')
    @hasSection('structured_data') @yield('structured_data') @else @include('Frontend.partials.schema') @endif
</head>
<body>
<a class="skip-link" href="#main-content">Skip to content</a>
<header class="premium-header" id="header">
    <div class="header-strip"><div class="premium-container strip-inner">
        <span><i class="fas fa-map-marker-alt"></i> {{ isset($cityData) ? $cityData['city'].', '.$cityData['region'] : 'Sanjay Place, Agra' }}</span>
        <span class="strip-trust"><i class="fas fa-shield-alt"></i> Honest diagnosis & dependable repair</span>
        <a href="tel:+917579996887"><i class="fas fa-phone-alt"></i> +91 75799 96887</a>
    </div></div>
    <nav class="premium-nav" aria-label="Main navigation"><div class="premium-container nav-inner">
        <a class="brand brand-logo" href="{{ route('home') }}" aria-label="Pravesh Computer Services home"><img src="{{ asset('Frontend/assets/img/brand/pcs-logo-web.png') }}" alt="Pravesh Computer Services" width="220" height="90"></a>
        <button class="nav-toggle" type="button" aria-expanded="false" aria-controls="primary-menu" aria-label="Open navigation"><span></span><span></span><span></span></button>
        <div class="nav-links" id="primary-menu">
            <a href="{{ route('home') }}">Home</a><a href="{{ route('about') }}">About</a><a href="{{ route('service') }}">Services</a><a href="{{ route('contact') }}">Contact</a>
            <a class="nav-call" href="tel:+917579996887"><i class="fas fa-phone-alt"></i> Call now</a><a class="nav-cta" href="{{ route('complaint.create') }}">Book a repair</a>
        </div>
    </div></nav>
</header>
