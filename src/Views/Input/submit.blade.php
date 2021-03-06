<div {{ $attributes->whereDoesntStartWith('x-')->merge(['class' => 'flex justify-end']) }}>
    <a href="{{ url()->previous() }}"
        class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
        Cancel
    </a>
    <button
        {{ $attributes->whereStartsWith('x-') }}
        type="submit"
        class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
        Save
    </button>
</div>
