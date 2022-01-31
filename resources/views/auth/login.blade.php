@extends('layouts.simple')

@section('content')

  <div class="container py-5">
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <div class="mb-4">
          <x-alert></x-alert>
        </div>
        <div class="card shadow-lg rounded p-md-4">
          <div class="card-body">
            <h2 class="card-title text-center mb-4 text-primary">{{ __('Sign In') }}</h5>
              <h6 class="card-subtitle mb-2 text-muted text-center">{{ __('Just fill two fields') }}</h6>
              <form class="needs-validation" method="post" action="{{ route('login') }}" novalidate>
                @csrf
                <div class="mb-3">
                  <x-form.label for="email" :value="__('Email')"></x-form.label>
                  <div class="input-group">
                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                    <x-form.input id="email" type="email" name="email" :value="old('email')" required autofocus>
                    </x-form.input>
                  </div>
                </div>
                <div class="mb-3">
                  <x-form.label for="password" :value="__('Password')"></x-form.label>
                  <x-form.input id="password" type="password" name="password" required autocomplete="current-password">
                  </x-form.input>
                </div>
                <div class="mb-3">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                    <x-form.label for="invalidCheck" :value="__('Remember Me')"></x-form.label>
                  </div>
                </div>
                <div class="mb-3 text-center">
                  <button class="btn btn-lg btn-primary text-white" type="submit">Submit form</button>
                </div>
                @if (Route::has('password.request'))
                  <div class="text-center">
                    <a href="{{ route('password.request') }}">{{ __('Forgot your password?') }}</a> Or
                    <a href="{{ route('register') }}">{{ __('register?') }}</a>
                  </div>
                @endif
              </form>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
