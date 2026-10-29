<div class="section-cta reveal">
    <div class="section-cta-copy">
        <span>{{ $label ?? 'Need help with your device?' }}</span>
        <strong>{{ $text ?? 'Tell us the problem and get the right next step.' }}</strong>
    </div>
    <div class="section-cta-actions">
        <a class="section-cta-primary" href="{{ route('complaint.create') }}">
            <i class="fas fa-tools" aria-hidden="true"></i> Register a complaint
        </a>
        <a class="section-cta-call" href="tel:+917579996887">
            <i class="fas fa-phone-alt" aria-hidden="true"></i> Call now
        </a>
    </div>
</div>
