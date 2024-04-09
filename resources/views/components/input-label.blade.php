@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-text dark:text-d-text']) }}>
    {{ $value ?? $slot }}
</label>
