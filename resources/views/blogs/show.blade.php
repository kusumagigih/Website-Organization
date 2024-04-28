<x-guest-layout>
    <div class="container">
        <div class="bg-slate-300 dark:bg-gray-900 rounded overflow-hidden shadow-lg">
            <img class="size-fit mx-auto pt-5" src="{{ asset('images'.$blog->image) }}" alt="">
            <div class="text-center whitespace-pre-line">
                <h5 class="font-bold text-2xl mb-2 text-gray-700 dark:text-gray-500 py-5">{{ $blog->title }}</h5>
                <p class="text-gray-700 text-lg dark:text-gray-500 px-5 pb-5 text-justify">{{ $blog->content }}</p>
            </div>
        </div>
    </div>
</x-guest-layout>
