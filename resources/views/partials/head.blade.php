<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>{{ $title ?? config('app.name') }}</title>
<link rel="icon" href="/favicon.ico" sizes="any" />
<link rel="icon" href="/favicon.svg" type="image/svg+xml" />
<link rel="apple-touch-icon" href="/apple-touch-icon.png" />
<meta http-equiv="X-UA-Compatible" content="ie=edge" />
<meta name="csrf-token" content="{{ csrf_token() }}" />
<link href="https://api.fontshare.com/v2/css?f[]=satoshi@300,301,400,401,500,501,700,900&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.1/src/regular/style.css" />
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.1/src/fill/style.css" />
<link rel="stylesheet" href="{{ asset('frontend/css/swiper-bundle.min.css')}}" />
<link rel="stylesheet" href="{{ asset('frontend/css/style.css')}}" />
<link rel="stylesheet" href="{{ asset('dist/output-scss.css')}}" />
<link rel="stylesheet" href="{{ asset('dist/output-tailwind.css')}}" />
@livewireStyles
