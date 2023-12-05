<x-app-layout>
    <div class="w-4/5 mx-auto">
        <div class="text-center p-20">
            <h1 class="text-indigo-500 text-2xl p-10 font-medium uppercase">Edit Posts</h1>
        </div>

        <!--Edit form for posts-->
        <div class="m-auto pt-20">
            <form action="/posts/{{ $post->id }}" method="POST">
                @csrf
                @method('PUT')

                <label for="title" class="text-gray-600 text-lg font-base">Title</label>

                <input type="text" name="title" value="{{ $post->title }}" class="bg-transparent block border-none outline-none w-full h-10 p-2 text-lg mt-4 rounded-lg">

                <textarea name="body" class="bg-transparent block border-none  w-full h-50 p-2 outline-none text-lg mt-4 rounded-lg">{{ $post->body }}</textarea>

                <button type="submit" class="block bg-gray-500 py-2 px-3 mt-5 text-white text-lg rounded-full hover:bg-gray-400 transition-all">
                    Update Post
                </button>

            </form>
        </div>
    </div>
</x-app-layout>
