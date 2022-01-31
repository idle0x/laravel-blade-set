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
            <h2 class="card-title text-center mb-4 text-primary">{{ __('Register') }}</h5>
              <h6 class="card-subtitle mb-2 text-muted text-center">{{ __('Just fill two fields') }}</h6>
              <form class="needs-validation" method="post" action="{{ route('register') }}" novalidate>
                @csrf
                <div class="mb-3">
                  <x-form.label for="first_name" :value="__('First name')"></x-form.label>
                  <x-form.input id="first_name" type="first_name" name="first_name" :value="old('first_name')" required
                    autofocus>
                  </x-form.input>
                </div>
                <div class="mb-3">
                  <x-form.label for="last_name" :value="__('Last name')"></x-form.label>
                  <x-form.input id="last_name" type="last_name" name="last_name" :value="old('last_name')" required>
                  </x-form.input>
                </div>
                <div class="mb-3">
                  <x-form.label for="email" :value="__('Email')"></x-form.label>
                  <div class="input-group">
                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                    <x-form.input id="email" type="email" name="email" :value="old('email')" required>
                    </x-form.input>
                  </div>
                </div>
                <div class="mb-3">
                  <x-form.label for="password" :value="__('Password')"></x-form.label>
                  <x-form.input id="password" type="password" name="password" required autocomplete="new-password">
                  </x-form.input>
                </div>
                <div class="mb-3">
                  <x-form.label for="password" :value="__('Confirm Password')"></x-form.label>
                  <x-form.input id="password_confirmation" type="password" name="password_confirmation" required>
                  </x-form.input>
                </div>
                <div class="mb-3">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                    <x-form.label for="invalidCheck" :value="__('Allow')"></x-form.label>
                  </div>
                </div>
                <div class="mb-3 text-center">
                  <button class="btn btn-lg btn-primary text-white" type="submit">Submit form</button>
                </div>
                @if (Route::has('password.request'))
                  <div class="text-center">
                    <a href="{{ route('password.request') }}">{{ __('Forgot your password?') }}</a> Or
                    <a href="{{ route('login') }}">{{ __('login?') }}</a>
                  </div>
                @endif
              </form>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
