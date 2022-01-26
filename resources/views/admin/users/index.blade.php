@extends('layouts.admin')

@section('content')
<div class="container">
  <x-datatable
  :headers="$headers"
  :content="$content"
></x-datatable>
</div>
@endsection
