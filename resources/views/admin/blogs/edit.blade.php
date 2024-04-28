<x-app-form-layout :header="$blog->id == 0 ? 'Publish Blog' : 'Edit Blog'">
    <x-slot name="pageButtons">
        <button form="myform" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"">
            Simpan
        </button>
    </x-slot>


    <form method="POST" enctype="multipart/form-data" id="myform"
        action="{{ $blog->id == 0 ? route('blog.store') : route('blog.update', $blog->id) }}">
        @if ($blog->id != 0)
            @method('PUT')
        @endif

        @csrf

        <div class="form-control w-full max-w-xs">
            <label class="label">
                <span class="label-text">Title</span>
            </label>
            <input required type="text" name="title" class="input input-bordered w-full max-w-xs bg-white dark:bg-slate-800 text-slate-900 dark:text-white"
                value="{{ $blog->title }}" />
        </div>

        <div class="form-control w-full max-w-xs">
            <label class="label">
                <span class="label-text">Content</span>
            </label>
            <textarea required name="content" class="textarea textarea-bordered w-full max-w-xs bg-white dark:bg-slate-800 text-slate-900 dark:text-white">{{ $blog->content }}</textarea>
        </div>


        <div class="form-control w-full max-w-xs">
            <label class="label">
                <span class="label-text">Image</span>
            </label>
            <input {{ $blog->id == 0 ? 'required' : '' }} name="image" type="file"
                class="file-input file-input-bordered w-full max-w-xs" />
            @if ($blog->image)
                <img src="{{ asset('images'.$blog->image) }}" alt="" class="w-24 h-24 block" />
            @endif
        </div>
    </form>

    @if ($blog->id != 0)
        <form method="POST" action="{{ route('blog.destroy', $blog->id) }}" onsubmit="return confirm('yakin?')">
            @method('DELETE')
            @csrf
            <button class="btn btn-error">Delete</button>
        </form>
    @endif

</x-app-form-layout>
