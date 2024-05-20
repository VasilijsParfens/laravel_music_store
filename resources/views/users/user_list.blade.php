<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Users</title>
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
        <div class="max-w-4xl"> <!-- Adjusting the maximum width -->
            @if(count($users) > 0)
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-4 text-left text-sm font-medium text-gray-700 uppercase tracking-wider">User Id</th>
                            <th class="px-4 py-4 text-left text-sm font-medium text-gray-700 uppercase tracking-wider">Name</th>
                            <th class="px-4 py-4 text-left text-sm font-medium text-gray-700 uppercase tracking-wider">E-mail</th>
                            <th class="px-4 py-4 text-left text-sm font-medium text-gray-700 uppercase tracking-wider">Is_admin</th>
                            <th class="px-4 py-4 text-left text-sm font-medium text-gray-700 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200 text-base">
                        @foreach($users as $user)
                            <tr>
                                <td class="px-4 py-2 whitespace-nowrap">{{ $user->id }}</td>
                                <td class="px-4 py-2 whitespace-nowrap">{{ $user->name }}</td>
                                <td class="px-4 py-4 whitespace-nowrap">{{ $user->email }}</td>
                                <td class="px-4 py-4 whitespace-nowrap">{{ $user->is_admin}}</td>
                                <td class="px-4 py-4 whitespace-nowrap">
                                    <form method="POST" action="/users/{{ $user->id }}" >
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-white mt-2 p-2 px-4 rounded-xl bg-red-900">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p class="text-center">No users found</p>
            @endif
        </div>
    </div>




</body>
