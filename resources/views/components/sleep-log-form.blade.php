@props(['action', 'method', 'sleepLog' => null])

<form action="{{ $action }}" method="POST">
    @csrf
    @if($method === 'PUT' || $method === 'PATCH')
        @method($method)
    @endif

    <div class="mb-4">
        <label for="start_date" class="block text-sm text-gray-800">Start Date</label>
        <input
            type="date"
            name="start_date"
            id="start_date"
            value="{{ old('start_date', $sleepLog->start_date ?? '') }}"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm bg-white text-gray-800" />
        @error('start_date')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="end_date" class="block text-sm text-gray-800">End Date</label>
        <input
            type="date"
            name="end_date"
            id="end_date"
            value="{{ old('end_date', $sleepLog->end_date ?? '') }}"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm bg-white text-gray-800" />
        @error('end_date')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="start_time" class="block text-sm text-gray-800">Start Time</label>
        <input
            type="time"
            name="start_time"
            id="start_time"
            value="{{ old('start_time', $sleepLog->start_time ?? '') }}"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm bg-white text-gray-800" />
        @error('start_time')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="end_time" class="block text-sm text-gray-800">End Time</label>
        <input
            type="time"
            name="end_time"
            id="end_time"
            value="{{ old('end_time', $sleepLog->end_time ?? '') }}"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm bg-white text-gray-800" />
        @error('end_time')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="sleep_quality" class="block text-sm text-gray-800">Sleep Quality (0-10)</label>
        <input
            type="number"
            name="sleep_quality"
            id="sleep_quality"
            min="0"
            max="10"
            value="{{ old('sleep_quality', $sleepLog->sleep_quality ?? '') }}"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm bg-white text-gray-800" />
        @error('sleep_quality')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <x-primary-button class="bg-blue-500 hover:bg-blue-600 text-white">
            {{ isset($sleepLog) ? 'Update Sleep Log' : 'Add Sleep Log' }}
        </x-primary-button>

        <a href="{{ route('dashboard') }}" class="text-gray-800 bg-gray-300 hover:bg-gray-400 font-bold py-2 px-4 rounded">
            Cancel
        </a>
    </div>
</form>
