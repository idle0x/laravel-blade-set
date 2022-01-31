<ul class="nav nav-pills flex-column mb-auto">
  <!-- Walk as if you are kissing the Earth with your feet. - Thich Nhat Hanh -->
  @foreach ($menu as $link)
  <x-admin-menu.link href="{{ route($link->getName()) }}"
        class="{{ $link->isActive ? 'active' : '' }}"
      >
      <svg class="bi me-2" width="16" height="16" fill="#ffffff"><use xlink:href="#{{$link->getName()}}"></use></svg>
      {{ __("admin_menu.{$link->getName()}") }}
    </x-admin-menu.link>
  @endforeach
  <li class="mb-1">
    <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#account-collapse" aria-expanded="false">
      Account
    </button>
    <div class="collapse" id="account-collapse" style="">
      <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
        <li><a href="#" class="link-light rounded">New...</a></li>
        <li><a href="#" class="link-light rounded">Profile</a></li>
        <li><a href="#" class="link-light rounded">Settings</a></li>
        <li><a href="#" class="link-light rounded">Sign out</a></li>
      </ul>
    </div>
  </li>
  <li class="mb-1">
    <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="false">
      Dashboard
    </button>
    <div class="collapse" id="dashboard-collapse" style="">
      <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
        <li><a href="#" class="link-light rounded">Overview</a></li>
        <li><a href="#" class="link-light rounded">Weekly</a></li>
        <li><a href="#" class="link-light rounded">Monthly</a></li>
        <li><a href="#" class="link-light rounded">Annually</a></li>
      </ul>
    </div>
  </li>
</ul>
