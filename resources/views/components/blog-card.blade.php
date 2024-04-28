@props(['blog'])

{{-- <div class="bg-white m-auto max-w-sm rounded overflow-hidden shadow-lg">
    <img class="w-full" src="{{ $blog->image }}" alt="">
    <div class="px-6 py-4">
        <h5 class="font-bold text-xl mb-2">{{ $blog->title }}</h5>
        <p class="text-gray-700 text-base">{{ $blog->content }}</p>
    </div>
    <div class="px-6 pt-4 pb-2">
        <form action=" {{ route('blogs.show', $blog->slug) }} ">
            <x-primary-button>
                Read More
            </x-primary-button>
        </form>
    </div>
</div> --}}

<div class="card w-96 bg-base-100 bg-white dark:bg-slate-800  shadow-xl rounded-lg flex flex-col justify-between">
    <div>
        <figure class="px-10 pt-10"><img class="w-full size-64" src="{{ asset('images' . $blog->image) }}" alt="" /></figure>
        <h5 class="card-title font-bold text-xl mb-2 text-slate-900 dark:text-white items-center text-center pt-5">{{ $blog->title }}</h5>
    </div>
    <div class="card-body items-center text-center">
        <div>
            <p class="text-base text-slate-500 dark:text-slate-400 max-h-30 px-2 text-balance pb-5">{{ Str::limit($blog->content, 100,) }}</p>
        </div>
        <div class="card-actions justify-end pb-8">
            <form action=" {{ route('blogs.show', $blog->slug) }} ">
                <x-primary-button>
                    Read More
                </x-primary-button>
            </form>
        </div>
    </div>
</div>
