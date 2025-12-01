{{-- Updated typography and dark mode contrast --}}
@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-semibold text-sm text-slate-700 dark:text-slate-200 mb-2']) }}>
    {{ $value ?? $slot }}
</label>
