<x-layout>
    <h1>Job Listings</h1>
    <ul>
        @foreach ($jobs as $job)
            <li>
                <a href="/jobs/{{ $job->id }}">
                    <strong>{{ $job->title }}</strong> - ${{ $job->salary }}
                    <br>
                    <small>Employer: {{ $job->employer->name }}</small>
                </a>
            </li>
        @endforeach
    </ul>
</x-layout>
