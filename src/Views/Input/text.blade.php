<div
    x-data="{ value: '{{ old($name) }}', errors: {{ json_encode($errors->get($name)) }} }"
    {{ $attributes->whereDoesntStartWith('x-')->merge(['class' => 'col-span-2 mt-6']) }}>
    <div class="flex justify-between">
        <label for="{{ $name }}" class="block text-sm font-medium text-gray-700">{{ $label }}</label>
        <span class="text-sm text-gray-500"></span>
    </div>
    <div class="mt-1">
        <input
            type="text"
            name="{{ $name }}"
            class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
            placeholder="{{ $placeholder }}"
            {{ $attributes->whereStartsWith('x-') }}
            x-bind:class="{'border-6 border-red-300 text-red-900 placeholder-red-300 focus:ring-red-500 focus:border-red-500': Object.keys(errors).length > 0}" />
        <p x-show="Object.keys(errors).length > 0" class="mt-2">
        <ul>
            <template x-for="error in errors">
                <li x-text="error" class="text-sm text-red-600"></li>
            </template>
        </ul>
        </p>
    </div>
</div>
