@extends('master')

@section('content')



@foreach ($posts as $post)


        <!-- Title -->
        <h1 class="mt-4">

        <a href="/posts/{{$post->id}}">   {{$post->title}}</a>

         </h1>

        <!-- Author -->



        <p class="lead">
          by
          <a href="#">Start Bootstrap</a>
        </p>

        <hr>

        <!-- Date/Time -->
    {{-- <p>Posted on {{$post->created_at->toDayDateTimeString() }}</p> --}}

        <hr>

        <!-- Preview Image -->
        @if($post->url)
            <img class="img-fluid rounded" src="../uploades/{{$post->   url}}" alt="">
        @endif


        <hr>

        <!-- Post Content -->
    <p class="lead">{{$post->body}}</p>






        <hr>
        @endforeach
{{-- form --}}


<form method="POST" action="/posts/store" enctype="multipart/form-data">
    {{csrf_field()}}
    <div class="form-group">
      <label for="exampleInputEmail1">Title</label>
      <input type="text" class="form-control" name="title" id="title" aria-describedby="emailHelp">

    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Body</label>
      <textarea name="body" class="form-control"  id="body" ></textarea>
    </div>

    <div class="form-group">
        <label for="url">Image</label>
 <input type="file" name="url" id="url">
      </div>


    <button type="submit" class="btn btn-primary">Add post</button>
  </form>

  <div>
      @foreach ($errors->all() as $error)
   {{    $error}} <br>
      @endforeach
  </div>

        <!-- Comments Form -->
        <div class="card my-4">
          <h5 class="card-header">Leave a Comment:</h5>
          <div class="card-body">
            <form>
              <div class="form-group">
                <textarea class="form-control" rows="3"></textarea>
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>

        <!-- Single Comment -->
        <div class="media mb-4">
          <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
          <div class="media-body">
            <h5 class="mt-0">Commenter Name</h5>
            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
          </div>
        </div>

        <!-- Comment with nested comments -->
        <div class="media mb-4">
          <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
          <div class="media-body">
            <h5 class="mt-0">Commenter Name</h5>
            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.

            <div class="media mt-4">
              <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
              <div class="media-body">
                <h5 class="mt-0">Commenter Name</h5>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
              </div>
            </div>

            <div class="media mt-4">
              <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
              <div class="media-body">
                <h5 class="mt-0">Commenter Name</h5>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
              </div>
            </div>

          </div>
        </div>


@stop
