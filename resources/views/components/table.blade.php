@props([
  'items' => [],
  'headers' => [],
  'actions' => [],
  'checkable' => false,
  'selectId' => 'paginate',
])
@if (!empty($items->total()))
<table class="table table-sm table-striped table-hover">
  <thead>
    <tr>
      @if ($checkable)
      <td></td>
      @endif

      @foreach ($headers as $kh=>$header)
        @if($header['code'] == 'id')
          <td style="width: 1%;">#</td>
        @else
          <td>{{ $header['title'] }}</td>
        @endif
      @endforeach

      @if (!empty($actions))
      <td></td>
      @endif
    </tr>
  </thead>
  <tbody>
    @foreach ($items as $row)
      <tr>
        @if ($checkable)
        <td></td>
        @endif

        @foreach ($headers as $header)
        <td>{{$row[$header['code']]}}</td>
        @endforeach

        @if (!empty($actions))
          <td>
            @foreach ($actions as $action)
              <a class="btn btn-primary btn-sm "
              href="{{route($action['route']['name'],
              [$action['route']['var'] => $row[$action['route']['val']]])}}"
               role="button">{{ $action['title'] }}</a>
            @endforeach
          </td>
        @endif
      </tr>
    @endforeach
  </tbody>
</table>

<div class="d-flex justify-content-between text-sm">
  <div>
    <select class="form-select" id="{{ $selectId }}" title="{{ __('Rows on page') }}">
      @php
        $paginate = request()->cookie('laravel_paginate') ?? config('conf.paginate');
      @endphp
      @foreach (config('conf.rows_per_page') as $val)
        <option value="{{ $val }}"
          @if ($paginate == $val)
            selected
          @endif
        >{{ $val }}</option>
      @endforeach
    </select>
  </div>

  <div class="pt-2">Show from {{ $items->firstItem() }} to {{ $items->lastItem() }} of {!! $items->total() !!}</div>

  {!! $items->links() !!}
</div>

<script>
  const sp = document.querySelector('#{{$selectId}}')
  if (sp) {
    sp.addEventListener('change', (e) => {
      // just set cookie paginate and reload page
      let cookie  = `laravel_paginate=${e.target.selectedOptions[0].value};max-age=${7*24*60*60};path=/;Samesite=Lax`
      console.log(cookie);
      document.cookie = cookie;
      window.location.reload();
    });
  }
</script>

@else
  <x-nothing-show></x-nothing-show>
@endif


