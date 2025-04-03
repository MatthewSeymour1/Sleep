<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight bg-gray-800 rounded-md p-4">
            {{ __('Edit Sleep Log') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-900">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-200">
                    <h3 class="font-semibold text-lg text-gray-200 mb-4">Edit Sleep Log</h3>

                    <x-sleep-log-form
                        :action="route('sleep-log.update', $sleepLog)"
                        :method="'PATCH'"
                        :sleepLog="$sleepLog"
                    />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
