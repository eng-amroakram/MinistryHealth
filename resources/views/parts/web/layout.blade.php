@include('parts.web.header')
@livewireStyles()
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@include('parts.web.navbar')
@yield('content')
@livewireScripts()
<x-livewire-alert::scripts />
@include('parts.web.footer')
