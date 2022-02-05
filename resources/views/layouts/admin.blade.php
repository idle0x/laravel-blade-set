<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield("page-title")</title>
  <link rel="stylesheet" href="{{ mix('css/admin.css') }}">
  @stack('css')

  @include('layouts.partials.admin-sprite')

</head>

<body>

  <div id="wrapper" class="d-flex">

    @include("layouts.partials.admin-sidebar")

    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        {{-- HEADER --}}
        <header class="p-3 mb-3 shadow">
          <div class="d-flex flex-wrap align-items-center justify-content-between">
            <div class="d-flex align-items-center">
              <button id="sidebarToggler"></button>
              @yield('breadcrumbs')
            </div>

            <div class="d-flex align-items-center">
              <form class="d-none d-lg-flex mb-3 mb-lg-0 me-lg-3">
                <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
              </form>

              <x-user-dropdown></x-user-dropdown>

            </div>
          </div>
        </header>
        {{-- END HEADER --}}
        <main class="container-fluid px-4">
          {{-- Page Heading --}}
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">@yield('page-title')</h1>
            @yield('controls-top')
          </div>

          <x-alert></x-alert>
          {{--! Page Heading --}}
          @yield('content')

        </main>

      </div>

      @include("layouts.partials.admin-footer")
    </div>

  </div>
    <div class="container-fluid">
      <div class="row h-100">
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        </main>
      </div>
    </div>

  <script src="{{ mix('js/admin.js') }}"></script>
  @stack('js')
</body>

</html>
