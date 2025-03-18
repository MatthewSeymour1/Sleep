<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Your Sleep Logs') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            {{-- Flash Message --}}
            @if (session('success'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-md mb-4 shadow-md">
                    <p class="font-bold">Success!</p>
                    <p>{{ session('success') }}</p>
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <h3 class="font-semibold text-lg mb-4">Your Sleep Logs</h3>

                    @if ($sleepLogs->isEmpty())
                        <p class="text-gray-600">No sleep logs found. <a href="{{ route('sleep-log.create') }}" class="text-blue-500">Add one?</a></p>
                    @else
                        <table class="w-full border-collapse border border-gray-300">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="border border-gray-300 px-4 py-2">Start Date</th>
                                    <th class="border border-gray-300 px-4 py-2">End Date</th>
                                    <th class="border border-gray-300 px-4 py-2">Start Time</th>
                                    <th class="border border-gray-300 px-4 py-2">End Time</th>
                                    <th class="border border-gray-300 px-4 py-2">Sleep Quality</th>
                                    <th class="border border-gray-300 px-4 py-2">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sleepLogs as $log)
                                    <tr class="border border-gray-300">
                                        <td class="border border-gray-300 px-4 py-2">{{ $log->start_date }}</td>
                                        <td class="border border-gray-300 px-4 py-2">{{ $log->end_date }}</td>
                                        <td class="border border-gray-300 px-4 py-2">{{ $log->start_time }}</td>
                                        <td class="border border-gray-300 px-4 py-2">{{ $log->end_time }}</td>
                                        <td class="border border-gray-300 px-4 py-2">{{ $log->sleep_quality }}/10</td>
                                        <td class="border border-gray-300 px-4 py-2">
                                        <a href="{{ route('sleep-log.edit', $log->id) }}" class="text-blue-500">Edit</a>
                                        <form action="{{ route('sleep-log.destroy', $log->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 ml-2" onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
