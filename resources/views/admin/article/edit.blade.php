@extends('layouts.admin')

@section('breadcrumbs')
  {{ Breadcrumbs::render(Route::currentRouteName(), $article->id) }}
@endsection

@section('content')

  @include('admin.article._form')

  <div class="mt-4 border-top pt-3">
    <form action="{{ route('article.destroy', $article->id) }}" method="post" onsubmit="beforeSubmit(event)">
      @csrf
      @method('DELETE')
      <input class="btn btn-danger" type="submit" value="Delete article">
    </form>
  </div>

@endsection

@push('js')
  <script>
    function beforeSubmit(e) {
      debugger;
      e.preventDefault();
      if (confirm('Do you realy want to delete article?')) {
        e.target.submit();
      }
    }
  </script>
@endpush
