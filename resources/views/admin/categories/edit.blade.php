@extends('layouts.admin')

@section('content')
    <div>
        <form action={{route('categories.update', $categorie->id)}} method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
            <label for="name" name='name'>Name</label>
            <input type="text" class="form-control" value={{$categorie->name}} name='name' id="name" placeholder="Name">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <br><br>
        <form action={{route('categories.destroy', $categorie->id)}} method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
        <br><br>
        @include('includes.form_error')
    </div>
@endsection