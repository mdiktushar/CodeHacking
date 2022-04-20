@extends('layouts.blog-post')

@section('content')
    <div>
         <!-- Blog Post -->
                <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                <!-- Title -->
                <h1>{{$post->title}}</h1>

                <!-- Author -->
                <p class="lead">
                    by <a href="#">{{$post->user->name}}</a>
                </p>

                <hr>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> Posted on {{$post->created_at->diffForHumans()}}</p>

                <hr>

                <!-- Preview Image -->
                <img class="img-responsive" src={{$post->photo->file}} alt="">

                <hr>

                <!-- Post Content -->
                <p class="lead">
                    {{$post->body}}
                </p>

                <hr>

                <!-- Blog Comments -->
                @if (Auth::check())
                <!-- Comments Form -->
                <div class="well">
                    @if (session('comment_message'))
                        <h3>{{session('comment_message')}}</h3>
                    @endif
                    <h4>Leave a Comment:</h4>
                    <form role="form" method="POST" action={{route('comments.store')}}>
                        @csrf
                        <input type="hidden" name="post_id" value={{$post->id}}>
                        <div class="form-group">
                            <textarea class="form-control" id="body" name="body" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                @endif
                <hr>

                <!-- Posted Comments -->
                @if(count($comments))
                @foreach ($comments as $comment)
                        <!-- Comment -->
                        <div class="media">
                            <a class="pull-left" href="#">
                                <img height="50px" width="50px" class="media-object" src={{$comment->photo}} alt="">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">{{$comment->author}}
                                    <small>{{$comment->created_at->diffForHumans()}}</small>
                                </h4>
                                {{$comment->body}}
                            </div>
                        </div>
                @endforeach
                @endif
                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">Start Bootstrap
                            <small>August 25, 2014 at 9:30 PM</small>
                        </h4>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                        <!-- Nested Comment -->
                        <div class="media">
                            <a class="pull-left" href="#">
                                <img class="media-object" src="http://placehold.it/64x64" alt="">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">Nested Start Bootstrap
                                    <small>August 25, 2014 at 9:30 PM</small>
                                </h4>
                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                            </div>
                        </div>
                        <!-- End Nested Comment -->
                    </div>
                </div>

    </div>
@endsection