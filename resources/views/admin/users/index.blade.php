@extends('layouts.admin')

@section('content')

  <x-datatable
  :headers="$headers"
  :content="$content"
></x-datatable>

@endsection
