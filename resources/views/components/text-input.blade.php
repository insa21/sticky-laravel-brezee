@props(['disabled' => false])

<input {{ $disabled ? '$disabled' : '' }} {!! $attributes->merge(['class' => 'w-full border-zinc-800 focus:outline-none bg-zinc-950 rounded-md shadow-sm']) !!}>
