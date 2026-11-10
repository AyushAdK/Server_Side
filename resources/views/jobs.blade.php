<x-layout>
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold">Job Listings</h1>
        <a href="/jobs/create" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Post a Job
        </a>
    </div>

    <div class="space-y-4">
        @foreach ($jobs as $job)
            <div class="bg-white p-4 rounded shadow hover:shadow-md transition">
                <a href="/jobs/{{ $job->id }}" class="block">
                    <h2 class="text-xl font-semibold text-blue-600">{{ $job->title }}</h2>
                    <p class="text-gray-600">Employer: {{ $job->employer->name }}</p>
                    <p class="text-green-600 font-medium">${{ number_format($job->salary) }}</p>

                    @if($job->tags->count())
                        <div class="mt-2 flex gap-2 flex-wrap">
                            @foreach($job->tags as $tag)
                                <span class="bg-gray-200 text-gray-700 text-xs px-2 py-1 rounded">{{ $tag->name }}</span>
                            @endforeach
                        </div>
                    @endif
                </a>
            </div>
        @endforeach
    </div>
</x-layout>
