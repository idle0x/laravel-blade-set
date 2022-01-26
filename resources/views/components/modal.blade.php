@props(['animation', 'class', 'id'])

<div class="modal {{ $animation ?? 'fade' }} {{ $class ?? '' }}" id="{{ $id ?? 'modal' }}">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      @isset($title)
        <div class="modal-header">
          {{ $title }}

          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
      @endisset

      <div class="modal-body">
        {{ $slot }}
      </div>

      @isset($footer)
        <div class="modal-footer">
          {{ $footer }}
        </div>
      @endisset
    </div>
  </div>
</div>
