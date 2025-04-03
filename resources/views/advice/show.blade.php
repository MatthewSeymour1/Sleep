<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight bg-gray-800 rounded-md">
            {{ __('Advice of the Day') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-900">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-bold text-gray-200">{{ $advice->advice_title }}</h3>
                <p class="mt-2 text-gray-400">{{ $advice->description }}</p>

                <a href="{{ route('advice.show', ['random' => true]) }}" class="mt-4 inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                    Randomize Advice
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
