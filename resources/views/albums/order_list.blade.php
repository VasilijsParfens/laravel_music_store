<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Orders</title>
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
            @if(count($orders) > 0)
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-10 py-4 text-left text-sm font-medium text-gray-700 uppercase tracking-wider">Order id</th>
                            <th class="px-10 py-4 text-left text-sm font-medium text-gray-700 uppercase tracking-wider">User id</th>
                            <th class="px-10 py-4 text-left text-sm font-medium text-gray-700 uppercase tracking-wider">Album id</th>
                            <th class="px-10 py-4 text-left text-sm font-medium text-gray-700 uppercase tracking-wider">Purchase price</th>
                            <th class="px-10 py-4 text-left text-sm font-medium text-gray-700 uppercase tracking-wider">Created at</th>
                            <th class="px-10 py-4 text-left text-sm font-medium text-gray-700 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200 text-xl">
                        @foreach($orders as $order)
                            <tr>
                                <td class="px-10 py-6 whitespace-nowrap">{{ $order->id }}</td>
                                <td class="px-10 py-6 whitespace-nowrap"><a href="/orders/user/{{ $order->user_id }}">{{ $order->user_id }}</a></td>
                                <td class="px-10 py-6 whitespace-nowrap"><a href="/orders/album/{{ $order->album_id }}">{{ $order->album_id }}</a></td>
                                <td class="px-10 py-6 whitespace-nowrap max-w-[400px] overflow-hidden overflow-ellipsis">{{ $order->purchase_price }}</td>
                                <td class="px-10 py-6 whitespace-nowrap max-w-[400px] overflow-hidden overflow-ellipsis">{{ $order->created_at }}</td>
                                <td class="px-10 py-6 whitespace-nowrap">
                                    <form method="POST" action="/orders/{{ $order->id }}" >
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
                <p class="text-center">No orders found</p>
            @endif
        </div>
    </div>




</body>
