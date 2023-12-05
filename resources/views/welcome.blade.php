<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        @vite('resources/css/app.css', 'resources/js/app.js')
    </head>
    <body class="m-0">

        <!-- Header on welcome.blade.php created-->

       <!-- <header class="bg-gray-500 w-full p-3 text-end mt-0">
            <div class="inline gap-2">
                {{-- <a href="{{ route('login') }}" class="text-white text-sm hover:text-gray-300">Login</a> --}}
                {{-- <a href="{{ route('register') }}" class="text-white text-sm hover:text-gray-300">Register</a> --}}
            </div>
        </header> -->

        <h1 class="text-center text-2xl uppercase bg-blend-darken mt-5 text-indigo-500 font-semibold">
            Welcome to the post
        </h1>
        
        <!-- Route to view posts-->
        <div class="w-4/5 mx-auto p-5">
            <a href="{{ route('posts.index') }}" class="text-gray-500 text-lg font-bold uppercase hover:text-gray-400">
                view post
            </a>
        </div>

    </body>
</html>
