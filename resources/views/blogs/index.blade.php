@extends('layout')
@section('content')
    <div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>All Blogs</h2>
            </div>

        </div>
    </div>



    <div style="padding-top: 30px">

        <table class="table table-bordered" id="myTable" >
            <thead>
            <tr>

                <th>Blog </th>

                <th width="280px">Action</th>
            </tr>
            </thead>
            <tbody>

            @foreach ($blogs as $key => $blog)
                <tr>

                    <td>{{ $blog->users_blog->name }}</td>


                    <td>
                        <a class="btn btn-info" href="{{ route('blogs.show',$blog->user_id) }}">Show</a>

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    </div>





@endsection

