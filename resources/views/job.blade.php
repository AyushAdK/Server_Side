<x-layout>
    <h1>{{ $job->title }}</h1>
    <p><strong>Salary:</strong> ${{ $job->salary }}</p>
    <a href="/jobs">Back to all jobs</a>
</x-layout>
