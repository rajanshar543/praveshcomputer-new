@extends('Frontend.layout.main')

@section('title', $cityData['title'])
@section('meta_description', $cityData['meta'])
@section('meta_keywords', 'laptop repair in '.$cityData['city'].', laptop repairing in '.$cityData['city'].', computer repair in '.$cityData['city'].', laptop service centre '.$cityData['city'].', laptop home service '.$cityData['city'])
@section('canonical', url('/'.$citySlug))
@section('og_title', 'Laptop & Computer Repair in '.$cityData['city'].' | Pravesh Computer Services')
@section('og_description', 'Practical laptop and computer repair support for customers in '.$cityData['city'].'. Call to discuss your device and confirm the right service option.')

@php
    $commonFaqs = [
        ['Which laptop brands do you repair in '.$cityData['city'].'?', 'Pravesh Computer Services supports many Dell, HP, Lenovo, Asus, Acer, Apple and MSI laptop models. Call first to confirm support for your exact model and fault.'],
        ['Can I request laptop home service in '.$cityData['city'].'?', 'Home or office visits depend on location, technician availability and the kind of repair. Call first so the suitable service option can be confirmed.'],
        ['Do you repair laptop screens and motherboards?', 'Yes, screen and motherboard faults can be assessed. The recommendation depends on diagnosis, device model and parts availability.'],
        ['Can you make a slow laptop faster?', 'Slow performance may be related to storage, memory, Windows, unwanted software or hardware condition. We can check the system and discuss compatible SSD, RAM or software options.'],
        ['Should I call before bringing the laptop?', 'Yes. A call helps us understand the symptoms, confirm availability and tell you what charger, accessories or information to bring.'],
    ];
    $allFaqs = array_merge($cityData['faqs'], $commonFaqs);
@endphp
@section('crumb', 'Laptop repair in '.$cityData['city'])
@section('structured_data')
@include('Frontend.partials.schema', ['extra' => [[
    '@type' => 'Service',
    '@id' => url('/'.$citySlug).'#service',
    'name' => 'Laptop Repair in '.$cityData['city'],
    'serviceType' => 'Laptop and Computer Repair',
    'description' => 'Laptop and computer diagnosis, hardware repair, Windows support and upgrade services for customers in '.$cityData['city'].'.',
    'areaServed' => ['@type' => 'City', 'name' => $cityData['city']],
    'provider' => ['@id' => 'https://praveshcomputers.com/#business'],
    'url' => url('/'.$citySlug),
], [
    '@type' => 'FAQPage',
    '@id' => url('/'.$citySlug).'#faq',
    'mainEntity' => array_map(fn ($f) => ['@type'=>'Question','name'=>$f[0],'acceptedAnswer'=>['@type'=>'Answer','text'=>$f[1]]], $allFaqs),
]]])
@endsection

@section('section')
<main id="main-content" class="inner-page city-page">
    <section class="city-hero">
        <div class="city-hero-orb city-hero-orb-one"></div><div class="city-hero-orb city-hero-orb-two"></div>
        <div class="premium-container city-hero-grid">
            <div class="city-hero-copy inner-reveal">
                <nav class="city-breadcrumb" aria-label="Breadcrumb"><a href="{{ route('home') }}">Home</a><i class="fas fa-chevron-right"></i><span>{{ $cityData['city'] }}</span></nav>
                <span class="city-overline"><i class="fas fa-map-marker-alt"></i> Repair support for {{ $cityData['city'] }}</span>
                <h1>Laptop Repair in <em>{{ $cityData['city'] }}</em></h1>
                <p>{{ $cityData['intro'] }} Speak directly with our team about the fault, service route and availability before taking the next step.</p>
                <div class="inner-actions city-hero-actions"><button type="button" class="inner-btn inner-btn-primary" data-popup-open="complaint-popup">Register a repair <i class="fas fa-arrow-right"></i></button><a class="inner-btn inner-btn-outline" href="tel:+917579996887"><i class="fas fa-phone-alt"></i> Call a technician</a></div>
                <div class="city-hero-trust"><span><i class="fas fa-check"></i> Clear diagnosis</span><span><i class="fas fa-check"></i> Multi-brand support</span><span><i class="fas fa-check"></i> Practical advice</span></div>
            </div>
            <div class="city-hero-visual inner-reveal">
                <div class="city-hero-image"><img src="{{ asset('Frontend/assets/img/newone/indexmain2.jpg') }}" alt="Laptop motherboard repair and computer service for {{ $cityData['city'] }}" width="720" height="840"><div class="city-image-shade"></div></div>
                <div class="city-float-card city-float-top"><i class="fas fa-tools"></i><div><strong>Hardware + software</strong><span>Support under one roof</span></div></div>
                <div class="city-float-card city-float-bottom"><span class="city-status-dot"></span><div><strong>Need help today?</strong><a href="tel:+917579996887">+91 75799 96887</a></div></div>
            </div>
        </div>
        <div class="premium-container city-hero-bar"><div><strong>01</strong><span>Laptop & desktop</span></div><div><strong>02</strong><span>Home + office enquiry</span></div><div><strong>03</strong><span>Call-first confirmation</span></div></div>
    </section>

    <section class="city-brand-band" aria-label="Supported laptop brands"><div class="premium-container"><p>Support for leading laptop brands</p><div class="city-brand-list">@foreach([['dell.png','Dell'],['hp.png','HP'],['lenovo.jpg','Lenovo'],['asus.png','Asus'],['acer.png','Acer'],['apple__1_-removebg-preview.png','Apple'],['MSI-Logo.png','MSI']] as $brand)<span><img src="{{ asset('Frontend/assets/img/brands/'.$brand[0]) }}" alt="{{ $brand[1] }} laptop repair support" loading="lazy"><small>{{ $brand[1] }}</small></span>@endforeach</div></div></section>

    <section class="inner-section city-intro-section"><div class="premium-container city-intro-grid">
        <div class="city-intro-copy"><span class="inner-kicker">Computer repair near {{ $cityData['city'] }}</span><h2>A considered repair starts with the right diagnosis.</h2><p>Unexpected shutdowns, broken screens, charging faults and slow performance can have more than one cause. We begin by understanding the symptoms and checking the device instead of suggesting a replacement without context.</p><p>{{ $cityData['context'] }}</p><p>{{ $cityData['issues'] }}</p><p>{{ $cityData['local_note'] }}</p>@if(!empty($cityData['areas']))<p><strong>Areas we serve in Agra:</strong> {{ implode(', ', $cityData['areas']) }}.</p>@endif<div class="city-note"><i class="fas fa-map-marked-alt"></i><div><strong>Service information for {{ $cityData['city'] }}</strong><span>{{ $cityData['service_mode'] }}</span></div></div></div>
        <aside class="city-contact-card"><span>Talk before you travel</span><h2>Tell us what your laptop is doing.</h2><p>Keep the brand, model and main symptoms ready. Our team will help you understand the appropriate next step.</p><a href="tel:+917579996887"><i class="fas fa-phone-alt"></i><span><small>Speak with a technician</small><strong>+91 75799 96887</strong></span></a><button type="button" data-popup-open="enquiry-popup">Send an online enquiry <i class="fas fa-arrow-right"></i></button></aside>
    </div></section>

    <section class="inner-section city-services-section"><div class="premium-container"><div class="city-section-heading"><div><span class="inner-kicker">Laptop repair services in {{ $cityData['city'] }}</span><h2>Solutions for the faults that interrupt your day.</h2></div><p>From a laptop that will not start to a system that has become painfully slow, our service covers common hardware and software problems across major brands.</p></div><div class="city-service-grid">
        @foreach([
            ['fas fa-microchip','Motherboard & power faults','Dead laptop, charging, damaged ports, overheating and component-level fault assessment.'],
            ['fas fa-laptop','Screen & display repair','Support for cracked, flickering, dim, lined or non-working laptop displays.'],
            ['fas fa-keyboard','Keyboard, hinge & body','Keyboard, touchpad, hinge, panel and everyday physical-damage repairs.'],
            ['fab fa-windows','Windows & software support','Windows installation, drivers, essential software, virus cleanup and troubleshooting.'],
            ['fas fa-hdd','Storage & data assessment','Initial checks for inaccessible storage, deleted files, damaged drives and backup choices.'],
            ['fas fa-tachometer-alt','SSD & RAM upgrades','Compatible storage and memory upgrades for faster startup and smoother daily use.'],
        ] as $index => $service)<article><span class="city-service-number">0{{ $index + 1 }}</span><div class="city-service-icon"><i class="{{ $service[0] }}"></i></div><h3>{{ $service[1] }}</h3><p>{{ $service[2] }}</p><button type="button" data-popup-open="complaint-popup">Discuss this repair <i class="fas fa-arrow-right"></i></button></article>@endforeach
    </div></div></section>

    <section class="city-why-section"><div class="premium-container city-why-grid"><div class="city-why-visual"><img src="{{ asset('Frontend/assets/img/newone/indexmain.jpg') }}" alt="Laptop motherboard diagnosis and computer repair service" loading="lazy"><div><strong>Clear advice.</strong><span>Before the repair decision.</span></div></div><div class="city-why-copy"><span class="inner-kicker light">Why Pravesh Computer Services</span><h2>Repair guidance that stays clear and practical.</h2><p>Good service is not only about opening a laptop. It is about listening to the problem, checking the possible cause and explaining what can reasonably be done.</p><ul><li><i class="fas fa-check"></i><span><strong>Fault-led diagnosis</strong>We investigate the symptom before recommending the repair route.</span></li><li><i class="fas fa-check"></i><span><strong>Support across major brands</strong>Service for many Dell, HP, Lenovo, Acer, Asus, Apple and MSI devices.</span></li><li><i class="fas fa-check"></i><span><strong>Availability discussed first</strong>Call ahead for location, model and service-option confirmation.</span></li></ul><button type="button" class="inner-btn inner-btn-primary" data-popup-open="enquiry-popup">Enquire about your device</button></div></div></section>

    <section class="inner-section city-process-section"><div class="premium-container"><div class="city-process-heading"><span class="inner-kicker">A straightforward process</span><h2>From the first conversation to an informed repair decision.</h2><a href="tel:+917579996887">Start with a call <i class="fas fa-arrow-right"></i></a></div><div class="city-process-grid">@foreach([['fa-comment-alt','Share the symptoms','Tell us the device model, problem and your location in '.$cityData['city'].'.'],['fa-route','Confirm the service route','We discuss availability and the suitable inspection option before you travel.'],['fa-search','Get the device checked','The laptop or computer is inspected to identify the likely hardware or software fault.'],['fa-clipboard-check','Choose the next step','The available repair approach is explained so you can decide with better clarity.']] as $index => $step)<article><b>0{{ $index + 1 }}</b><div><i class="fas {{ $step[0] }}"></i></div><h3>{{ $step[1] }}</h3><p>{{ $step[2] }}</p></article>@endforeach</div></div></section>

    <section class="inner-section city-location-section"><div class="premium-container city-location-card"><div><span class="inner-kicker">Laptop service for {{ $cityData['city'] }}</span><h2>One conversation can save an unnecessary trip.</h2><p>{{ $cityData['service_mode'] }} Describe the issue on call and confirm the service option that fits your device and location.</p><div class="city-location-points"><span><i class="fas fa-store"></i><small>Repair desk</small><strong>Sanjay Place, Agra</strong></span><span><i class="fas fa-phone-alt"></i><small>Call for availability</small><strong>+91 75799 96887</strong></span></div><div class="inner-actions"><button type="button" class="inner-btn inner-btn-primary" data-popup-open="complaint-popup">Register complaint</button><a class="inner-btn city-light-btn" href="tel:+917579996887">Call now</a></div></div><div class="city-location-mark"><i class="fas fa-map-marker-alt"></i><strong>{{ $cityData['city'] }}</strong><span>{{ $cityData['region'] }}</span></div></div></section>

    <section class="inner-section city-faq-section"><div class="premium-container city-faq-grid"><div class="city-faq-intro"><span class="inner-kicker">Frequently asked questions</span><h2>Before you book laptop repair in {{ $cityData['city'] }}.</h2><p>Useful answers about brands, common faults and service availability.</p><button type="button" class="inner-btn inner-btn-primary" data-popup-open="enquiry-popup">Ask another question</button></div><div class="city-faq-list">@foreach($allFaqs as $i => $faq)<details @if($i === 0) open @endif><summary>{{ $faq[0] }}<i class="fas fa-plus"></i></summary><p>{{ $faq[1] }}</p></details>@endforeach</div></div></section>

    <section class="city-area-links"><div class="premium-container"><div><span class="inner-kicker">Nearby service pages</span><h2>Explore laptop repair support in other cities.</h2></div><nav aria-label="Nearby service areas">@foreach($cities as $slug => $area)@if($slug !== $citySlug)<a href="{{ route('city.service', $slug) }}">Laptop repair in {{ $area['city'] }} <i class="fas fa-arrow-right"></i></a>@endif @endforeach</nav></div></section>
    <section class="inner-cta"><div class="premium-container inner-cta-grid"><div><span>Need laptop repair in {{ $cityData['city'] }}?</span><h2>Tell us the fault. We’ll help you plan the next step.</h2></div><div class="inner-actions"><button type="button" class="inner-btn inner-btn-light" data-popup-open="complaint-popup">Register a repair</button><a class="inner-btn inner-btn-dark" href="tel:+917579996887"><i class="fas fa-phone-alt"></i> Call now</a></div></div></section>
</main>
@endsection
