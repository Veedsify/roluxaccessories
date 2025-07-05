<!-- Example usage of Configuration system in Blade templates -->

<!-- Using helper functions -->
<h1>{{ site_name() }}</h1>

@if(site_logo())
<img src="{{ site_logo() }}" alt="{{ site_name() }}" class="logo">
@endif

<!-- Contact Information -->
<div class="contact-info">
    @php $contactInfo = contact_info(); @endphp
    @if(is_array($contactInfo) && count($contactInfo) > 0)
    @foreach($contactInfo as $key => $value)
    <p><strong>{{ ucfirst(str_replace('_', ' ', $key)) }}:</strong> {{ $value }}</p>
    @endforeach
    @else
    <p>No contact information available.</p>
    @endif
</div>

<!-- Social Media Links -->
<div class="social-media">
    @php $socialMedia = social_media(); @endphp
    @if(is_array($socialMedia) && count($socialMedia) > 0)
    @foreach($socialMedia as $platform => $url)
    @if($url)
    <a href="{{ $url }}" target="_blank">{{ ucfirst(str_replace('_url', '', $platform)) }}</a>
    @endif
    @endforeach
    @else
    <p>No social media links available.</p>
    @endif
</div>

<!-- Using the config_get helper -->
<p>Site Tagline: {{ config_get('site_tagline', 'Welcome to our store') }}</p>
<p>Free Shipping Threshold: ${{ config_get('free_shipping_threshold', 50) }}</p>

<!-- Business Hours -->
@php $businessHours = json_decode(config_get('business_hours', '{}'), true); @endphp
@if($businessHours)
<div class="business-hours">
    <h3>Business Hours</h3>
    @foreach($businessHours as $day => $hours)
    <p><strong>{{ ucfirst($day) }}:</strong> {{ $hours }}</p>
    @endforeach
</div>
@endif
