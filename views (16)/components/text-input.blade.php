{{-- Enhanced with modern styling and better focus states --}}
@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'block w-full px-3.5 py-2.5 border border-slate-300 dark:border-slate-600 dark:bg-slate-800 dark:text-slate-100 rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:focus:border-blue-400 dark:focus:ring-blue-400 focus:ring-1 shadow-sm placeholder-slate-400 dark:placeholder-slate-500 transition duration-150']) }}>
