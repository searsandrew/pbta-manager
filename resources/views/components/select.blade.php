<div class="col-auto mb-3">
    <label class="block font-medium text-sm text-gray-700" }}>{{ $label }}</label>
    <select {{ $attributes->merge(['class' => 'border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full']) }} name="{{ $name }}">
        @foreach($datasource as $key => $option)
            <option 
                value="{{ $key }}"
                @if($value == $key)
                    selected="selected"
                @endif
            >{{ $option }}</option>
        @endforeach
    </select>

    @if($help)
        <small class="p-l3 text-gray-500 italic">{{ $help }}</small>
    @endif
    @error($name)
        <p class="text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>