@extends('master')

@section('content')






        <!-- Title -->
        <h1 class="mt-4">{{$post->title}}</h1>

        <!-- Author -->



        <p class="lead">
          by
          <a href="#">Feras Blog</a>
        </p>

        <hr>

        <!-- Date/Time -->
        <p>Posted on January 1, 2019 at 12:00 PM</p>

        <hr>

        <!-- Preview Image -->
        <img class="img-fluid rounded" src="../uploades/{{$post->url}}" alt="">

        <hr>

        <!-- Post Content -->
    <p class="lead">{{$post->body}}</p>

        <hr>


        <!-- Comments Form -->
        <div class="card my-4">
          <h5 class="card-header">Leave a Comment:</h5>
          <div class="card-body">
            <form method="POST" action="/posts/{{$post->id}}/store">
                {{csrf_field()}}

              <div class="form-group">
                <textarea class="form-control" name="body" id="body" rows="3" placeholder="Write Something ...."></textarea>
              </div>
              <button type="submit" class="btn btn-primary">Add Comment</button>
            </form>
          </div>
        </div>

        <!-- Single Comment -->
        @foreach ($post->comments as $comment)
        <div class="media mb-4">
          <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
          <div class="media-body">
            <h5 class="mt-0">Commenter Name</h5>
        {{$comment->body}}
          </div>
        </div>

        @endforeach
        <!-- Comment with nested comments -->

@stop
