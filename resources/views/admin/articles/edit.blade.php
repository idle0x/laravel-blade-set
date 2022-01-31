@extends('layouts.admin')

@section('breadcrumbs')
  {{ Breadcrumbs::render(Route::currentRouteName(), $article->id) }}
@endsection

@section('content')

  @include('admin.articles._form')

@endsection

