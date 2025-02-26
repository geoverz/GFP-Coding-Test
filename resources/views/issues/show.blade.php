<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Issue #{{ $issue['number'] }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            @if ($errors->any())
                <div class="alert alert-danger">
                    There were some errors with your request.
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

                <div class="mx-auto bg-white shadow-md rounded-lg p-6">
                    <h2 class="text-3xl tex text-gray-700 font-semibold">{{ $issue['title'] }}</h2>
                    <p class="text-gray-500 text-sm mb-4">Created: {{ \Carbon\Carbon::parse($issue['created_at'])->format('M d, Y') }}</p>

                    <div class="prose prose-sm ">{!! $issue['body'] !!}</div> <!-- Render Markdown with better styling -->

                    <a href="{{ route('issues.index') }}" class="mt-6 inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                        ← Back to Issues
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
