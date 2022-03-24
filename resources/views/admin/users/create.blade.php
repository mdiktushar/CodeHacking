@extends('layouts.admin')

@section('content')
    <h1>Create Users</h1>

    <form action={{route('users.store')}} method="POST" enctype="multipart/form-data">
      @csrf
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" class="form-control" name="name" id="name" >
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" class="form-control" name="email" id="email">
        </div>
        <div class="form-group">
          <label for="role">Role</label>
          <input type="text" class="form-control" name="role" id="role">
        </div>
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
        
        <button type="submit" class="btn btn-primary">Create</button>
      </form>
@endsection