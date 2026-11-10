<x-layout>
    <div class="bg-white p-6 rounded shadow">
        <h1 class="text-3xl font-bold mb-2">{{ $job->title }}</h1>
        <p class="text-gray-600 mb-1"><strong>Employer:</strong> {{ $job->employer->name }}</p>
        <p class="text-green-600 font-semibold text-xl mb-4">${{ number_format($job->salary) }}</p>

        @if($job->tags->count())
            <div class="mb-4">
                <strong class="text-gray-700">Tags:</strong>
                <div class="flex gap-2 flex-wrap mt-1">
                    @foreach($job->tags as $tag)
                        <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded">{{ $tag->name }}</span>
                    @endforeach
                </div>
            </div>
        @endif

        <div class="flex gap-4 mt-6">
            <a href="/jobs/{{ $job->id }}/edit" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">Edit</a>

            <form method="POST" action="/jobs/{{ $job->id }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700"
                        onclick="return confirm('Are you sure you want to delete this job?')">
                    Delete
                </button>
            </form>

            <a href="/jobs" class="bg-gray-300 text-gray-700 px-4 py-2 rounded hover:bg-gray-400">Back to Jobs</a>
        </div>
    </div>
</x-layout>
