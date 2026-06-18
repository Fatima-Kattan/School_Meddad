{{-- @props([
'id',
'label',
'name',
'type' => 'text',
'value' => '',
'placeholder' => '',
])

<label for="{{ $id }}">{{ $label }}</label>
<input type="{{ $type }}" 
class="form-control
@error($name) 
is-invalid
@enderror"
name="{{ $name }}" value="{{ old($name, $value) }}" placeholder="{{ $placeholder }}">
@error($name)
    <div class="text-danger">{{ $message }}</div>
@enderror --}}
@props([
    'id' => '',
    'label' => '',
    'name' => '',
    'type' => 'text',
    'value' => '',
    'placeholder' => '',
])

@php
    $hasError = $errors->has($name);
@endphp

<div class="mb-3">
    @if($label)
        <label for="{{ $id ?? $name }}" class="form-label fw-semibold">
            {{ $label }}
           {{--  @if($required)
                <span class="text-danger">*</span>
            @endif --}}
        </label>
    @endif
    
    <input 
        type="{{ $type }}" 
        id="{{ $id ?? $name }}"
        class="form-control @error($name) is-invalid 
@enderror"
        
        name="{{ $name }}" 
        value="{{ old($name, $value) }}" 
        placeholder="{{ $placeholder }}"
        {{--   @if($required) required @endif --}}
        style="{{ $hasError ? 'border-color: #dc3545; background-color: #fff5f5;' : '' }}"
    >
    
    @error($name)
        <div style="color: #dc3545; font-size: 0.875rem; margin-top: 5px; display: flex; align-items: center; gap: 5px;">
            <i class="fas fa-exclamation-circle" style="font-size: 14px;"></i>
            <span>{{ $message }}</span>
        </div>
    @enderror
</div>