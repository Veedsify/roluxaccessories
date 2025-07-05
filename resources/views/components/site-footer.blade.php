<footer class="site-footer">
    <div class="container">
        <div class="footer-content">
            <!-- Company Information -->
            <div class="footer-section">
                <h3>{{ site_name() }}</h3>

                @if(config_get('about_us'))
                <p class="about">{{ config_get('about_us') }}</p>
                @endif

                <!-- Contact Information -->
                <div class="contact-info">
                    @foreach(contact_info() as $key => $value)
                    @if($value && $key !== 'business_hours')
                    <p class="contact-item">
                        <strong>{{ ucfirst(str_replace(['_', 'contact_'], [' ', ''], $key)) }}:</strong>
                        @if($key === 'contact_email')
                        <a href="mailto:{{ $value }}">{{ $value }}</a>
                        @elseif($key === 'contact_phone')
                        <a href="tel:{{ $value }}">{{ $value }}</a>
                        @else
                        {{ $value }}
                        @endif
                    </p>
                    @endif
                    @endforeach
                </div>
            </div>

            <!-- Business Hours -->
            @php $businessHours = json_decode(config_get('business_hours', '{}'), true); @endphp
            @if($businessHours)
            <div class="footer-section">
                <h3>Business Hours</h3>
                <div class="business-hours">
                    @foreach($businessHours as $day => $hours)
                    <p class="hours-item">
                        <span class="day">{{ ucfirst($day) }}:</span>
                        <span class="time">{{ $hours }}</span>
                    </p>
                    @endforeach
                </div>
            </div>
            @endif

            <!-- Social Media -->
            @if(count(social_media()) > 0)
            <div class="footer-section">
                <h3>Follow Us</h3>
                <div class="social-links">
                    @foreach(social_media() as $platform => $url)
                    @if($url)
                    <a href="{{ $url }}" target="_blank" class="social-link" rel="noopener noreferrer">
                        <span class="sr-only">{{ ucfirst(str_replace('_url', '', $platform)) }}</span>
                        <!-- You can add social media icons here -->
                        {{ ucfirst(str_replace('_url', '', $platform)) }}
                    </a>
                    @endif
                    @endforeach
                </div>
            </div>
            @endif
        </div>

        <!-- Copyright -->
        <div class="footer-bottom">
            <p>&copy; {{ date('Y') }} {{ site_name() }}. All rights reserved.</p>
        </div>
    </div>
</footer>
