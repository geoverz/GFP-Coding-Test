<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Open GitHub Issues') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
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

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- Filtering & Sorting Form -->
                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                        {{ __('Filters') }}
                    </h2>
                    <form method="GET" action="{{ route('issues.index') }}" class="mb-6 flex flex-wrap gap-4">
                        <select name="repository" class="border p-3 text-gray-600 rounded" onchange="this.form.submit()">
                            <option value="">All Repositories</option>
                            @foreach($repositories as $repo)
                                <option value="{{ $repo }}" {{ $repository === $repo ? 'selected' : '' }}>{{ $repo }}</option>
                            @endforeach
                        </select>

                        <select name="sort" class="border p-3 rounded text-gray-600 " onchange="this.form.submit()">
                            <option value="desc" {{ $sort === 'desc' ? 'selected' : '' }}>Newest First</option>
                            <option value="asc" {{ $sort === 'asc' ? 'selected' : '' }}>Oldest First</option>
                        </select>
                    </form>
                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                        {{ __("Listed below are your open issues.") }}
                    </p>
                    <ul class="space-y-3">
                        @foreach($issues as $issue)
                            <li class="p-4 bg-gray-100 hover:bg-gray-200 transition rounded-lg">
                                <a href="{{ route('issues.show', ['owner' => $issue['repository']['owner']['login'], 'repo' => $issue['repository']['name'], 'id' => $issue['number']]) }}"
                                   class="text-blue-600 hover:underline font-medium">
                                    #{{ $issue['number'] }} - {{ $issue['title'] }}
                                </a>
                                <p class="text-sm text-gray-600">Created: {{ \Carbon\Carbon::parse($issue['created_at'])->format('M d, Y') }}</p>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
