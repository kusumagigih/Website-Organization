@props(['activity'])

{{-- <div class="bg-white m-auto max-w-sm rounded overflow-hidden shadow-lg hover:scale-105 transition-all">
    <img class="w-full" src="{{ $activity->image }}" alt="">
    <div class="px-6 py-4">
        <h5 class="font-bold text-xl mb-2">{{ $activity->title }}</h5>
        <p class="text-gray-700 text-base">{{ $activity->content }}</p>
    </div>
    <div class="px-6 pt-4 pb-2">
        <form action=" {{ route('activity.show', $activity->slug) }} ">
            <x-primary-button>
                Read More
            </x-primary-button>
        </form>
    </div>
</div> --}}

<div class="card w-96 bg-base-100 bg-white dark:bg-slate-800  shadow-xl rounded-lg">
    <figure class="px-10 pt-10"><img class="w-full" src="{{ $activity->image }}" alt="" /></figure>
    <div class="card-body items-center text-center">
        <h5 class="card-title font-bold text-xl mb-2 text-slate-900 dark:text-white">{{ $activity->title }}</h5>
        <p class="text-base text-slate-500 dark:text-slate-400">{{ $activity->content }}></p>
        <div class="card-actions justify-end">
            <form action=" {{ route('activity.show', $activity->slug) }} ">
                <x-primary-button>
                    Read More
                </x-primary-button>
            </form>
        </div>
    </div>
</div>
