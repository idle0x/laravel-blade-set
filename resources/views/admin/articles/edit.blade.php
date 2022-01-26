@extends('layouts.admin')

@section('content')

  <div class="container py-5">
    <h2 class="border-bottom">Edit: {{ $article->title }}</h2>

    <div id="editorjs"></div>

    <button id="editorjsSave" class="btn btn-primary">Save</button>
  </div>

@endsection

@push('js')
    <script src="{{ mix('js/editor.js') }}"></script>
@endpush
