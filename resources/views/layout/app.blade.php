<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>exo storage 3</title>
    <link rel="stylesheet" href={{ asset("css/app.css") }}>
</head>
<body class="bg-dark">

    <div class="container-fluid">
        <div class="row">
            <div class="col col-md-2">

            </div>
            <div class="col-12 col-md-10">
                @yield('content')
            </div>
        </div>
    </div>
    
    <script src="{{ asset("js/app.js") }}"></script>
</body>
</html>