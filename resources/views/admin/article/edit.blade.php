@extends('layouts.admin')

@section('breadcrumbs')
  {{ Breadcrumbs::render(Route::currentRouteName(), $article->id) }}
@endsection

@section('content')

  @include('admin.article._form')

  <div class="mt-4 border-top pt-3">
    <form action="{{ route('article.destroy', $article->id) }}" method="post">
      @csrf
      @method('DELETE')
      <input class="btn btn-danger" type="submit" value="Delete article">
    </form>
  </div>

@endsection

