<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    @stack('css')
</head>
<body>

  @include('layouts.partials.web-navbar')

  @yield('content')

  @include('layouts.partials.web-footer')

  <script src="{{ mix('js/app.js') }}"></script>
  @stack('js')
</body>
</html>
