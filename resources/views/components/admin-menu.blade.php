<ul class="nav flex-column">
    <!-- Walk as if you are kissing the Earth with your feet. - Thich Nhat Hanh -->
    @foreach ($menu as $link)
      @php
      $class = "";
      if (\Route::is($link->getName())) {
        $class .= "active";
      }
      @endphp
    <x-admin-menu-link href="{{ route($link->getName()) }}"
          class="{{ \Route::is($link->getName()) ? 'active' : '' }}"
        >
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home" aria-hidden="true"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
        {{ __("admin_menu.{$link->getName()}") }}
      </x-admin-menu-link>
    @endforeach
</ul>
