@props(['label', 'name', 'placeholder', 'value', 'type' => 'text'])

<label class="form-control">
    <div class="label">
        <span class="text-sm font-medium text-gray-700">{{ $label }}</span>
    </div>
    @if ($type === 'textarea')
        <textarea name="{{ $name }}" placeholder="{{ $placeholder }}" class="textarea textarea-bordered 
        {{ $errors->has($name) ? 'input-error' : '' }}">{{ old($name, $value) }}</textarea>
    @else
        <input type="{{ $type }}" name="{{ $name }}"
               placeholder="{{ $placeholder }}"
               value="{{ old($name, $value) }}"
               class="input input-bordered w-full {{ $errors->has($name) ? 'input-error' : '' }}" />
    @endif
    @error($name)
        <small class="text-red-500 text-left">{{ $message }}</small>
    @enderror
</label>
