@extends('Frontend.layout.main')

@section('title', 'Contact Pravesh Computer Services | Laptop Repair Agra')
@section('meta_description', 'Contact Pravesh Computer Services at 39/G-106, Sky Tower, Sanjay Place, Agra. Call +91 75799 96887 for laptop repair, desktop support or a home visit.')
@section('canonical', url('/contact-us'))
@section('crumb', 'Contact us')
@section('page_type', 'ContactPage')

@section('section')
<main id="main-content" class="inner-page">
    <section class="inner-hero compact-hero inner-hero-contact"><div class="inner-hero-media"><img src="{{ asset('Frontend/assets/img/newone/contactmain.jpg') }}" alt="Contact Pravesh Computer Services in Agra" width="1600" height="900"></div><div class="premium-container inner-hero-content"><span class="inner-eyebrow">Contact our Agra service centre</span><h1>Contact our Agra repair team.<br><em>Let’s talk about your computer problem.</em></h1><p>Call, visit our Sanjay Place shop or send your question using the form below.</p></div></section>

    <section class="contact-cards-wrap"><div class="premium-container contact-card-grid">
        <a class="contact-phone-card" href="tel:+917579996887"><span aria-hidden="true"><i class="fas fa-phone"></i></span><small>Call our team</small><strong>+91 75799 96887</strong><em>Alternate: +91 75340 21831</em></a>
        <a href="mailto:rajanshar534@gmail.com"><span><i class="fas fa-envelope"></i></span><small>Email us</small><strong>rajanshar534@gmail.com</strong><em>Send details of your requirement</em></a>
        <a href="https://maps.google.com/?q=39%2FG-106%2C%20Sky%20Tower%2C%20Sanjay%20Place%2C%20Agra%20282002" target="_blank" rel="noopener"><span><i class="fas fa-map-marker-alt"></i></span><small>Visit our shop</small><strong>39/G-106, Sky Tower</strong><em>Sanjay Place, Agra 282002</em></a>
    </div></section>

    <section class="inner-section contact-main-section"><div class="premium-container contact-main-grid"><div class="contact-form-card inner-reveal"><span class="inner-kicker">Send an enquiry</span><h2>How can we help?</h2><p>Share the device problem or service question. Required fields are marked with an asterisk.</p>
        @if(session('success'))<div class="page-alert success"><i class="fas fa-check-circle"></i><span>{{ session('success') }}</span></div>@endif
        @if($errors->any())<div class="page-alert error"><i class="fas fa-exclamation-circle"></i><span>Please check the highlighted fields and try again.</span></div>@endif
        <form action="{{ route('contact.store') }}" method="POST" class="inner-form">@csrf<div class="inner-form-grid">
            <label><span>First name *</span><input type="text" name="first_name" value="{{ old('first_name') }}" maxlength="50" required autocomplete="given-name">@error('first_name')<small>{{ $message }}</small>@enderror</label>
            <label><span>Last name *</span><input type="text" name="last_name" value="{{ old('last_name') }}" maxlength="50" required autocomplete="family-name">@error('last_name')<small>{{ $message }}</small>@enderror</label>
            <label><span>Mobile number *</span><input type="tel" name="mobile" value="{{ old('mobile') }}" maxlength="15" required autocomplete="tel">@error('mobile')<small>{{ $message }}</small>@enderror</label>
            <label><span>Email address</span><input type="email" name="email" value="{{ old('email') }}" maxlength="150" autocomplete="email">@error('email')<small>{{ $message }}</small>@enderror</label>
            <label class="form-wide"><span>Your message *</span><textarea name="message" rows="5" maxlength="1000" required placeholder="Tell us about the device or service you need...">{{ old('message') }}</textarea>@error('message')<small>{{ $message }}</small>@enderror</label>
        </div><button class="inner-submit" type="submit">Send enquiry <i class="fas fa-arrow-right"></i></button></form>
    </div><aside class="contact-side inner-reveal"><div class="hours-card"><span class="inner-kicker light">Opening hours</span><h2>Visit at a convenient time</h2><div class="hours-list"><div><span>Monday – Saturday</span><strong>9:00 AM – 8:30 PM</strong></div><div><span>Sunday</span><strong>9:00 AM – 8:30 PM</strong></div></div><p>Calling before your visit helps us understand the device issue and confirm availability.</p><a href="tel:+917579996887"><i class="fas fa-phone-alt"></i> Call before visiting</a></div><div class="visit-note"><i class="fas fa-home"></i><div><strong>Need doorstep support?</strong><span>Call us to check home-service availability for your area and issue.</span></div></div></aside></div></section>

    <section class="map-section"><iframe title="Pravesh Computer Services location in Sanjay Place, Agra" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3548.580357627434!2d78.005753!3d27.200923099999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3974777f29eb7753%3A0xcad5869ee5a0b23e!2sPravesh%20Computer%20Services!5e0!3m2!1sen!2sin!4v1752231599347!5m2!1sen!2sin" width="1200" height="480" style="border:0" allowfullscreen loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></section>
</main>
@endsection
