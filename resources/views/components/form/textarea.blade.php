@props([
    'id' => '',
    'label' => '',
    'name' => '',
    'value' => '',
    'placeholder' => '',
    'rows' => '3',
    'required' => false,
])

<div class="mb-3">
    @if($label)
        <label for="{{ $id ?? $name }}" class="form-label">
            {{ $label }}
            @if($required)
                <span class="text-danger">*</span>
            @endif
        </label>
    @endif
    <textarea 
        id="{{ $id ?? $name }}"
        class="form-control @error($name) is-invalid @enderror"
        name="{{ $name }}" 
        placeholder="{{ $placeholder }}"
        rows="{{ $rows }}"
        @if($required) required @endif
    >{{ old($name, $value) }}</textarea>
    @error($name)
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>