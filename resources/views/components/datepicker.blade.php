@push('css')
  <link rel="stylesheet" href="{{ mix('css/datepicker.css') }}">
@endpush

<input type="datetime" data-type="datepicker">

@push('js')
  <script src="{{ mix('js/datepicker.js') }}"></script>
@endpush
