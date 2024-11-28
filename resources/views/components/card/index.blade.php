<div {{ $attributes->merge([
    'class'=> 'bg-zinc-900 border border-zinc-800 shadow-sm border border-zinc-200 rounded-lg'
    ]) }}>
    {{ $slot }}
</div>
