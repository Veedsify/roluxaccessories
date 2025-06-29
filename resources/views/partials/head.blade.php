<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>{{ $title ?? config('app.name') }}</title>
<link rel="icon" href="/favicon.ico" sizes="any" />
<link rel="icon" href="/favicon.svg" type="image/svg+xml" />
<link rel="apple-touch-icon" href="/apple-touch-icon.png" />
<meta http-equiv="X-UA-Compatible" content="ie=edge" />
<meta name="csrf-token" content="{{ csrf_token() }}" />
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('frontend/css/swiper-bundle.min.css')}}" />
<link rel="stylesheet" href="{{ asset('frontend/css/style.css')}}" />
<link rel="stylesheet" href="{{ asset('dist/output-scss.css')}}" />
<link rel="stylesheet" href="{{ asset('dist/output-tailwind.css')}}" />
<link rel="stylesheet" href="{{ asset('frontend/css/checkout-enhancements.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/css/order-confirmation.css') }}">
@livewireStyles
