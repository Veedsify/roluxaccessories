@extends('layouts.app')

@section('content')
<div class="home-page">
    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <h1>Welcome to {{ site_name() }}</h1>

            @if(config_get('site_tagline'))
            <p class="hero-tagline">{{ config_get('site_tagline') }}</p>
            @endif

            @if(config_get('about_us'))
            <p class="hero-description">{{ config_get('about_us') }}</p>
            @endif

            <!-- Free Shipping Banner -->
            @if(config_get('free_shipping_threshold'))
            <div class="shipping-banner">
                <p>🚚 Free shipping on orders over {{ config_get('currency_symbol', '$') }}{{ config_get('free_shipping_threshold') }}!</p>
            </div>
            @endif
        </div>
    </section>

    <!-- Contact Section -->
    <section class="contact-section">
        <div class="container">
            <h2>Get in Touch</h2>

            <div class="contact-grid">
                @foreach(contact_info() as $key => $value)
                @if($value && $key !== 'business_hours')
                <div class="contact-card">
                    @if($key === 'contact_email')
                    <h3>📧 Email</h3>
                    <p><a href="mailto:{{ $value }}">{{ $value }}</a></p>
                    @elseif($key === 'contact_phone')
                    <h3>📞 Phone</h3>
                    <p><a href="tel:{{ $value }}">{{ $value }}</a></p>
                    @elseif($key === 'contact_address')
                    <h3>📍 Address</h3>
                    <p>{{ $value }}</p>
                    @endif
                </div>
                @endif
                @endforeach
            </div>
        </div>
    </section>

    <!-- Business Hours -->
    @php $businessHours = json_decode(config_get('business_hours', '{}'), true); @endphp
    @if($businessHours)
    <section class="business-hours-section">
        <div class="container">
            <h2>Business Hours</h2>
            <div class="hours-grid">
                @foreach($businessHours as $day => $hours)
                <div class="hour-item {{ strtolower($day) === strtolower(date('l')) ? 'today' : '' }}">
                    <span class="day">{{ ucfirst($day) }}</span>
                    <span class="time">{{ $hours }}</span>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif
</div>

<style>
    /* Basic styling for the components */
    .hero {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 4rem 0;
        text-align: center;
    }

    .hero h1 {
        font-size: 3rem;
        margin-bottom: 1rem;
    }

    .hero-tagline {
        font-size: 1.5rem;
        margin-bottom: 1rem;
        opacity: 0.9;
    }

    .hero-description {
        font-size: 1.1rem;
        max-width: 600px;
        margin: 0 auto 2rem;
        opacity: 0.8;
    }

    .shipping-banner {
        background: rgba(255, 255, 255, 0.2);
        padding: 1rem;
        border-radius: 8px;
        margin-top: 2rem;
    }

    .contact-section,
    .business-hours-section {
        padding: 3rem 0;
    }

    .contact-grid,
    .hours-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 2rem;
        margin-top: 2rem;
    }

    .contact-card {
        background: #f8f9fa;
        padding: 2rem;
        border-radius: 8px;
        text-align: center;
    }

    .contact-card h3 {
        margin-bottom: 1rem;
        color: #495057;
    }

    .contact-card a {
        color: #007bff;
        text-decoration: none;
    }

    .contact-card a:hover {
        text-decoration: underline;
    }

    .hour-item {
        display: flex;
        justify-content: space-between;
        padding: 1rem;
        background: #f8f9fa;
        border-radius: 4px;
    }

    .hour-item.today {
        background: #e3f2fd;
        font-weight: bold;
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 1rem;
    }

    .site-header {
        background: white;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        padding: 1rem 0;
    }

    .header-content {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 1rem;
    }

    .brand {
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .site-logo {
        height: 50px;
        width: auto;
    }

    .social-links {
        display: flex;
        gap: 1rem;
    }

    .social-link {
        color: #495057;
        text-decoration: none;
        padding: 0.5rem;
    }

    .social-link:hover {
        color: #007bff;
    }

    .site-footer {
        background: #343a40;
        color: white;
        padding: 2rem 0 1rem;
        margin-top: auto;
    }

    .footer-content {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 2rem;
        margin-bottom: 2rem;
    }

    .footer-bottom {
        text-align: center;
        padding-top: 1rem;
        border-top: 1px solid #495057;
        opacity: 0.8;
    }

</style>
@endsection
