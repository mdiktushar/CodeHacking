@extends('layouts.admin')

@section('content')
<div class="col-sm-3">
  <h1>Profiel</h1>
  {{-- image --}}
  <div class="from-group">
    <img height="150px" width="150px" src={{$user->photo ? $user->photo->file : 'https://via.placeholder.com/150'}} alt="" srcset="">
  </div>
</div>
<div class="col-sm-9">
  <form action={{route('users.update', $user->id)}} method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
      {{-- name --}}
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" name="name" id="name" value={{$user->name}}>
      </div>
      {{-- email --}}
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" name="email" id="email" value={{$user->email}}>
      </div>
      {{-- Role --}}
      <div class="form-group">
        <label for="role_id">Role</label>        
        <select name="role_id" id="role_id" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
          @foreach ($roles as $role)
            @if ($user->role->id === $role->id)
              <option selected value={{$role->id}}>{{$role->name}}</option>
            @else
              <option value={{$role->id}}>{{$role->name}}</option>
            @endif
          @endforeach
        </select>
      </div>
      {{-- Status --}}
      <div>
        @if ($user->is_active)
          <label for="is_active">Status</label>
          <div class="form-check">
            <input class="form-check-input" value="1" type="radio" name="is_active" id="is_active" checked>
            <label class="form-check-label" for="is_active">
              Active
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" value="0" type="radio" name="is_active" id="is_active">
            <label class="form-check-label" for="is_active">
              Inactive
            </label>
          </div>
        @else
          <label for="is_active">Status</label>
          <div class="form-check">
            <input class="form-check-input" value="1" type="radio" name="is_active" id="is_active">
            <label class="form-check-label" for="is_active">
              Active
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" value="0" type="radio" name="is_active" id="is_active" checked>
            <label class="form-check-label" for="is_active">
              Inactive
            </label>
          </div>
        @endif
      </div>

      {{-- file --}}
      <div class="form-group">
        <label for="photo_id">Photo</label><br>
        <input type="file" class="form-control" name="photo_id" id="photo_id">
      </div>

      {{-- password --}}
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" name="password" id="password">
      </div>
      
      <button type="submit" class="btn btn-primary">Create</button>
  </form>
  @include('includes.form_error')
</div>

@endsection