<button {{ $attributes->merge(['type' => 'submit', 'class' => 'focus:outline-none text-black bg-yellow-400 hover:bg-yellow-500 inline-flex items-center px-4 py-2 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-yellow-900']) }}>
    {{ $slot }}
</button>