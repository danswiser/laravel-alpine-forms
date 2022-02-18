<div
    x-data="{
        value: '{{ old($name) }}',
        options: {{ $options->toJson() }},
        multiselect: true,
        get filteredOptions() {
            return this
                    .options
                    .sort((a,b) => (a.name > b.name) ? 1 : ((b.name > a.name) ? -1 : 0))
                    {{-- .filter(option => !this.selected.includes(option)) --}}
                    .filter(option => option.name.toLowerCase().includes(this.query.toLowerCase()))
        },
        query: '',
        searching: false,
        selected: [],
        errors: {{ json_encode($errors->get($name)) }},
        select(option) {
            if(this.miltiselect) {
                this.selected.push(option)
                this.store()
                //
            } else {
                this.searching = false
                this.selected = [option]
                this.store()
            }
        },
        store() {
            this.value = this.selected.map(selection => selection.{{ config('alpine-forms.select.option.value') }})
        }

    }"
    {{ $attributes->whereDoesntStartWith('x-')->merge(['class' => 'my-4']) }}>
    <label for="{{ $name }}" class="block text-sm font-medium text-gray-700">{{ $label }}</label>
    <div class="mt-1 relative">
        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
            <!-- Heroicon name: solid/mail -->
            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
            </svg>
        </div>
        <x-input-hidden name="{{ $name }}" x-model="value" />
        <input
            x-model="query"
            x-on:click="searching=true"
            type="text" placeholder="Type to search"
            class="bg-white relative w-full border border-gray-300 rounded-md shadow-sm pl-3 pr-10 py-2 text-left cursor-default focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        {{-- <button type="button" class="bg-white relative w-full border border-gray-300 rounded-md shadow-sm pl-3 pr-10 py-2 text-left cursor-default focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
            aria-haspopup="listbox" aria-expanded="true" aria-labelledby="listbox-label">
            <span class="block truncate"> Tom Cook </span>
            <span class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                <!-- Heroicon name: solid/selector -->
                <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd"
                        d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                        clip-rule="evenodd" />
                </svg>
            </span>
        </button> --}}
        <ul x-show="searching"
            x-transition:leave="transition ease-in duration-100"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            x-on:click.outside="searching=false"
            class="absolute z-10 mt-1 w-full bg-white shadow-lg max-h-60 rounded-md py-1 text-base ring-1 ring-black ring-opacity-5 overflow-auto focus:outline-none sm:text-sm"
            tabindex="-1" role="listbox">
            <!--
          Select option, manage highlight styles based on mouseenter/mouseleave and keyboard navigation.
  
          Highlighted: "text-white bg-indigo-600", Not Highlighted: "text-gray-900"
        -->
            <template x-for="option in filteredOptions">
                <li x-on:click="select(option)"
                    class="text-gray-900 select-none relative py-2 pl-3 pr-9 cursor-pointer" role="option">
                    <!-- Selected: "font-semibold", Not Selected: "font-normal" -->
                    <span x-text="option.{{ config('alpine-forms.select.option.label') }}" class="font-normal block truncate"> Option </span>

                    <!--
                Checkmark, only display for selected option.
      
                Highlighted: "text-white", Not Highlighted: "text-indigo-600"
              -->
                    <span
                        x-show="selected.includes(option)"
                        class="text-indigo-600 absolute inset-y-0 right-0 flex items-center pr-4">
                        <!-- Heroicon name: solid/check -->
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                    </span>
                </li>
            </template>

            <li x-show="filteredOptions.length == 0" class="text-gray-900 cursor-default select-none relative py-2 pl-3 pr-9" role="option">
                <span class="font-normal block truncate">No results. Try a new term.</span>
            </li>
        </ul>
    </div>
</div>
