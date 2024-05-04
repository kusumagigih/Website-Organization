<x-app-form-layout header="Contact Person Komisariat">
    <x-slot name="pageButtons">
        <a href="{{ route('kontakk.create') }}"
            class="inline-flex items-center 
        px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 
        focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 
        dark:focus:ring-blue-800">
            Tambah
        </a>
    </x-slot>

    <div class="overflow-x-auto">
        <table class="table-auto border-separate [border-spacing:1rem] rounded-lg">
            {{-- Head --}}
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nomer</th>
                    <th>Linkwa</th>
                    <th>Email</th>
                    <th>Sekretariat</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($list as $i => $kontakk)
                    <tr>
                        <th>{{ $i + 1 }}</th>
                        <td>{{ $kontakk->nomer }}</td>
                        <td class="whitespace-pre-line">{{ $kontakk->linkwa }}</td>
                        <td>{{ $kontakk->email }}</td>
                        <td>{{ $kontakk->sekret }}</td>
                        <td>{{ $kontakk->created_at }}</td>
                        <td>
                            <a href="{{ route('kontakk.edit', $kontakk->id) }}"
                                class="inline-flex items-center px-3 py-2 text-sm 
                                font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 
                                focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Edit
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-form-layout>