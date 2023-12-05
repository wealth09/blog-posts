<x-app-layout>
    <div class="w-full pb-10">

        <!--displaying the session message!-->
        @if (session()->has('success'))
            <div class="bg-green-200 text-green-600 p-4 m-2">
                {{ session()->get('success') }}
            </div>
        @endif

        <!--Fetching the post info from the database-->
        <div class="w-4/5 mx-auto p-8 mt-9  bg-white shadow-xl">
            <h2 class="text-center text-gray-600 text-3xl font-semibold mb-6 p-">
                {{ $post->title }}
            </h2>
            <hr class="mb-4">

            <div class="w-4/5mx-auto px-10 py-10">

                <span class="font-semibold text-gray-500">
                    Date_created: {{ $post->created_at }}
                </span>

                <img src="{{ asset('images/' . $post->image_path) }}" alt="" class="mt-4">

                <p class="text-md mb-7 mt-6">
                    {{ $post->body }}
                </p>

                <div class="">
                    <span class="text-gray-600 mt-7 text-xl font-semibold text-end mb-5">
                        Comments
                    </span>
                </div>

                <!-- form for Comment-->
                <form action="{{ route('save.comment', [$post]) }}" method="POST">
                    @csrf

                    <input type="hidden"  name="post_id" value="{{ $post->id }}">

                    <input type="text" name="name" placeholder="enter nick name"
                    class="bg-transparent border-none block mt-5 mb-4 outline-none p-3 rounded-lg">

                    <div class="flex flex-row">
                        <div class="flex-1 w-64">
                            <input type="text" name="comment" placeholder="Add a comment........."
                            class="bg-transparent border-none block outline-none w-full p-3 mb-1 rounded-lg">
                        </div>

                        <div class="flex-none w-32 p-4">
                            <button type="submit" class="bg-blue-500 rounded-lg py-1 px-2
                            text-white text-base hover:bg-blue-400">Comment</button>
                        </div>
                    </div>
                </form>

                <!-- showing errors for the comment session-->
                @if ($errors->any())
                    <div class="bg-red-200 text-red-600 mx-auto p-3 w-100">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <p class="text-cennter">{{ $error }}</p>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- showing/fetching comments-->
                <div class="">
                    @foreach ($post->comments as $comment)
                    <div class="">
                        <!--<span class="gap-0 m-0 italic text-gray-700 text-lg mr-0">@</span>-->
                        <span class="text-base text-gray-700 lowercase italic ml-0 mb-1"> {{ $comment->name }} </span>
                        <span class="text-gray-400 text-sm"> {{ $comment->created_at }} </span>
                    </div>
                    <p class="relative left-4 mb-3 p-4 text-sm"> {{ $comment->comment }} </p>
                    <hr class="mb-3">
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
