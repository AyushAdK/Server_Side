<x-layout>
    <h1>{{ $job->title }}</h1>
    <p><strong>Salary:</strong> ${{ $job->salary }}</p>
    <p><strong>Employer:</strong> {{ $job->employer->name }}</p>

    @if($job->tags->count())
        <p><strong>Tags:</strong>
            @foreach($job->tags as $tag)
                <span>{{ $tag->name }}{{ !$loop->last ? ', ' : '' }}</span>
            @endforeach
        </p>
    @endif

    <a href="/jobs">Back to all jobs</a>
</x-layout>
