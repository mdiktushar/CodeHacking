@extends('layouts.admin')
@section('content')
    Comment
    @if(count($replies))
        <table class="table table-striped table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Author</th>
                <th scope="col">Email</th>
                <th scope="col">Body</th>
                {{-- <th scope="col">View</th> --}}
                {{-- <th scope="col">View Reply</th> --}}
                <th scope="col">Active</th>
                <th scope="col">Delete</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($replies as $reply)
                <tr>
                    <td>{{$reply->id}}</td>
                    <td>{{$reply->author}}</td>
                    <td>{{$reply->email}}</td>
                    <td>{{$reply->body}}</td>
                    {{-- <td><a href={{route('home.post', $reply->comment->post->id)}}>view post</a></td> --}}
                    {{-- <td><a href={{route('replies.show', $comment->id)}}>view replys</a></td> --}}
                
                    <td>
                        @if ($reply->is_active)
                            <form action={{route('replies.update',$reply->id)}} method="post">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="is_active" value="0">
                                <button type="submit" class="btn btn-success">Deactive</button>
                            </form>
                        @else
                        <form action={{route('replies.update',$reply->id)}} method="post">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="is_active" value="1">
                            <button type="submit" class="btn btn-warning">Accept</button>
                        </form>
                        @endif
                    </td>
                    <td>
                        <form action={{route('replies.destroy',$reply->id)}} method="post">
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
        <h1 class="text-center">No Replyes</h1>
    @endif

@endsection