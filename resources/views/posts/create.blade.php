<x-app-layout>
@section('')
<div class="w-4/5 mx-auto pt-9">

    <h2 class="text-center text-2xl mt-8 uppercase font-semibold text-indigo-500 ">
        create your new post
    </h2>
    <hr class="mt-6 text-slate-500 border border-l">
</div>

<div class="w-4/5 mx-auto p-11">

    <!-- /resources/views/post/create.blade.php -->
    @if ($errors->any())
    <div class="bg-red-200 text-red-600 p-2 w-4/5">
        <ul>
            @foreach ($errors->all() as $error)
                <p class="text-cennter">{{ $error }}</p>
            @endforeach
        </ul>
    </div>
    @endif

    <!-- Creating Post Form -->
   <div class="m-auto pt-8">
        <form action="/posts" method="POST"  enctype="multipart/form-data">
            @csrf

            <label for="title" class="text-gray-600 text-base font-base">Title</label>

            <input type="text" name="title" placeholder="title...." class="bg-transparent block border-none outline-none w-full h-10 p-2 text-lg mt-4 rounded-lg">

            <textarea name="body" placeholder="Posts...." class="bg-transparent block border-none  w-full h-60 p-2 outline-none text-lg mt-4 rounded-lg"></textarea>

            <input type="file" name="image"   class="cursor-pointer mt-5" >

            <button type="submit" class="block bg-gray-500 py-2 px-3 mt-5 text-white text-lg rounded-full hover:bg-gray-400 transition-all">
                Submit Post
            </button>

        </form>
   </div>

</div>

</x-app-layout>
