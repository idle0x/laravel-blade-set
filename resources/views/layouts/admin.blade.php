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
    @include("layouts.partials.admin-header")
    <div class="container-fluid">
      <div class="row h-100">
        @include("layouts.partials.admin-sidebar")
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
          @yield('content')
        </main>
      </div>
    </div>

  <script src="{{ mix('js/admin.js') }}"></script>
  @stack('js')
</body>

</html>
