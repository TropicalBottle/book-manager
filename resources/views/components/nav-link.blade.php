@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-2 border-secondary dark:border-d-secondary text-sm font-medium leading-5 text-text dark:text-d-text focus:outline-none focus:border-secondary transition duration-150 ease-in-out'
            : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-background dark:text-d-text hover:text-accent dark:hover:text-d-accent focus:outline-none focus:text-background dark:focus:text-d-background focus:border-secondary dark:focus:border-d-secondary transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
