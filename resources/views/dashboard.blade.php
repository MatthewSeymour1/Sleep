<x-app-layout>
    <x-slot name="header">
            <h2 class="font-semibold text-xl text-white leading-tight">
                {{ __('Dashboard') }}
            </h2>
    </x-slot>

    <div class="py-12 bg-gray-900">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            {{-- Flash Message --}}
            @if (session('success'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-md mb-4 shadow-md dark:bg-green-900 dark:border-green-600 dark:text-green-200">
                    <p class="font-bold">Success!</p>
                    <p>{{ session('success') }}</p>
                </div>
            @endif

            <div id="noLogsMessage" style="display: none" class="bg-white overflow-hidden shadow-sm sm:rounded-lg dark:bg-gray-800 dark:text-gray-200">
                <div class="p-6 text-gray-900 dark:text-gray-300">
                    <h3 class="font-semibold text-lg mb-4">Your Sleep Logs</h3>
                    <p class="text-gray-600 dark:text-gray-400">You haven't logged any sleep yet <a href="http://127.0.0.1:8000/sleep-log/create" class="text-blue-500 dark:text-blue-400">Add one?</a></p>
                </div>
            </div>

            <div id="logsDropdown" class="pb-5">
                <!-- Type dropdown -->
                <select id="myTypeDropdown" class="bg-gray-700 text-white dark:bg-gray-900 dark:text-gray-300">
                    <option value="amountOfSleep">Amount of Sleep</option>
                    <option value="qualityOfSleep">Quality of Sleep</option>
                </select>
                <!-- Time dropdown -->
                <select id="myTimeDropdown" class="bg-gray-700 text-white dark:bg-gray-900 dark:text-gray-300">
                    <option value="perDay">perDay</option>
                    <option value="perWeek">perWeek</option>
                    <option value="perMonth">perMonth</option>
                </select>
                <!-- Type dropdown -->
                <select id="myGraphType" class="bg-gray-700 text-white dark:bg-gray-900 dark:text-gray-300">
                    <option value="line">Line</option>
                    <option value="bar">Bar</option>
                </select>
            </div>
            <div id="chartContainer" class="w-full h-[650px]">
                    <canvas id="myChart" class="w-full h-full"></canvas>
            </div>
            <script>
                //Pass PHP data to JavaScript
                window.sleepLogs = @json($sleepLogs);
            </script>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="{{ asset('graphes.js') }}"></script>
    </div>
</x-app-layout>
