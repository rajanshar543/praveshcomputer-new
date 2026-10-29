@extends('Frontend.layout.main')

@section('title', 'Book a Laptop Repair in Agra | Pravesh Computer Services')
@section('meta_description', 'Register your laptop or computer repair request with Pravesh Computer Services. Share device details and preferred visit time for support in Agra.')
@section('canonical', url('/register-repair-complaint'))
@section('robots', 'noindex, follow')
@section('crumb', 'Book a repair')

@section('section')
<main id="main-content" class="inner-page complaint-page">
    <section class="complaint-hero"><div class="premium-container complaint-hero-grid"><div><span class="inner-eyebrow">Laptop & computer repair request</span><h1>Tell us what is wrong.<br><em>We’ll help plan the next step.</em></h1><p>Share your device details and preferred service time. Our team will review the request and contact you to confirm availability.</p><div class="complaint-trust"><span><i class="fas fa-map-marker-alt"></i> Agra service area</span><span><i class="fas fa-comments"></i> Clear confirmation</span><span><i class="fas fa-tools"></i> Hardware + software</span></div></div><div class="complaint-hero-image"><img src="{{ asset('Frontend/assets/img/welcome/laptoprepair.jpg') }}" alt="Laptop repair request in Agra" width="800" height="650"></div></div></section>

    <section class="complaint-form-section"><div class="premium-container complaint-layout"><aside class="complaint-aside"><span class="inner-kicker">Before you submit</span><h2>A few details help us understand the repair</h2><div class="complaint-steps"><div><b>01</b><span><strong>Describe the device</strong><small>Tell us the type, brand and symptoms.</small></span></div><div><b>02</b><span><strong>Choose a convenient time</strong><small>Add a preferred date and time window.</small></span></div><div><b>03</b><span><strong>Wait for confirmation</strong><small>We will call to discuss the next step.</small></span></div></div><div class="aside-call"><i class="fas fa-phone" aria-hidden="true"></i><div><small>Need immediate guidance?</small><a href="tel:+917579996887">+91 75799 96887</a></div></div></aside>
        <div class="complaint-form-card">
            <div class="form-card-heading"><span>Repair request form</span><h2>Register your complaint</h2><p>Fields marked with an asterisk are required.</p></div>
            @if(session('success'))<div class="page-alert success"><i class="fas fa-check-circle"></i><span>{{ session('success') }}</span></div>@endif
            @if($errors->any())<div class="page-alert error"><i class="fas fa-exclamation-circle"></i><span>Please check the highlighted fields and submit again.</span></div>@endif
            <form action="{{ route('complaint.store') }}" method="POST" class="inner-form">@csrf<div class="inner-form-grid">
                <label><span>Full name *</span><input type="text" name="name" value="{{ old('name') }}" maxlength="100" required autocomplete="name">@error('name')<small>{{ $message }}</small>@enderror</label>
                <label><span>Phone number *</span><input type="tel" name="phone" value="{{ old('phone') }}" maxlength="15" required autocomplete="tel">@error('phone')<small>{{ $message }}</small>@enderror</label>
                <label><span>Email address</span><input type="email" name="email" value="{{ old('email') }}" maxlength="150" autocomplete="email">@error('email')<small>{{ $message }}</small>@enderror</label>
                <label><span>Device type *</span><select name="device_type" required><option value="">Select device</option>@foreach(['Laptop','Desktop','Printer','Other'] as $device)<option value="{{ $device }}" @selected(old('device_type')===$device)>{{ $device }}</option>@endforeach</select>@error('device_type')<small>{{ $message }}</small>@enderror</label>
                <label class="form-wide"><span>Full address in Agra *</span><textarea name="address" rows="2" maxlength="255" required autocomplete="street-address">{{ old('address') }}</textarea>@error('address')<small>{{ $message }}</small>@enderror</label>
                <label><span>Brand *</span><input type="text" name="brand" value="{{ old('brand') }}" maxlength="100" required placeholder="Dell, HP, Lenovo...">@error('brand')<small>{{ $message }}</small>@enderror</label>
                <label><span>Urgency *</span><select name="urgency" required><option value="Normal" @selected(old('urgency','Normal')==='Normal')>Normal</option><option value="Urgent" @selected(old('urgency')==='Urgent')>Urgent</option></select>@error('urgency')<small>{{ $message }}</small>@enderror</label>
                <label class="form-wide"><span>Problem description *</span><textarea name="problem" rows="4" maxlength="1000" required placeholder="Describe what happens when you use or switch on the device...">{{ old('problem') }}</textarea>@error('problem')<small>{{ $message }}</small>@enderror</label>
                <label><span>Preferred visit date</span><input type="date" name="visit_date" value="{{ old('visit_date') }}" min="{{ now()->toDateString() }}">@error('visit_date')<small>{{ $message }}</small>@enderror</label>
                <label><span>Preferred time</span><select name="time_slot"><option value="">Select time</option>@foreach(['Morning (9AM - 12PM)','Afternoon (12PM - 4PM)','Evening (4PM - 8PM)'] as $slot)<option value="{{ $slot }}" @selected(old('time_slot')===$slot)>{{ $slot }}</option>@endforeach</select>@error('time_slot')<small>{{ $message }}</small>@enderror</label>
            </div><button class="inner-submit" type="submit">Register complaint <i class="fas fa-arrow-right"></i></button><p class="form-privacy"><i class="fas fa-lock"></i> Your details are used only to respond to this service request.</p></form>
        </div>
    </div></section>
</main>
@endsection
