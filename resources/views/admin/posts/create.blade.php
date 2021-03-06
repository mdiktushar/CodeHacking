@extends('layouts.admin')

@section('content')
  @include('includes.tinyedior')
    <div>
        <h1>Create Posts</h1>
        <form action={{route('post.store')}} method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="form-group">
              <label for="title">Title</label>
              <input type="text" class="form-control" name="title" id="title" placeholder="Title">
            </div>

            <div class="form-group">
                <label for="category_id" >Categorysion</label>
                <select class="form-control" id="category_id" name="category_id">
                  <option value={{null}}>Select</option>
                  @foreach ($categorys as $category)
                    <option value={{$category->id}}>{{$category->name}}</option>
                  @endforeach
                </select>

            <div class="form-group">
                <label for="photo_id">Photo</label>
                <input type="file" class="form-control" name="photo_id" id="photo_id" placeholder="Image">
            </div>

            <div class="form-group">
              <label for="body">Decription</label>
              <textarea class="form-control" id="body" name="body" placeholder="Decription"></textarea>
              @include('includes.tinyedior1')
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
          <br><br>
          @include('includes.form_error')
    </div>
    
@endsection