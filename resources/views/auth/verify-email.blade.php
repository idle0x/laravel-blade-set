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
                {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
              </h6>
              <div class="alert alert-success">
                {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
            </div>
              @if (session('status') == 'verification-link-sent')
                  <div class="alert alert-success">
                      {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                  </div>
              @endif

            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div>
                  <button class="btn btn-lg btn-primary text-white" type="submit">{{ __('Verification send') }}</button>
                </div>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button class="link underline" type="submit">{{ __('Log Out') }}</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
