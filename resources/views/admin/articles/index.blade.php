@extends('layouts.admin')

@section('breadcrumbs')
  {{ Breadcrumbs::render(Route::currentRouteName()) }}
@endsection

@section('content')
    <h1>Articles index page</h1>
    <a href="{{ route('article.create') }}" class="btn btn-primary">Create</a>
    <x-table
      :headers="$headers"
      :items="$content"
      :actions="$actions"
    ></x-table>

    <x-form.file-upload></x-form.file-upload>
@endsection
