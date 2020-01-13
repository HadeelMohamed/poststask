<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blog Post - Start Bootstrap Template</title>

    <!-- Bootstrap core CSS -->
    <link href="/front/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/front/css/blog-post.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
    <link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/site-demos.css">


</head>

<body>

<!-- Navigation -->
@include('partials.nav')

<!-- Page Content -->

@yield('content')

@include('partials.footer')
<!-- Bootstrap core JavaScript -->
<script src="/front/vendor/jquery/jquery.min.js"></script>
<script src="/front/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>


<script type="text/javascript">

    $('#myTable').DataTable();

</script>

@yield('js')


</body>

</html>
