<x-app-layout>

    <!--Creating users show section from using dashboard-->
    
    <div class="w-full pb-10">
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

                <!-- showing comment-->
                <div class="">

                    @forelse ($post->comments as $comment )
                        <div class="">
                            <!--<span class="gap-0 m-0 italic text-gray-700 text-lg mr-0">@</span>-->
                            <span class="text-base text-gray-700 lowercase italic ml-0 mb-1"> {{ $comment->name }} </span>
                            <span class="text-gray-400 text-sm"> {{ $comment->created_at }} </span>
                        </div>
                        <p class="relative left-4 mb-3 py-2 px-3 text-base">
                            {{ $comment->comment }}
                        </p>

                    @empty
                        <p class="text-center text-2xl bg-blend-darken mt-5 text-blue-400 font-semibold italic">
                            No comment found!
                        </p>
                    @endforelse
                    <hr class="mb-3">
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
