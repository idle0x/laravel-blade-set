{{-- @push('css')
  <link rel="stylesheet" href="{{ mix('css/datepicker.css') }}">
@endpush --}}

<div class="mb-3">
  <input class="form-control" data-type="datepicker" name="created_at" autocomplete="off">
</div>

@push('js')
  <script src="{{ mix('js/datepicker.js') }}"></script>
@endpush
