@extends('layouts.admin')

@section('content')
  <div>

    <h1>Dashboard</h1>

    <div class="row my-4">
      <div class="col-md-4">
        <x-admin.info-card>
          <x-slot name="icon">
            <i class="bi bi-people-fill display-2 text-muted"></i>
          </x-slot>
        </x-admin.info-card>
      </div>

      <div class="col-md-4"></div>
      <div class="col-md-4"></div>
    </div>

  </div>
@endsection
