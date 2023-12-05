<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}

                    <div class="mx-auto w-4/6 mb-0">
                        <h1 class="text-center bg-blend-darken mt-8 text-indigo-500 font-semibold  uppercase sm:text-lg md:text-xl lg:text-3xl">Blog posts</h1>
                        <p class="text-center text-xl text-gray-700 mt-5 py-2 px-14">
                            Please not that all post on this are subject to reviews, before being punblish.<br>
                            Users, please ensure to follow through our lay down rules to aviod strict restriction on this platform. Thanks!
                        </p>
                        <!--giving user access to create new post-->
                        @if (Auth::user())
                        <!-- Create buttom for new input-->
                        <div class="py-4 sm:py-2">
                            <a href="{{ route('posts.create') }}" class="primary-btn inline text-base bg-gray-500 hover:bg-gray-400 px-4 py-2
                            text-white shadow-xl transition-all rounded-full">
                                New Post
                            </a>
                        </div>
                        @endif
                </div>
            </div>
            <div class="w-full mt-10">
                <!--Retriving user posts on user dashboard-->
                @foreach (Auth::user()->posts as $post )
                <div class="w-4/5 mx-auto pb-5 rounded-lg drop-shadow-3xl basis-full">
                   <div class="bg-gray-200 py-3 px-10 ">
                        <div class="mb-2">
                            <div class="flex justify-end gap-3">
                                <div class="mt-2">
                                    <a href="/posts/{{ $post->id }}/edit" class="bg-gray-700 text-white focus:ring-2 focus:ring-gray-400
                                    font-medium text-base py-2 px-3 rounded-lg hover:bg-gray-500 focus:outline-none">Edit</a>
                                </div>

                                <form action="/posts/{{ $post->id }}" method="POST" class="">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class=" bg-gray-700 text-white focus:ring-2
                                    focus:ring-gray-400 font-medium text-base py-2 px-3 rounded-lg hover:bg-gray-500 focus:outline-non">Delete</button>
                                </form>
                            </div>
                        </div>
                        <div class="px-5 py-3 mt-2">
                            <h1 class="text-gray-700 text-2xl pt-4 pb-0 font-semibold mt-3">
                                {{ $post->title }}
                            </h1>
                            <p class="text-gray-700 text-lg py-6 w-full">
                                {{ $post->body }}
                            </p>

                            <span class="text-gray-500 text-lg pt-4 pb-0 font-semibold hover:text-gray-500 transition-all">
                                <a href="{{ route('user.show', $post->id) }}">
                                    Post detail
                                </a>
                                <span class="text-indigo-300 font-bold text-base">
                                    on {{ $post->updated_at }}
                                </span>
                            </span>
                        </div>
                   </div>
                </div>
                @endforeach



            </div>
        </div>
    </div>
</x-app-layout>
