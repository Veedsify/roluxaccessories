<header class="site-header">
    <div class="container">
        <div class="header-content">
            <!-- Site Logo and Name -->
            <div class="brand">
                @if(site_logo())
                <img src="{{ site_logo() }}" alt="{{ site_name() }}" class="site-logo">
                @else
                <h1 class="site-name">{{ site_name() }}</h1>
                @endif

                @if(config_get('site_tagline'))
                <p class="tagline">{{ config_get('site_tagline') }}</p>
                @endif
            </div>

            <!-- Contact Information -->
            <div class="header-contact">
                @if(config_get('contact_phone'))
                <span class="phone">📞 {{ config_get('contact_phone') }}</span>
                @endif

                @if(config_get('contact_email'))
                <span class="email">✉️ {{ config_get('contact_email') }}</span>
                @endif
            </div>

            <!-- Social Media Links -->
            <div class="social-links">
                @foreach(social_media() as $platform => $url)
                @if($url)
                <a href="{{ $url }}" target="_blank" class="social-link social-{{ str_replace('_url', '', $platform) }}">
                    {{ ucfirst(str_replace('_url', '', $platform)) }}
                </a>
                @endif
                @endforeach
            </div>
        </div>
    </div>
</header>
