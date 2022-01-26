@extends('layouts.web')

@section('content')
  {{-- @dump("test") --}}
  {{-- @dump($articles) --}}
  <x-modal
    id="testModal"
  >
    <x-slot name="title">
      <h4>Title modal</h4>
    </x-slot>
    Content body
  </x-modal>

  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#testModal">
    Launch demo modal
  </button>

  <div class="container py-5">
    <h2>Articles</h2>
    <div class="row">
      @foreach ($articles as $article)
        <div class="col-md-6 col-lg-4 col-xl-3 mb-4">
          <div class="card h-100 overflow-hidden shadow">
            <img src="https://images.unsplash.com/photo-1561154464-82e9adf32764?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=800&q=60" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title"><a href="/article/{{$article->slug}}">{{ $article->title }}</a></h5>
              <h6 class="card-subtitle mb-2 text-muted ">{{ $article->user->name }}</h6>
              <p class="card-text">{!! $article->content !!}</p>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>

@endsection
