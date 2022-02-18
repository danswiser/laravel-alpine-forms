<div
    x-data="{ value: '{{ old($name) }}'}"
    class="hidden"
    {{ $attributes->whereDoesntStartWith('x-') }}>

    <input type="hidden" name="{{ $name }}" value="{{ $value }}" {{ $attributes->whereStartsWith('x-') }} />
</div>
