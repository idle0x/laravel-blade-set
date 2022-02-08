@extends('layouts.admin')

@section('content')
  <div>

    <h2>search</h2>

    <div class="card">
      <div class="card-body">
        <form action="{{ route('admin.search') }}" method="get">
          <div class="mb-3">
            <label for="search" class="form-label">Search</label>
            <input type="text" class="form-control" id="search" name="search" value="{{ request()->get('search') ?? '' }}">
          </div>
          <div class="mb-3">
            <label for="user_id" class="form-label">User id</label>
            <input type="number" class="form-control" id="user_id" name="user_id" value="{{ request()->get('user_id') ?? '' }}">
          </div>
          <div class="mb-3">
            <label for="created_at_from" class="form-label">Created at</label>
            <input type="date" class="form-control" id="created_at_from" name="created_at_from" value="{{ request()->get('created_at_from') ?? '' }}">
          </div>

          <div class="mb-3">
            <x-datepicker></x-datepicker>
          </div>

          <div class=" mb-3">
            <button class="btn btn-primary" type="submit">Search</button>
          </div>
        </form>

        <hr>

        @foreach($content as $item)
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">{{ $item->title ?? '' }}</h4>
              <h6 class="card-subtitle mb-2 text-muted ">{{ $item->user->id }}</h6>
              <h6 class="card-subtitle mb-2 text-muted ">{{ $item->created_at->format('d.m.Y') }}</h6>
              <p class="card-text">{!! $item->content !!}</p>
            </div>
          </div>
        @endforeach
      </div>
    </div>

  </div>
@endsection
