@extends('layouts.admin')

@section('breadcrumbs')
  {{ Breadcrumbs::render(Route::currentRouteName()) }}
@endsection

@section('content')
    <h1 class="mb-3">Categories</h1>

    <x-table
    :headers="$headers"
    :items="$content"
    :actions="$actions"
    >
      <x-slot name="buttons">
       <a href="{{ route('category.create') }}" class="btn btn-success">Create</a>
      </x-slot>

      <x-slot name="filter">
          <div class="col-md-4 mb-3">
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="search" name="search" value="{{ request()->get('search') }}" placeholder="name@example.com">
              <label for="floatingInput">Search</label>
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <div class="form-floating mb-3">
              <input type="date" class="form-control" id="created_at_from" name="created_at_from" value="{{ request()->get('created_at_from') }}" placeholder="name@example.com">
              <label for="floatingInput">Created at from</label>
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <div class="form-floating mb-3">
              <input type="date" class="form-control" id="created_at_to" name="created_at_to" placeholder="name@example.com">
              <label for="floatingInput">Created at to</label>
            </div>
          </div>
      </x-slot>

    </x-table>

@endsection
