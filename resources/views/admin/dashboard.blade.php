@extends('layouts.admin')

@section('content')
  <div>

    <h2>Menu</h2>

    <div class="row my-4">
      <div class="col-md-4 mb-4">
        <x-admin.card-link
          :title="'Users'"
          :value="$usersTotal ?? 'count'"
          :href="route('admin.user')"
          >
          <x-slot name="icon">
            <i class="bi bi-people-fill display-2 text-muted"></i>
          </x-slot>
        </x-admin.card-link>
      </div>
      <div class="col-md-4 mb-4">
        <x-admin.card-link
          :title="'Articles'"
          :value="$articlesTotal ?? 'count'"
          :href="route('admin.article')"
        >
          <x-slot name="icon">
            <i class="bi bi-pencil-fill display-2 text-muted"></i>
          </x-slot>
        </x-admin.card-link>
      </div>

    </div>

  </div>
@endsection
