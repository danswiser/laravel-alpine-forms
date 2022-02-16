<div
    x-data="{
        value: Number({{ old($name, 0) }}),
        min: Number('{{ $min }}'),
        max: Number('{{ $max }}'),
        step: Number('{{ $step }}') || 1,
        errors: {{ json_encode($errors->get($name)) }},
        reduce() {
            if(isNaN(this.min) || this.value - this.step >= this.min) {
                return this.value -= this.step
            }
            return this.value = this.min
        },
        increase() {
            if(isNaN(this.max) || this.value + this.step <= this.max) {
                return this.value += this.step
            }
            return this.value = this.max
        }
    }"
    {{ $attributes->whereDoesntStartWith('x-')->merge(['class' => 'my-4']) }}>
    <label for="{{ $name }}" class="block text-sm font-medium text-gray-700">{{ $label }}</label>
    <div class="mt-1 flex rounded-md shadow-sm">
        <button type="button" x-on:click="reduce()" class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 sm:text-sm cursor-pointer"> - </button>
        <input
            x-model.number="value"
            {{ $attributes->whereStartsWith('x-') }}
            name="{{ $name }}"
            type="number"
            pattern="[0-9]*"
            min="{{ $min }}" max="{{ $max }}" step="{{ $step }}"
            inputmode="numeric"
            class="flex-1 min-w-0 block w-full px-3 py-2 rounded-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 text-center">
        <button type="button" x-on:click="increase()" class="inline-flex items-center px-3 rounded-r-md border border-l-0 border-gray-300 bg-gray-50 text-gray-500 sm:text-sm cursor-pointer"> + </button>
    </div>
</div>
