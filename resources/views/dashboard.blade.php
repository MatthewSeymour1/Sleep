<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
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

            <div id="noLogsMessage" style="display: none" class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="font-semibold text-lg mb-4">Your Sleep Logs</h3>
                    <p class="text-gray-600">You haven't logged any sleep yet <a href="http://127.0.0.1:8000/sleep-log/create" class="text-blue-500">Add one?</a></p>
                </div>
            </div>

            <!-- Type dropdown -->
            <select id="myTypeDropdown">
                <option value="amountOfSleep">Amount of Sleep</option>
                <option value="qualityOfSleep">Quality of Sleep</option>
            </select>
            <!-- Time dropdown -->
            <select id="myTimeDropdown">
                <option value="perDay">perDay</option>
                <option value="perWeek">perWeek</option>
                <option value="perMonth">perMonth</option>
            </select>
            
            <div id="chartContainer" class="w-full h-[650px]">
                <canvas id="myChart" class="w-full h-full"></canvas>
            </div>
            <script>
                // Pass PHP data to JavaScript
                window.sleepLogs = @json($sleepLogs);
            </script>
        </div>


        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="{{ asset('graphes.js') }}"></script>
    </div>
</x-app-layout>
