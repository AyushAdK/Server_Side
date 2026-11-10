<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My First Project</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-900 min-h-screen">

    <nav class="bg-white shadow mb-6">
        <div class="max-w-4xl mx-auto px-4 py-3 flex gap-4">
            <x-nav-link href="/">Home</x-nav-link>
            <x-nav-link href="/jobs">Jobs</x-nav-link>
            <x-nav-link href="/jobs/create">Post a Job</x-nav-link>
            <x-nav-link href="/about">About</x-nav-link>
            <x-nav-link href="/contact">Contact</x-nav-link>
        </div>
    </nav>

    <main class="max-w-4xl mx-auto px-4 py-4">
        {{ $slot }}
    </main>

    <footer class="max-w-4xl mx-auto px-4 py-6 mt-8 text-center text-gray-500 text-sm">
        &copy; {{ date('Y') }} My First Project. All rights reserved.
    </footer>

</body>
</html>
