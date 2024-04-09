<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-secondary dark:bg-d-secondary border border-transparent rounded-md font-semibold text-xs text-text dark:text-d-text uppercase tracking-widest hover:bg-accent dark:hover:bg-d-accent focus:outline-none focus:ring-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
