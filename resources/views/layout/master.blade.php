<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title> {{ $title  }} </title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <link href="/css/blog.css" rel="stylesheet">
    <style>
        .completed {
            text-decoration: line-through;
        }
    </style>

</head>

<body>

    @include('layout.nav')

    <main role="main" class="container">
        <div class="row">

            @yield('content')

{{--            @include('layout.sidebar')--}}
            <aside class="col-md-4 blog-sidebar">
                <div class="p-3 mb-3 bg-light rounded">
                    <h4 class="font-italic">Теги</h4>
                    @include('tasks.tags', ['tags' => $tagsCloud])
                </div >
            </aside><!-- /.blog-sidebar -->
        </div>

    </main>

    @include('layout.footer')


</body>
</html>
