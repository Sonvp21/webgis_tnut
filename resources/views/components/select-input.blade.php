@props(['label', 'name', 'placeholder', 'value', 'options', 'type' => 'text'])

<label class="form-control">
    <div class="label">
        <span class="text-sm font-medium text-gray-700">{{ $label }}</span>
    </div>
    
    @if ($type === 'select')
        <select name="{{ $name }}" class="input input-bordered w-full @error($name) border-red-500 @enderror">
            <option value="">{{ __('Lựa chọn') }}</option>
            @foreach ($options as $option)
                <option value="{{ $option }}" {{ old($name, $value) == $option ? 'selected' : '' }}>
                    {{ $option }}
                </option>
            @endforeach
        </select>
    @else
        <input type="{{ $type }}" name="{{ $name }}" value="{{ old($name, $value) }}"
            class="input input-bordered w-full @error($name) border-red-500 @enderror" />
    @endif

    @error($name)
        <small class="text-red-500 text-left">{{ $message }}</small>
    @enderror
</label>
