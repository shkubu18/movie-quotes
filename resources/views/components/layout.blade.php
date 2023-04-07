<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Movie Quotes</title>
</head>
<body class="min-h-screen bg-gradient-to-br from-zinc-500 to-zinc-900 text-white">
    <x-aside/>
    {{ $slot }}
</body>
</html>
