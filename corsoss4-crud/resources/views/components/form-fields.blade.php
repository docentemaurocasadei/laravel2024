<!-- resources/views/components/form-fields.blade.php -->

@props(['name', 'label', 'value' => null])

@php
    $oldValue = old($name, $value);
    $error = $errors->first($name);
@endphp

<div class="form-group">
    <label for="{{ $name }}">{{ $label }}:</label>
    <input type="text" class="form-control @error($name) is-invalid @enderror" id="{{ $name }}" name="{{ $name }}" value="{{ $oldValue }}">
    @error($name)
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
