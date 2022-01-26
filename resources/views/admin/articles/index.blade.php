@extends('layouts.admin')

@section('content')
    <h1>Articles index page</h1>

    <x-datatable
      :headers="$headers"
      :content="$content"
    ></x-datatable>
@endsection
