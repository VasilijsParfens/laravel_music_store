<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Martian+Mono:wght@100..800&display=swap" rel="stylesheet">
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
    <div class="ml-4 mt-10 mb-4 text-4xl font-martian">
        <a href="/">MusicStore</a>
    </div>
    @auth
    <li>
        <form class="absolute top-10 right-2 w-24" method="POST" action="/logout">
          @csrf
          <button type="submit" class="text-xl hover:underline">
            Logout
          </button>
        </form>
    </li>
    @else
    <div class="absolute top-0 right-0 mt-14 mr-14 mb-18">
        <a href="/login" title="Account"><img src="/images/user.png" alt="Account" style="width:34px;"></a>
    </div>
    @endauth
    <hr class="border-t-2 border-gray-700">
    <li>
        <!-- Conditionally display Admin panel link -->
        <div class="absolute top-10 right-44 w-32">
            @if(auth()->check() && auth()->user()->is_admin)
                <a href="/album_list" class="text-xl hover:underline">Admin Panel</a>
            @endif
        </div>
    </li>

    @yield('content')
</body>
</html>
