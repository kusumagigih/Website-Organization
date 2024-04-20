<x-app-form-layout header="List Blog">
    <x-slot name="pageButtons">
        <a href="{{ route('blog.create') }}" class="btn btn-success">
            Tambah
        </a>
    </x-slot>
    <div class="overflow-x-auto">
        <table class="table">
            <!-- head -->
            <thead>
                <tr>
                    <th></th>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Publish</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($list as $i => $blog)
                    <tr class="hover">
                        <th>{{ $i + 1 }}</th>
                        <td>{{ $blog->title }}</td>
                        <td>{{ $blog->content }}</td>
                        <td>{{ $blog->created_at }}</td>
                        <td>
                            <a href="{{ route('blog.edit', $blog->id) }}" class="btn btn-primary">
                                Edit
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-form-layout>
