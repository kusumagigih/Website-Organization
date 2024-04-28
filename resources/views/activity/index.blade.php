<x-guest-layout>
    <div class="container my-12">
        <div class="grid grid-cols-3 gap-10 justify-center">
            @foreach ($list as $activities)
                <x-activity-card :activity="$activities" />
            @endforeach
        </div>
    </div>
</x-guest-layout>