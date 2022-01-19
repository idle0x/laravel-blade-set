<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield("page-title")</title>
  <link rel="stylesheet" href="{{ mix('css/admin.css') }}">
  @stack('css')
</head>

<body>
  <div id="admin-navbar">
    @include("layouts.partials.admin-navbar")
  </div>
  <div id="admin-sidebar">
    @include("layouts.partials.admin-sidebar")
  </div>
  <div id="admin-content">
    @yield('content')
  </div>

  <script src="{{ mix('js/admin.js') }}"></script>
  @stack('js')
</body>

</html>
