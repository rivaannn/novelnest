<a
    {{ $attributes->merge(['class' => 'px-3.5 w-full h-9 mt-4 items-center justify-center rounded-full inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-medium text-xs text-white uppercase tracking-widest hover:bg-blue-500 active:bg-blue-200 focus:outline-none focus:ring-2 focus:ring-blue-200 focus-visible:ring-offset-2 focus:ring-offset-2 dark:focus:ring-offset-blue-600 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</a>
