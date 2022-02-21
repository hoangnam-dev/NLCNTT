<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <meta http-equiv="Content-Security-Policy" content="default-src *; style-src 'self' 'unsafe-inline'; script-src 'self' 'unsafe-inline' 'unsafe-eval' http://www.google.com"> --}}
    <title>@yield('title')-My Web</title>
    <link rel="stylesheet" href="{{ asset('assets/font/css/all.min.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('assets/client/css/bootstrap.min.css') }}"> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    {{-- <link rel="stylesheet" href="{{ asset('assets/client/font/css/all.min.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('assets/client/css/base.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/client/css/style.css') }}">
    @yield('css')
</head>
<body>
    <div class="wrapper">
        @include('client.blocks.header')
        <main id="main" class="py-5">
            <div class="container">
                @yield('content')
            </div>
        </main>
        @include('client.blocks.footer')
    </div>

    {{-- <script src="{{ asset('assets/client/js/bootstrap.min.js') }}"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"></script>
    <script src="{{ asset('assets/client/js/main.js') }}"></script>
    @yield('js')  
    <script type="text/javascript">
        $(document).on('hidden.bs.modal', function () {
            if ($('.modal:visible').length) {
                $('body').addClass('modal-open');
            }
        });
  </script>
</body>
</html>