@extends('layouts.admin')

@section('content')
    <h1>Create Users</h1>

    <form action={{route('users.store')}} method="POST" enctype="multipart/form-data">
      @csrf
        {{-- name --}}
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" class="form-control" name="name" id="name" >
        </div>
        {{-- email --}}
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" class="form-control" name="email" id="email">
        </div>
        {{-- Role --}}
        <div class="form-group">
          <label for="role">Role</label>        
          <select name="role" id="role" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
            @foreach ($roles as $role)
            <option value={{$role->id}}>{{$role->name}}</option>
            @endforeach
          </select>
        </div>
        {{-- Status --}}
        <div>
          <label for="status">Status</label>
          <div class="form-check">
            <input class="form-check-input" value="1" type="radio" name="status" id="status">
            <label class="form-check-label" for="status">
              Active
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" value="0" type="radio" name="status" id="status" checked>
            <label class="form-check-label" for="status">
              Inactive
            </label>
          </div>
        </div>

        {{-- email --}}
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" name="password" id="password">
        </div>
        
        <button type="submit" class="btn btn-primary">Create</button>
      </form>
@endsection