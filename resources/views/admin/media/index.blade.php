@extends('layouts.admin')
@section('content')
    <div>
        @if ($photos)
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Image</th>
                    <th scope="col">Created Date</th>
                    <th scope="col">Delete</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($photos as $photo)
                        <tr>
                            <th scope="row">{{$photo->id}}</th>
                            <td>
                                <a href={{route('media.show', $photo->id)}}>
                                    <img src={{$photo->file}} alt="" srcset="" height="100" width="100">
                                </a>
                            </td>
                            <td>{{$photo->created_at ? $photo->created_at->diffForHumans() : 'No date'}}</td>
                            <td>
                                <form action={{route('media.destroy', $photo->id)}} method="post">
                                    @csrf
                                    @method("DELETE")
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>    
@endsection