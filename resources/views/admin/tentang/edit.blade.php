<x-app-form-layout :header="$tentang->id == 0 ? 'Publish Data Diri Kader' : 'Edit Data Diri Kader'">
    <x-slot name="pageButtons">
        <button form="myform" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 
        focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 
        dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Simpan
        </button>
    </x-slot>


    <form method="POST" enctype="multipart/form-data" id="myform"
        action="{{ $tentang->id == 0 ? route('tentangg.store') : route('tentangg.update', $tentang->id) }}">
        @if ($tentang->id != 0)
            @method('PUT')
        @endif

        @csrf

        <div class="form-control w-full max-w-xs">
            <label class="label">
                <span class="label-text">Nama Kader</span>
            </label>
            <input required type="text" name="nama" class="input input-bordered w-full max-w-xs bg-white dark:bg-slate-800 text-slate-900 dark:text-white"
                value="{{ $tentang->nama }}" />
        </div>

        <div class="form-control w-full max-w-xs">
            <label class="label">
                <span class="label-text">Tahun Kaderisasi</span>
            </label>
            <textarea required name="kaderisasi" class="textarea textarea-bordered w-full max-w-xs bg-white dark:bg-slate-800 text-slate-900 dark:text-white">
                {{ $tentang->kaderisasi }}
            </textarea>
        </div>


        <div class="form-control w-full max-w-xs">
            <label class="label">
                <span class="label-text">Image</span>
            </label>
            <input {{ $tentang->id == 0 ? 'required' : '' }} name="image" type="file"
                class="file-input file-input-bordered w-full max-w-xs" />
            @if ($tentang->image)
                <img src="{{ asset('images'.$tentang->image) }}" alt="" class="w-24 h-24 block" />
            @endif
        </div>
    </form>

    @if ($tentang->id != 0)
        <form method="POST" action="{{ route('tentangg.destroy', $tentang->id) }}" onsubmit="return confirm('yakin?')">
            @method('DELETE')
            @csrf
            <button class="btn btn-error">Delete</button>
        </form>
    @endif

</x-app-form-layout>
