@extends('layouts.admin')

@section('breadcrumbs')
  {{ Breadcrumbs::render(Route::currentRouteName()) }}
@endsection

@section('content')

  @include('admin.article._form')

@endsection


