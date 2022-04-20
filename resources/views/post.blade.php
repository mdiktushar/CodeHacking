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

                        <!-- Nested Comment -->
                        @if (session('reply_message'))
                            <h5>{{session('reply_message')}}</h5>
                        @endif
                        @foreach ($comment->replies as $reply)
                                <div class="media" style="padding-left: 70px">
                                <a class="pull-left" href="#">
                                    <img class="media-object" height="30px" width="30px" src={{$reply->photo}} alt="">
                                </a>
                                <div class="media-body">
                                    <h4 class="media-heading">{{$reply->author}}
                                        <small>{{$reply->created_at->diffForHumans()}}</small>
                                    </h4>
                                    {{$reply->body}}
                                </div>

                                <div class="comment-reply-container">
                                    <button class="toggle-reply btn btn-primary pull-right">Reply</button>
                                    <div class="comment-reply">
                                        <form action={{route('create.reply')}} method="post">
                                            @csrf
                                            <div class="form-group">
                                                <label for="body">Reply</label>
                                                <textarea class="form-control" id="body" name="body" rows="2"></textarea>
                                            </div>
                                            <input type="hidden" name="comment_id" value={{$comment->id}}>
                                            <button type="submit" class="btn btn-primary">Reply</button>
                                        </form>
                                    </div>   
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
        @endforeach
        @endif

    </div>
@endsection

@section('scripts')
    <script>
        $(".comment-reply-container .toggle-reply").click(()->{
            $(this).next().slideToggle('slow');
        });
    </script>
@endsection