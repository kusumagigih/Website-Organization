<x-app-form-layout :header="$kontak->id == 0 ? 'Publish Contact Person' : 'Edit Contact Person'">
    <x-slot name="pageButtons">
        <button form="myform" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 
        focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 
        dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Simpan
        </button>
    </x-slot>


    <form method="POST" enctype="multipart/form-data" id="myform"
        action="{{ $kontak->id == 0 ? route('kontakk.store') : route('kontakk.update', $kontak->id) }}">
        @if ($kontak->id != 0)
            @method('PUT')
        @endif

        @csrf

        <div class="form-control w-full max-w-xs">
            <label class="label">
                <span class="label-text">Nomer WA</span>
            </label>
            <input required type="text" name="nomer" class="input input-bordered w-full max-w-xs bg-white dark:bg-slate-800 text-slate-900 dark:text-white"
                value="{{ $kontak->nomer }}" />
        </div>

        <div class="form-control w-full max-w-xs">
            <label class="label">
                <span class="label-text">Link WA</span>
            </label>
            <textarea required name="linkwa" class="textarea textarea-bordered w-full max-w-xs bg-white dark:bg-slate-800 text-slate-900 dark:text-white">
                {{ $kontak->linkwa }}
            </textarea>
        </div>

        <div class="form-control w-full max-w-xs">
            <label class="label">
                <span class="label-text">Email</span>
            </label>
            <textarea required name="email" class="textarea textarea-bordered w-full max-w-xs bg-white dark:bg-slate-800 text-slate-900 dark:text-white">
                {{ $kontak->email }}
            </textarea>
        </div>

        <div class="form-control w-full max-w-xs">
            <label class="label">
                <span class="label-text">Sekretariat</span>
            </label>
            <textarea required name="sekret" class="textarea textarea-bordered w-full max-w-xs bg-white dark:bg-slate-800 text-slate-900 dark:text-white">
                {{ $kontak->sekret }}
            </textarea>
        </div>

    </form>

    @if ($kontak->id != 0)
        <form method="POST" action="{{ route('kontakk.destroy', $kontak->id) }}" onsubmit="return confirm('yakin?')">
            @method('DELETE')
            @csrf
            <button class="btn btn-error">Delete</button>
        </form>
    @endif

</x-app-form-layout>
