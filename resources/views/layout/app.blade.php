<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>LaBlog</title>
</head>

<body class="w-full h-full bg-gray-100">
    @yield('allPosts')
    @yield('singlePost')
</body>

</html>
