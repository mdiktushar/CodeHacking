@extends('layouts.admin')

@section('content')
    <h1>Create Users</h1>

    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" class="form-control" name="" id="name" name="name">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    
@endsection