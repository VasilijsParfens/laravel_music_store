<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Albums</title>
    <link href="https://fonts.googleapis.com/css2?family=Martian+Mono:wght@100..800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="sort.js"></script>
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
    <nav class="bg-amber-600 p-4">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
          <div>
            <p class="text-white text-xl font-bold">Admin Panel</p>
          </div>
          <div class="flex justify-center space-x-32">
            <a href="/" class="text-white text-xl px-6 py-4 rounded-lg hover:bg-amber-700">Home</a>
            <a href="/album_list" class="text-white text-xl px-6 py-4 rounded-lg hover:bg-amber-700">Albums</a>
            <a href="/user_list" class="text-white text-xl px-6 py-4 rounded-lg hover:bg-amber-700">Users</a>
            <a href="/comment_list" class="text-white text-xl px-6 py-4 rounded-lg hover:bg-amber-700">Comments</a>
            <a href="/order_list" class="text-white text-xl px-6 py-4 rounded-lg hover:bg-amber-700">Orders</a>
          </div>
        </div>
    </nav>

    <div class="flex justify-center items-center mr-56 mt-8"> <!-- Centering the table horizontally -->
        <div class="max-w-4xl">
            @if(count($albums) > 0)
                <table class="min-w-full divide-y divide-gray-200"> <!-- Centering the table horizontally -->
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-10 py-4 text-left text-sm font-medium text-gray-700 uppercase tracking-wider max-w-xs">Album Id</th>
                            <th class="px-10 py-4 text-left text-sm font-medium text-gray-700 uppercase tracking-wider max-w-xs">Cover</th>
                            <th class="px-10 py-4 text-left text-sm font-medium text-gray-700 uppercase tracking-wider max-w-xs">Artist</th>
                            <th class="px-10 py-4 text-left text-sm font-medium text-gray-700 uppercase tracking-wider max-w-xs">Title</th>
                            <th class="px-10 py-4 text-left text-sm font-medium text-gray-700 uppercase tracking-wider">Price</th>
                            <th class="px-10 py-4 text-left text-sm font-medium text-gray-700 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200 text-xl">
                        @foreach($albums as $album)
                            <tr>
                                <td class="px-10 py-6 whitespace-nowrap">{{ $album->id }}</td>
                                <td class="px-26 py-6 whitespace-nowrap">
                                    <img class="w-35 h-35 rounded-lg" src="{{$album->album_cover ? asset('storage/' . $album->album_cover) : asset('/images/noimage.jpg')}}" alt="" />
                                </td>
                                <td class="px-10 py-6 whitespace-nowrap">{{ $album->artist }}</td>
                                <td class="px-10 py-6 whitespace-nowrap">{{ $album->title }}</td>
                                <td class="px-10 py-6 whitespace-nowrap">{{ $album->price }}$</td>
                                <td class="px-10 py-6 whitespace-nowrap">
                                    <a href="/albums/{{ $album->id }}/edit" class="text-white mr-4 p-4 px-6 rounded-xl bg-indigo-900">Edit</a>
                                    <form method="POST" action="/albums/{{ $album->id }}" >
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-white mt-8 p-4 px-6 rounded-xl bg-red-900">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p class="text-center">No albums found</p>
            @endif
        </div>
    </div>

    <a href="/albums/create" class="text-white bg-green-500 px-6 py-3 rounded-md hover:bg-green-600 fixed bottom-4 right-4 z-50">Create Album</a>
</body>
</html>
