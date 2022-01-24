@extends('layouts.admin')

@section('content')
<div class="container">

  @if(empty($users))
  <h2>Not set users</h2>
  @else
  <table class="table table-dark table-striped table-hover">
    <thead>
      <tr>
        <td>Id</td>
        <td>Email</td>
      </tr>
    </thead>
    <tbody>
      @foreach ($users as $user)
      <tr>
        <td>{{$user->id}}</td>
        <td>{{$user->email}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
  @endif
</div>
@endsection
