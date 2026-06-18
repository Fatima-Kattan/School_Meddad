{{-- @props([
    'label' =>'',
    'name' => '',
    'options' => [],
    'selected',
])

<label for="{{ $name }}">{{ $label }}</label>
<select name="{{ $name }}" id="{{ $name }}" class="form-control
    @error($name) is-invalid @enderror">
    <option value="">select an option</option>
    @foreach ($options as $key => $value)
        <option value="{{ $key }}"
        @if ($key == old($name, $selected))
            selected
        @endif>
            {{ $value }}
        </option>
    @endforeach
</select>
@error($name)
    <p class="text-danger">{{ $message }}</p>
@enderror --}}

@props([
    'label' => '',
    'name' => '',
    'options' => [],
    'selected' => '',
    'required' => false,
])

<div class="mb-3">
    @if($label)
        <label for="{{ $name }}" class="form-label">
            {{ $label }}
            @if($required)
                <span class="text-danger">*</span>
            @endif
        </label>
    @endif
    <select 
        name="{{ $name }}" 
        id="{{ $name }}" 
        class="form-select @error($name) is-invalid @enderror"
        @if($required) required @endif
    >
        <option value="">Select an option</option>
        @foreach ($options as $key => $value)
            <option value="{{ $key }}" {{ old($name, $selected) == $key ? 'selected' : '' }}>
                {{ $value }}
            </option>
        @endforeach
    </select>
    @error($name)
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>