<div class="admin-menu">
    <!-- Walk as if you are kissing the Earth with your feet. - Thich Nhat Hanh -->
    @foreach ($menu as $link)
      <div class="admin-menu__item">
        <i class="bi-globe"></i>
        <a href="{{ route($link->getName()) }}"
          class="admin-menu__link @if(\Route::is($link->getName())) admin-menu__link-active @endif"
          >{{ __("admin_menu.{$link->getName()}") }}</a>
      </div>
    @endforeach
</div>
