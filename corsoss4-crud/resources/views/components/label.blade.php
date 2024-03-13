<!-- resources/views/components/form-fields.blade.php -->

@props(['name', 'label', 'value' => null])

@php
    $oldValue = old($name, $value);
    $error = $errors->first($name);
@endphp

<div class="form-group">
    <label>{{ $label }}: {{$value}}</label>
</div>
