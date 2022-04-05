@extends('layouts.admin')

@section('content')
    <h1>Posts</h1>
    <table class="table">
        <tr>
            <th>ID</th>
            <th>Photo</th>
            <th>User Id</th>
            <th>Category</th>
            <th>Title</th>
            <th>Content</th>
            <th>Created At</th>
            <th>Edited At</th>
        </tr>
        @foreach ($posts as $post)
        <tr>
            <td>{{$post->id}}</td>
            <td>
                <img 
                src={{$post->photo ? 'http://127.0.0.1:8000'.$post->photo->file : 'https://via.placeholder.com/150'}} 
                alt="" srcset="" width="100px" height="100px">
            </td>
            <td>{{$post->user->name}}</td>
            <td>{{$post->category ? $post->category->name : 'Uncategorised'}}</td>
            <td>{{$post->title}}</td>
            <td>{{$post->body}}</td>
            <td>{{$post->created_at->diffForHumans()}}</td>
            <td>{{$post->updated_at->diffForHumans()}}</td>
        </tr>
        @endforeach
    </table>
@endsection