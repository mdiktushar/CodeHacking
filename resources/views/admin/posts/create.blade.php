@extends('layouts.admin')

@section('content')
    <div>
        <h1>Create Posts</h1>
        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="form-group">
              <label for="title">Title</label>
              <input type="text" class="form-control" name="title" id="title" placeholder="Title">
            </div>

            <div class="form-group">
                <label for="category_id" >Categorysion</label>
                <select class="form-control" id="category_id" name="category_id">
                  <option value="None">None</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                </select>

            <div class="form-group">
                <label for="photo_id">Photo</label>
                <input type="file" class="form-control" name="photo_id" id="photo_id" placeholder="Image">
            </div>

            <div class="form-group">
              <label for="body">Decription</label>
              <textarea class="form-control" id="body" name="body" rows="8" cols="50" placeholder="Decription"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>
    
@endsection