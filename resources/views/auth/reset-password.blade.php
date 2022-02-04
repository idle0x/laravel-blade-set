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
            <h2 class="card-title text-center mb-4 text-primary">{{ __('Reset password') }}</h5>
              <h6 class="card-subtitle mb-2 text-muted text-center">
                {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
              </h6>

              <form class="needs-validation" method="post" action="{{ route('password.update') }}" novalidate>
                @csrf

                <!-- Password Reset Token -->
                <input type="hidden" name="token" value="{{ $request->route('token') }}">


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
                <div class="mb-3 text-center">
                  <button class="btn btn-lg btn-primary text-white" type="submit">{{ __('Reset Password') }}</button>
                </div>
              </form>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
