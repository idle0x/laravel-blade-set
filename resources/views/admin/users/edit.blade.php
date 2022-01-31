@extends('layouts.admin')

@section('breadcrumbs')
  {{ Breadcrumbs::render(Route::currentRouteName(), $user->id) }}
@endsection

@section('content')

  <div class="container py-5">
    <h2 class="border-bottom">{{ $user->fullName }}</h2>
    <form action="{{ route('user.update', $user->id) }}">
      @csrf
      @if (!empty($user))
        @method("PUT")
      @endif
      <div class="row">
        {{-- Profile photo --}}
        <div class="col-md-4">
          <div class="form-group files">
            <label class="form-label">User photo</label>
            <input id="file" type="file" class="form-control" />
          </div>
        </div>
        {{-- !Profile Photo --}}
        <div class="col-md-8">
          <div class="form-group mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" placeholder="Type your Name">
          </div>
          <div class="form-group mb-3">
            <label for="email" class="form-label">Email</label>
            <div class="input-group">
              <span class="input-group-text" id="inputGroupPrepend">@</span>
              <input type="text" class="form-control" id="email" name="email" value="{{ $user->email }}" required placeholder="Type your Email">
              <div class="invalid-feedback">
                Please choose a username.
              </div>
            </div>
          </div>
          <div class="form-group mb-3">
            <label>Created at: </label>
            <span>{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $user->created_at)->format("d.m.Y H:i") }}</span>
          </div>
          <div class="form-group mb-3">
            <label>Updated at: </label>
            <span>{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $user->updated_at)->format("d.m.Y H:i") }}</span>
          </div>
        </div>
      </div>

      <div>
        <button class="btn btn-primary" type="submit">Submit form</button>
      </div>
    </form>
  </div>

@endsection
