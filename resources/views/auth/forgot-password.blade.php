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
            <h2 class="card-title text-center mb-4 text-primary">{{ __('Forgot you password?') }}</h5>
              <h6 class="card-subtitle mb-2 text-muted text-center">
                {{ __('No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
              </h6>
              <form class="needs-validation" method="post" action="{{ route('password.email') }}" novalidate>
                @csrf
                <div class="mb-3">
                  <x-form.label for="email" :value="__('Email')"></x-form.label>
                  <div class="input-group">
                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                    <x-form.input id="email" type="email" name="email" :value="old('email')" required autofocus>
                    </x-form.input>
                  </div>
                </div>
                <div class="mb-3 text-center">
                  <button class="btn btn-lg btn-primary text-white" type="submit">Submit form</button>
                </div>
              </form>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
