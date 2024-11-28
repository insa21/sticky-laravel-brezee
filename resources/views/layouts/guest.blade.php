{{--<div class="font-sans text-gray-900 antialiased">--}}
{{--    {{ $slot }}--}}
{{--</div>--}}

<body class="font-sans antialiased">
<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-zinc-950">
    <div>
        <a href="/">
            <x-application-logo class="w-20 h-20 fill-current text-white" />
        </a>
    </div>

    <div class="bg-zinc-900 w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        {{ $slot }}
    </div>
</div>
</body>
