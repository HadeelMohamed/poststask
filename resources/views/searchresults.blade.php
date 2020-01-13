@extends('layout')

@section('content')

    <div class="container">

        <div class="row">

            <!-- Post Content Column -->
            <div class="col-lg-8" style="padding-top: 30px">

            @foreach($results as $post)

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




                @endforeach



{{!! $results->render() }}









        <!-- /.row -->

    </div>
        </div>
    </div>

@stop

