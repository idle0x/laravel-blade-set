@extends('layouts.web')

@section('content')
    <div class="container py-5">
        <div class="card h-100 overflow-hidden shadow">
            <h1>{{ $article->title }}</h1>
            <p class="lead">{{ $article->user->name }}</p>
            <img src="https://images.unsplash.com/photo-1561154464-82e9adf32764?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=800&q=60"
                class="card-img-top" alt="...">
            <div class="card-body">
                {!! $article->content !!}
            </div>
        </div>
    </div>
@endsection
