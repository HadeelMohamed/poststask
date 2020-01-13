@extends('layout')

@section('content')
    <style>
        body {
            background: #f7f7f7;
        }

        .form-box {
            max-width: 500px;
            margin: auto;
            padding: 50px;
            background: #ffffff;
            border: 10px solid #f2f2f2;
        }

        h1, p {
            text-align: center;
        }

        input, textarea {
            width: 100%;
        }
    </style>
    <div class="form-box">
        <h1> Contact Form</h1>

        <form action="{{ route('sendcontactusmail')}}" method="post" id="contactus">
            @csrf

            <div class="form-group">
                <label for="name">Name</label>
                <input class="form-control" id="name" type="text" name="name">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input class="form-control" id="email" type="email" name="email">
            </div>
            <div class="form-group">
                <label for="message">Message</label>
                <textarea class="form-control" id="message" name="body"></textarea>
            </div>
            <input class="btn btn-primary" type="submit" value="Submit" />
    </div>
    </form>
    </div>

    @endsection
@section('js')
    <script>


        $( "#contactus" ).validate({
            rules: {
                name: {
                    required: true,

                },
                email: {
                    required: true,

                },
                body: {
                    required: true,

                },


            }
        });
    </script>
@stop
