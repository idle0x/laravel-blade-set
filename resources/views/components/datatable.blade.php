@push('css')
  <link rel="stylesheet" href="{{ mix('css/datatables.css') }}">
@endpush

@push('js')
    <script src="{{ mix('js/datatables.js') }}"></script>
@endpush

<table id="datatable" class="table table-light table-striped table-hover">
  <thead>
    <tr>
      @foreach ($headers as $key=>$name)
        @if($name == 'control')
          <td></td>
        @else
          <td data-filtered="true">{{$name}}</td>
        @endif
      @endforeach
    </tr>
  </thead>
  <tbody>
    @foreach ($content as $row)
      <tr>
      @foreach ($headers as $header)
        @if (!empty($row[$header]))
          @if($header != 'control')
            <td>{{$row[$header]}}</td>
          @else
            <td>
            <x-btn-link
              href="{{$row[$header]['action']}}"
            >{{ $row[$header]['name'] }}</x-btn-link>
            </td>
          @endif
        @endif
      @endforeach
    </tr>
    @endforeach
  </tbody>
</table>
