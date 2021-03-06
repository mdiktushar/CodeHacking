@extends('layouts.admin')

@section('content')
    <h1>Users</h1>
    @if (session('notification'))
      <div class = 'alert alert-success'>
          {{session('notification')}}
      </div>
    @endif
    
    <table class="table table-condensed">
      <thead>
        <tr>
          <th>ID</th>
          <th>Photo</th>
          <th>Name</th>
          <th>Email</th>
          <th>Role</th>
          <th>Status</th>
          <th>Joined</th>
          <th>Info Update</th>
        </tr>
      </thead>
      <tbody>
        @if ($users)
          @foreach ($users as $user)
            <tr>
              <td>{{$user->id}}</td>
              <td>
                <img height="50px" width="50px" src={{$user->photo ? 'http://127.0.0.1:8000'.$user->photo->file : 'https://via.placeholder.com/150'}} alt="" srcset="">
              </td>
              <td><a href={{route('users.edit', $user->id)}}>{{$user->name}}</a></td>
              <td>{{$user->email}}</td>
              <td>{{$user->role->name}}</td>
              <td>
                @if ($user->is_active)
                  {{"Active"}}
                @else
                  {{"Inactive"}}
                @endif
              </td>
              <td>{{$user->created_at->diffForHumans()}}</td>
              <td>{{$user->updated_at->diffForHumans()}}</td>
            </tr>
          @endforeach
        @endif
      </tbody>
    </table>
@endsection