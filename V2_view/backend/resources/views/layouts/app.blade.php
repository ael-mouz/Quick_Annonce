<!-- resources/views/layout.blade.php -->

<!DOCTYPE html>
<html lang="">

<head>
    <title>@yield('title')</title>
    <!-- Include your CSS and JavaScript files -->
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
</head>

<body>
    @include('components.header-home')
    <div class="pop">@include('components.alerts.alert')</div>
    @if (auth()->check())
        <div></div>
    @else
        @include('components.about-us')
    @endif
    <section class="container-fluid d-flex justify-content-center">
        @if (auth()->check() && auth()->user()->role == 'admin')
            @include('components.sidebar.sidebar-admin')
        @else
            @include('components.sidebar.sidebar-member')
        @endif
        <div class="content col-10" id="content">
            @yield('content')
        </div>
    </section>
</body>
<script>
    setTimeout(function() {
        document.querySelectorAll('.alert').forEach(function(alert) {
            alert.style.display = 'none';
        });
    }, 4000);
</script>
</html>
