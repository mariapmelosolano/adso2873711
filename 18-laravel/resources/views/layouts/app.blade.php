<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <meta http-equiv="X-UA-compatible" content="ie=edge">
    <title>@yield('title')</title>
        <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body>
    <body class="bg-violet-950 min-h-[100dvh] flex flex-col justify-center items-center">   
    @yield('content')

    @yield('js')
</body>
</html>