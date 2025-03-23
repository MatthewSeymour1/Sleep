<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Advice of the Day') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-bold">{{ $advice->title }}</h3>
                <p class="mt-2 text-gray-600">{{ $advice->description }}</p>

                
<a href="{{ route('advice.show', ['random' => true]) }}" class="mt-4 inline-block px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-700">
    Randomize Advice
</a>


            </div>
        </div>
    </div>
</x-app-layout>
