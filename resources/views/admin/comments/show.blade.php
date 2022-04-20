@extends('layouts.admin')
@section('content')
    Comment
    @if(count($comments))
        <table class="table table-striped table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Author</th>
                <th scope="col">Email</th>
                <th scope="col">Body</th>
                <th scope="col">View</th>
                <th scope="col">Active</th>
                <th scope="col">Delete</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($comments as $comment)
                <tr>
                    <td>{{$comment->id}}</td>
                    <td>{{$comment->author}}</td>
                    <td>{{$comment->email}}</td>
                    <td>{{$comment->body}}</td>
                    <td><a href={{route('home.post', $comment->post->id)}}>view post</a></td>
                
                    <td>
                        @if ($comment->is_active)
                            <form action={{route('comments.update',$comment->id)}} method="post">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="is_active" value="0">
                                <button type="submit" class="btn btn-success">Deactive</button>
                            </form>
                        @else
                        <form action={{route('comments.update',$comment->id)}} method="post">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="is_active" value="1">
                            <button type="submit" class="btn btn-warning">Accept</button>
                        </form>
                        @endif
                    </td>
                    <td>
                        <form action={{route('comments.destroy',$comment->id)}} method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <h1 class="text-center">No Commnets</h1>
    @endif

@endsection