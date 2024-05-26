<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MusicStore</title>
    <link href="https://fonts.googleapis.com/css2?family=Martian+Mono:wght@100..800&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/c35bfed5f0.js" crossorigin="anonymous"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        laravel: '#ef3b2d',
                    },
                },
            },
        }
    </script>
</head>

<body class="bg-orange-50 font-mono">
    <div class="ml-12 mt-10 mb-4 text-4xl font-martian">
        <a href="/">MusicStore</a>
    </div>
    @auth
    <div class="absolute top-0 right-0 mt-14 mb-24 flex items-center" style="margin-right: 2.5rem;">
        @if(auth()->user()->is_admin)
            <a href="/album_list" class="text-xl hover:underline mr-5"><i class="fa-solid fa-hammer fa-lg"></i> Admin Panel</a>
        @endif
        <button class="text-xl hover:underline mr-5" style="display: inline-flex; align-items: center;">
            <i class="fa-solid fa-cart-shopping"></i>
            <span style="margin-left: 5px;">Cart</span>
        </button>
        <form method="POST" action="/logout" class="inline-flex items-center">
            @csrf
            <button type="submit" class="text-xl hover:underline" style="display: inline-flex; align-items: center;">
                <i class="fa-solid fa-door-open"></i>
                <span style="margin-left: 5px;">Logout</span>
            </button>
        </form>
    </div>
    @else
    <div class="absolute top-0 right-0 mt-14 mb-24 flex items-center" style="margin-right: 2.5rem;">
        <a href="/login" title="Account" class="text-xl mr-5"><i class="fa-solid fa-right-to-bracket fa-xl"></i> Login</a>
        <a href="/register" title="Account" class="text-xl"><i class="fa-solid fa-user-plus"></i> Register</a>
    </div>
    @endauth
    <hr class="border-t-2 border-gray-700">

    @yield('content')
</body>
</html>
