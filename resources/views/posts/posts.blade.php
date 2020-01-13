@extends('layout')

@section('content')

<div class="container">

    <div class="row">

        <!-- Post Content Column -->
        <div class="col-lg-8" style="padding-top: 30px">
            <div class="pull-right">
                @if(auth()->check())
                  @can('post-create')
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Create New Post</button>

                   @endcan
                    @endif
            </div>
@foreach($posts as $post)

            <!-- Title -->
            <h1 class="mt-4">{{$post->title}}</h1>

            <!-- Author -->

            <hr>

            <!-- Date/Time -->
            <p>{{$post->created_at}}</p>

            <hr>

            <!-- Preview Image -->
            <img class="img-fluid rounded" src="/images/posts/{{$post->image}}" alt="">

            <hr>

            <!-- Post Content -->
            <p class="lead">{{$post->body}}</p>


                <div class="pull-right">
                    @if(auth()->check())
                        @can('post-edit')
                            <a class="btn btn-primary" href="{{ route('posts.edit',$post->id) }}">Edit</a>

                        @endcan
                    @endif
                </div>

@endforeach




            <hr>
            @can('post-comment')
            <!-- Comments Form -->
            <div class="card my-4">
                <h5 class="card-header">Leave a Comment:</h5>
                <div class="card-body">
                    <form method="post" action="{{ route('comments.store'   ) }}">
                        @csrf
                        <div class="form-group">
                            <textarea name="body" class="form-control" rows="3"></textarea>
                            <input type="hidden" name="blog_id" value="{{ $blog->id }}" />

                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>

        @endcan
        @foreach($comments as $comment)
            <!-- Single Comment -->
            <div class="media mb-4">
                <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                <div class="media-body">
                    <h5 class="mt-0">{{$comment->user->name}}:</h5>
                    {{$comment->body}}
                </div>
            </div>
            @endforeach




        </div>

        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">

            <!-- Search Widget -->
            <div class="card my-4">
                <h5 class="card-header">Search</h5>
                <form method="post" action="{{ route('searchresults') }}">
                    @csrf
                <div class="card-body">

                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for..." name="keyword">
                        <span class="input-group-btn">
                <button class="btn btn-secondary" type="submit">Go!</button>

              </span>

                    </div>
                </div>
                </form>
            </div>

            <!-- Categories Widget -->
            <div class="card my-4">
                <h5 class="card-header">Categories</h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled mb-0">
                                <li>
                                    <a href="#">Web Design</a>
                                </li>
                                <li>
                                    <a href="#">HTML</a>
                                </li>
                                <li>
                                    <a href="#">Freebies</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <ul class="list-unstyled mb-0">
                                <li>
                                    <a href="#">JavaScript</a>
                                </li>
                                <li>
                                    <a href="#">CSS</a>
                                </li>
                                <li>
                                    <a href="#">Tutorials</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>




        </div>

    </div>
    <!-- /.row -->

</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('posts.store') }}" id="createpost" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Title:</label>
                        <input name="title" type="text" class="form-control" id="recipient-name">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Body:</label>
                        <textarea name="body" class="form-control" id="message-text"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Image:</label>
                        <input type="file"
                               id="avatar" name="image"
                               accept="image/png, image/jpeg">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Post</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
    @stop
@section('js')
    <script>


        $( "#createpost" ).validate({
            rules: {
                title: {
                    required: true,

                },
                body: {
                    required: true,

                },
                image: {
                    required: true,
                    accept:"jpg,png,jpeg,gif",

                },

            }
        });
    </script>
@stop
