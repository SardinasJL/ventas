<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="{{url("css/bootstrap.min.css")}}" rel="stylesheet">
</head>
<body>
@include("navbar")

<div class="mt-4">
    @yield("content")
</div>

<script src="{{url("js/bootstrap.bundle.min.js")}}"></script>
</body>
</html>
