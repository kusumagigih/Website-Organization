<x-app-form-layout header="List Kegiatan">
    <x-slot name="pageButtons">
        <a href="{{ route('activiti.create') }}"
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
                    <th>Title</th>
                    <th>Content</th>
                    <th>Publish</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($list as $i => $activities)
                    <tr>
                        <th>{{ $i + 1 }}</th>
                        <td>{{ Str::limit($activities->title, 20,) }}</td>
                        <td>{{ Str::limit($activities->content, 20,) }}</td>
                        <td>{{ $activities->created_at }}</td>
                        <td>
                            <a href="{{ route('activiti.edit', $activities->id) }}"
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