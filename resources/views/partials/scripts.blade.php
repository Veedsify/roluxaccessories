@livewireScripts
<script src="{{asset('frontend/js/jquery.min.js')}}" defer></script>
<script src="{{ asset('frontend/js/sweetalert.min.js') }}" defer></script>
<script src="{{ asset('frontend/js/phosphor-icons.js')}}" defer></script>
<script src="{{ asset('frontend/js/swiper-bundle.min.js')}}" defer></script>
@if(request()->routeIs("blog"))
{{-- <script src="{{ asset('frontend/js/blog.js')}}" defer></script> --}}
@endif
<script src="{{ asset('frontend/js/main.js')}}" defer></script>
<script src="{{ asset('frontend/js/custom.js')}}" defer></script>
@stack('scripts')