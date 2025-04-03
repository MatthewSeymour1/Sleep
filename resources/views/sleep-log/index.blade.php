<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight bg-gray-800 rounded-md">
            {{ __('Your Sleep Logs') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-900">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            {{-- Flash Message --}}
            @if (session('success'))
                <div class="bg-green-900 border-l-4 border-green-600 text-green-200 p-4 rounded-md mb-4 shadow-md">
                    <p class="font-bold">Success!</p>
                    <p>{{ session('success') }}</p>
                </div>
            @endif

            <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-200">
                    
                    @if ($sleepLogs->isEmpty())
                        <p class="text-gray-400">No sleep logs found. <a href="{{ route('sleep-log.create') }}" class="text-blue-400">Add one?</a></p>
                    @else
                        <table class="w-full border-collapse border border-gray-700">
                            <thead>
                                <tr class="bg-gray-700">
                                    <th class="border border-gray-600 px-4 py-2 text-white text-center">Start Date</th>
                                    <th class="border border-gray-600 px-4 py-2 text-white text-center">End Date</th>
                                    <th class="border border-gray-600 px-4 py-2 text-white text-center">Start Time</th>
                                    <th class="border border-gray-600 px-4 py-2 text-white text-center">End Time</th>
                                    <th class="border border-gray-600 px-4 py-2 text-white text-center">Sleep Quality</th>
                                    <th class="border border-gray-600 px-4 py-2 text-white text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sleepLogs as $log)
                                    <tr class="border border-gray-700 bg-gray-800">
                                        <td class="border border-gray-600 px-4 py-2 text-center">{{ $log->start_date }}</td>
                                        <td class="border border-gray-600 px-4 py-2 text-center">{{ $log->end_date }}</td>
                                        <td class="border border-gray-600 px-4 py-2 text-center">{{ $log->start_time }}</td>
                                        <td class="border border-gray-600 px-4 py-2 text-center">{{ $log->end_time }}</td>
                                        <td class="border border-gray-600 px-4 py-2 text-center">{{ $log->sleep_quality }}/10</td>
                                        <td class="border border-gray-600 px-4 py-2 text-center">
                                            <a href="{{ route('sleep-log.edit', $log->id) }}" class="text-blue-400">Edit</a>
                                            <form action="{{ route('sleep-log.destroy', $log->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-400 ml-2" onclick="return confirm('Are you sure?')">Delete</button>
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
