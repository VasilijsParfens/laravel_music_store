<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Comments</title>
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

    <div class="flex justify-center mt-6"> <!-- Centering the table -->
        <div class="max-w-7xl"> <!-- Adjusting the maximum width -->
            @if(count($comments) > 0)
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-10 py-4 text-left text-sm font-medium text-gray-700 uppercase tracking-wider">Comment id</th>
                            <th class="px-10 py-4 text-left text-sm font-medium text-gray-700 uppercase tracking-wider">User id</th>
                            <th class="px-10 py-4 text-left text-sm font-medium text-gray-700 uppercase tracking-wider">Album id</th>
                            <th class="px-10 py-4 text-left text-sm font-medium text-gray-700 uppercase tracking-wider">Text</th>
                            <th class="px-10 py-4 text-left text-sm font-medium text-gray-700 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200 text-xl">
                        @foreach($comments as $comment)
                            <tr>
                                <td class="px-10 py-6 whitespace-nowrap">{{ $comment->id }}</td>
                                <td class="px-10 py-6 whitespace-nowrap"><a href="/comments/user/{{ $comment->user_id }}">{{ $comment->user_id }}</a></td>
                                <td class="px-10 py-6 whitespace-nowrap"><a href="/comments/album/{{ $comment->album_id }}">{{ $comment->album_id }}</a></td>
                                <td class="px-10 py-6 whitespace-nowrap max-w-[400px] overflow-hidden overflow-ellipsis">{{ $comment->text }}</td>
                                <td class="px-10 py-6 whitespace-nowrap">
                                    <form method="POST" action="/comments/{{ $comment->id }}" >
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
                <p class="text-center">No comments found</p>
            @endif
        </div>
    </div>




</body>
