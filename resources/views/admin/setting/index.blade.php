@extends('layouts.admin')

@section('breadcrumbs')
  {{ Breadcrumbs::render(Route::currentRouteName()) }}
@endsection

@section('content')
    <h1 class="mb-3">{{ __('Settings') }}</h1>

    <x-table
    :headers="$headers"
    :items="$content"
    :actions="$actions ?? null"
    >
      <x-slot name="buttons">
       <a href="{{ route('article.create') }}" class="btn btn-success">Create</a>
      </x-slot>

      <x-slot name="filter">

          <div class="col-md-4 mb-3">
            <label for="validationCustom01" class="form-label">Search</label>
            <input type="text" class="form-control" name="search" id="validationCustom01" value="{{ request()->get('search') }}">
            <div class="valid-feedback">
              Looks good!
            </div>
          </div>

      </x-slot>

    </x-table>
@endsection
