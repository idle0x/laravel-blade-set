@extends('layouts.admin')

@section('content')
  @if(empty($users))
    <h2>Not set users</h2>
  @else
    @foreach ($users as $user)
      <div>
        <span>{{ $user->email }}</span>
      </div>
    @endforeach
  @endif
@endsection
