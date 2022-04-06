@extends('layouts.admin')

@section('content')
    <div>
        <h1>Edit Posts</h1>
        <form action={{route('post.update', $post->id)}} method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div>
                <img 
                src={{$post->photo ? 'http://127.0.0.1:8000'.$post->photo->file : 'https://via.placeholder.com/150'}} 
                alt="" srcset="" width="300px" height="300px">
            </div><br><br>
            <div class="form-group">
              <label for="title">Title</label>
              <input type="text" class="form-control" value={{$post->title}} name="title" id="title" placeholder="Title">
            </div>

            <div class="form-group">
                <label for="category_id" >Categorysion</label>
                <select class="form-control" id="category_id" name="category_id">
                  <option value={{null}}>Select</option>
                  @foreach ($categorys as $category)
                    @if ($post->category && $post->category->id == $category->id)
                        <option selected value={{$category->id}}>{{$category->name}}</option>
                    @else
                        <option value={{$category->id}}>{{$category->name}}</option>
                    @endif
                    
                  @endforeach
                </select>

            <div class="form-group">
                <label for="photo_id">Photo</label>
                <input type="file" class="form-control" name="photo_id" id="photo_id" placeholder="Image">
            </div>

            <div class="form-group">
              <label for="body">Decription</label>
              <textarea class="form-control" id="body" name="body" rows="8" cols="50" placeholder="Decription">{{$post->body}}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
          </form>
          <br><br>
          @include('includes.form_error')
    </div>

    <div>
      <form action={{route('post.destroy', $post->id)}} method="post" enctype="multipart/form-data">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger" type="submit">Delete</button>
      </form>
    </div>
    <br><br>
    
@endsection