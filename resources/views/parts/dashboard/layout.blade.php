@include('parts.dashboard.header')
@livewireStyles()
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<div class="wrapper">

    @include('parts.dashboard.sidebar')

    <div class="main-panel">
        @include('parts.dashboard.navbar')
        @yield('content')
        @include('parts.dashboard.footer')
    </div>

</div>
{{-- @include('parts.dashboard.plugin') --}}

@livewireScripts()
<x-livewire-alert::scripts />
@include('parts.dashboard.scripts')
