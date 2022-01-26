@props([
  'headers' => [],
  'content' => []
])

<table class="table table-dark table-striped table-hover">
  <thead>
    <tr>
      @foreach ($headers as $key=>$name)
        <td>{{$name}}</td>
        @if($name == 'control')
          <td></td>
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
