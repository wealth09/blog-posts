
<x-app-layout>

 <!--Getting session message for created/updated posts-->
 @if (session()->has('status'))
    <div class="bg-green-200 text-green-600 p-3 m-2 w-1/3">
        {{ session()->get('status') }}
    </div>
 @endif

 <!--Getting session message for deleted posts-->
 @if (session()->has('delete'))
    <div class="bg-red-300 text-red-600 p-3 w-1/3 m-2">
        {{ session()->get('delete') }}
    </div>
 @endif

<div>
    <div class="mx-auto w-4/6 pt-5 mb-0">
        <h1 class="text-center bg-blend-darken mt-8 text-indigo-500 font-semibold  uppercase sm:text-lg md:text-xl lg:text-3xl">Blog posts</h1>
        <p class="text-center text-xl text-gray-700 mt-5 py-2 px-14">
            Please not that all post on this are subject to reviews, before being punblish.<br>
            Users, please ensure to follow through our lay down rules to aviod strict restriction on this platform. Thanks!
        </p>

        <!--giving user access to create new post-->

        @if (Auth::user())
        <!-- Create buttom for new input-->
        <div class="py-10 sm:py-20 pt-3">
            <a href="{{ route('posts.create') }}" class="primary-btn inline text-base bg-gray-500 hover:bg-gray-400 px-4 py-2
            text-white shadow-xl transition-all rounded-full">
                New Post
            </a>
        </div>
        @endif
    </div>

    <!--retriving data from the database-->
    @foreach ($posts as $post)
        <div class="w-4/5 mx-auto pb-5">
            <div class="bg-white mx-auto pb-10 rounded-lg drop-shadow-3xl basis-full ">

                <!--giving user access to edit and delete post-->
                @if (Auth::id() === $post->user->id)
                    <!-- Edit post button -->
                    <div class="">
                        <div class="flex justify-end p-4 gap-3">
                            <div class="mt-2">
                                <a href="/posts/{{ $post->id }}/edit" class="bg-gray-700 text-white focus:ring-2 focus:ring-gray-400
                                font-medium text-base py-2 px-3 rounded-lg hover:bg-gray-500 focus:outline-none">Edit</a>
                            </div>

                            <!-- Delete post button!-->
                            <form action="/posts/{{ $post->id }}" method="POST" class="">
                                @csrf
                                @method('delete')
                                <button type="submit" class=" bg-gray-700 text-white focus:ring-2
                                focus:ring-gray-400 font-medium text-base py-2 px-3 rounded-lg hover:bg-gray-500 focus:outline-non">Delete</button>
                            </form>
                        </div>
                    </div>
                @endif

                <div class="w-11/12 mx-auto pb-5">

                    <!--Link to view/show post in details-->
                    <h2 class="text-gray-700 text-2xl pt-4 pb-0 font-semibold hover:text-gray-500 transition-all">
                        <a href="{{ route('posts.show', $post->id) }}">
                            {{ $post->title }}
                        </a>
                    </h2>
                    
                    <!--Out putting details of posts-->
                    <p class="text-gray-700 text-lg py-6 w-full">
                        {{ $post->body }}
                    </p>
                    <span class="text-gray-500 text-sm ">
                        Created by: {{ $post->user->name }}
                        on {{ $post->created_at }}
                    </span>
                </div>
            </div>
        </div>
    @endforeach

    <!--Adding pagination to the page-->
    <div class="mx-auto pb-10 w-1/3">
        {{ $posts->links() }}
    </div>
</x-app-layout>
