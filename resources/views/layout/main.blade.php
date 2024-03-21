@include('layout.header')
@include('layout.navbar')
<main class="main p-3">
    <div class="container-fluid">
        @yield('content')
    </div>
</main>
@include('layout.footer')
