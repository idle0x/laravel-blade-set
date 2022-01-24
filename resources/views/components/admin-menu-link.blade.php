@dump($attributes)
<li class="nav-item">
  <a class="nav-link" {{ $attributes }}
    aria-current="page">
    {{ $slot }}
  </a>
</li>
