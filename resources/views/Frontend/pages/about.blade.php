@extends('Frontend.layout.main')

@section('title', 'About Us | Laptop & Computer Repair in Agra | Pravesh')
@section('meta_description', 'Meet Pravesh Computer Services, a local Agra team for honest laptop and computer diagnosis, hardware repairs, software support and home visits.')
@section('canonical', url('/about-us'))
@section('crumb', 'About us')
@section('page_type', 'AboutPage')

@section('section')
<main id="main-content" class="inner-page">
    <section class="inner-hero inner-hero-about">
        <div class="inner-hero-media"><img src="{{ asset('Frontend/assets/img/about/main.jpg') }}" alt="Computer technician working at Pravesh Computer Services in Agra" width="1600" height="900"></div>
        <div class="premium-container inner-hero-content">
            <span class="inner-eyebrow">About Pravesh Computer Services</span>
            <h1>Agra laptop repair experts.<br><em>Clear, practical advice.</em></h1>
            <p>We help Agra’s homes, students and businesses keep their laptops and computers working—with careful diagnosis and repair options explained in plain language.</p>
            <div class="inner-actions"><a class="inner-btn inner-btn-primary" href="{{ route('complaint.create') }}">Register a repair <i class="fas fa-arrow-right"></i></a><a class="inner-btn inner-btn-outline" href="tel:+917579996887"><i class="fas fa-phone-alt"></i> Speak with us</a></div>
        </div>
    </section>

    <section class="inner-section" id="at-a-glance">
        <div class="premium-container inner-copy">
            <span class="inner-kicker">At a glance</span>
            <h2>What is Pravesh Computer Services?</h2>
            <p>Pravesh Computer Services is a laptop and computer repair shop at Sanjay Place, Agra, Uttar Pradesh. We diagnose and repair laptops and desktops, install Windows and software, upgrade SSD and RAM, assess data recovery, and offer technician home visits in Agra subject to availability.</p>
            <ul>
                <li><strong>Address:</strong> 39/G-106, Sky Tower, Sanjay Place, Agra, Uttar Pradesh 282002</li>
                <li><strong>Phone:</strong> +91 75799 96887 (alternate +91 75340 21831)</li>
                <li><strong>Services:</strong> laptop screen replacement, motherboard and charging-fault repair, keyboard and hinge repair, MacBook repair, monitor repair, Windows and software support, data recovery assessment, SSD and RAM upgrades</li>
                <li><strong>Brands:</strong> HP, Dell, Lenovo, Acer, Asus, Apple and MSI</li>
                <li><strong>Service areas:</strong> Agra, Mathura, Firozabad, Bharatpur, Etmadpur, Fatehabad and Hathras</li>
                <li><strong>How to start:</strong> call, WhatsApp or <a href="{{ route('complaint.create') }}">register a repair online</a> with the device model and fault</li>
            </ul>
        </div>
    </section>

    <section class="inner-section story-section">
        <div class="premium-container story-grid">
            <div class="story-image inner-reveal"><img src="{{ asset('Frontend/assets/img/newone/indexmain2.jpg') }}" alt="Computer technician repairing laptop hardware and motherboard components" width="1024" height="1024" loading="lazy"><div class="story-badge"><strong>Agra</strong><span>Local repair support</span></div></div>
            <div class="inner-copy inner-reveal"><span class="inner-kicker">Who we are</span><h2>A neighbourhood computer service built on straightforward support</h2><p>Pravesh Computer Services was started with a simple goal: make laptop and desktop repair easier to understand. We inspect the problem carefully, explain what we find and recommend the option that makes practical sense for the device.</p><p>From our Sanjay Place workshop, we support students, families, professionals and small offices across Agra. Suitable issues can also be handled through a pre-confirmed home or office visit.</p><div class="inner-check-grid"><span><i class="fas fa-check"></i> Honest diagnosis</span><span><i class="fas fa-check"></i> Hardware expertise</span><span><i class="fas fa-check"></i> Software support</span><span><i class="fas fa-check"></i> Home visit options</span></div><a class="inner-text-link" href="{{ route('service') }}">Explore our repair services <i class="fas fa-arrow-right"></i></a></div>
        </div>
    </section>

    <section class="inner-section inner-soft-section">
        <div class="premium-container"><div class="inner-heading centered"><span class="inner-kicker">How we work</span><h2>Care and clarity at every step</h2><p>Good repair service begins before a screwdriver is picked up.</p></div><div class="value-grid">
            <article class="inner-reveal"><span>01</span><i class="fas fa-search"></i><h3>Listen first</h3><p>We understand the symptoms, when the problem started and how the device is normally used.</p></article>
            <article class="inner-reveal"><span>02</span><i class="fas fa-microchip"></i><h3>Diagnose carefully</h3><p>Hardware and software possibilities are checked before a repair recommendation is made.</p></article>
            <article class="inner-reveal"><span>03</span><i class="fas fa-comments"></i><h3>Explain clearly</h3><p>You receive a practical explanation of the issue and the available next steps.</p></article>
            <article class="inner-reveal"><span>04</span><i class="fas fa-tools"></i><h3>Repair responsibly</h3><p>Your device is handled carefully, with attention to reliability and everyday usability.</p></article>
        </div></div>
    </section>

    <section class="inner-section about-service-band"><div class="premium-container about-band-grid"><div><span class="inner-kicker light">What we support</span><h2>One local team for everyday computer problems</h2><p>Laptop screens, hinges, charging faults, motherboards, Windows issues, upgrades, data recovery assessments and desktop support—all available in one place.</p></div><div class="about-stats"><div><strong>Shop</strong><span>Walk-in repairs</span></div><div><strong>Home</strong><span>Visits by availability</span></div><div><strong>Major</strong><span>Laptop brands</span></div><div><strong>Agra</strong><span>Local assistance</span></div></div></div></section>

    <section class="inner-section brand-section"><div class="premium-container"><div class="inner-heading centered"><span class="inner-kicker">Devices we handle</span><h2>Support for major laptop brands</h2></div><div class="inner-brand-grid">@foreach([['apple__1_-removebg-preview.png','Apple'],['hp-removebg-preview.png','HP'],['dell-removebg-preview.png','Dell'],['lenovo-removebg-preview.png','Lenovo'],['asus-removebg-preview.png','Asus'],['acer-removebg-preview.png','Acer'],['MSI-Logo-removebg-preview.png','MSI']] as $brand)<div class="brand-{{ strtolower($brand[1]) }}"><img src="{{ asset('Frontend/assets/img/brands/'.$brand[0]) }}" alt="{{ $brand[1] }} laptop service" loading="lazy"></div>@endforeach</div></div></section>

    <section class="inner-cta"><div class="premium-container inner-cta-grid"><div><span>Need an experienced local technician?</span><h2>Tell us what is wrong with your device.</h2></div><div class="inner-actions"><a class="inner-btn inner-btn-light" href="{{ route('complaint.create') }}">Register complaint</a><a class="inner-btn inner-btn-dark" href="tel:+917579996887">Call +91 75799 96887</a></div></div></section>
</main>
@endsection
