@extends('layouts.admin')

@section('breadcrumbs')
  {{ Breadcrumbs::render(Route::currentRouteName()) }}
@endsection

@section('page-title', 'Users')

@section('content')

    <x-table
      :headers="$headers"
      :items="$content"
      :actions="$actions"
    >
    </x-table>

@endsection
