<x-layout>
    <div class="bg-white p-6 rounded shadow max-w-xl mx-auto">
        <h1 class="text-3xl font-bold mb-6">Post a New Job</h1>

        <form method="POST" action="/jobs">
            @csrf

            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Job Title</label>
                <input type="text" name="title" id="title" value="{{ old('title') }}"
                       class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                       required>
                @error('title')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="salary" class="block text-sm font-medium text-gray-700 mb-1">Salary</label>
                <input type="text" name="salary" id="salary" value="{{ old('salary') }}"
                       class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                       required>
                @error('salary')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="employer_id" class="block text-sm font-medium text-gray-700 mb-1">Employer</label>
                <select name="employer_id" id="employer_id"
                        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                    <option value="">Select an employer</option>
                    @foreach($employers as $employer)
                        <option value="{{ $employer->id }}" {{ old('employer_id') == $employer->id ? 'selected' : '' }}>
                            {{ $employer->name }}
                        </option>
                    @endforeach
                </select>
                @error('employer_id')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex gap-4">
                <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">
                    Create Job
                </button>
                <a href="/jobs" class="bg-gray-300 text-gray-700 px-4 py-2 rounded hover:bg-gray-400">Cancel</a>
            </div>
        </form>
    </div>
</x-layout>
