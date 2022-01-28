<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')-My Web</title>
    <link rel="stylesheet" href="{{ asset('assets/font/css/all.min.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('assets/client/css/bootstrap.min.css') }}"> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/font/js/all.min.js') }}"></script>
    <script src="{{ asset('assets/client/js/main.js') }}"></script>
    @yield('js')  
</body>
</html>