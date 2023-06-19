<!-- resources/views/layout.blade.php -->

<!DOCTYPE html>
<html lang="">

<head>
    <title>@yield('title')</title>
    <!-- Include your CSS and JavaScript files -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha384-KyM+1vw1pFV3GJBHWn8GG/x6DxNRTzGc+OMYp+peXwkqm8CHh3jrmuZ/Xuok+oMc" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        .logo {
            height: 90px;
        }

        #side-bar {
            width: 20%;
            /* background-color: #b49f9f; */
            float: left;
        }

        #content {
            width: 80%;
            float: left;
        }

        #register {
            width: 50%;
            margin: auto;
        }

        #register-bar,
        #login-bar {
            width: 45%;
            font-size: 20px;
            font-weight: bold;
            padding: 0;
            margin: 0;
            border-radius: 0 160px 0 0;
            background-color: #0dcaf0;
            padding-left: 5px;
        }

        #register-bar-line,
        #login-bar-line {
            padding: 0;
            margin: 0;
            width: 100%;
            height: 3px;
            background-color: #0dcaf0;
            border-radius: 6px;
            margin-bottom: 10px;
        }

        .circular--landscape {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            border: black 3px solid;
            filter: brightness(1.2) saturate(1.5) hue-rotate(180deg) sepia(0.2);
        }

        .border-debug {
            border: 1px solid red;
        }

        .number-circle {
            display: flex;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            background: #0dcaf0;
            color: #ffffff;
            align-items: center;
            justify-content: center;
            font: 32px Arial, sans-serif;
        }

        .about-us-title {
            font-size: 20px;
            font-weight: bold;
            color: #0dcaf0;
        }
    </style>
</head>

<body>
    @include('components.header-home')
    @include('components.about-us')
    @if (session('success'))
        <div id="success-alert" class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    @error('email')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <section class="container-fluid">
        <div class="" id="side-bar">
            @if (auth()->check())
                <span>My annonce</span>
            @else
                @include('components.auth.login')
            @endif
        </div>
        <div class="" id="content">
            @include('components.auth.register')
        </div>
        @yield('content')
    </section>

    <footer>
        <!-- Common footer content -->
    </footer>
</body>
<script>
    setTimeout(function() {
        document.querySelectorAll('.alert').forEach(function(alert) {
            alert.style.display = 'none';
        });
    }, 2000);
</script>
</html>
