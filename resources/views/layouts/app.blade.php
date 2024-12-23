<!DOCTYPE html>
<html>

<head>
    <title>Task List App</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="//unpkg.com/alpinejs" defer></script>

    {{-- blade-formatter-disable --}}
    <style type="text/tailwindcss">
        .btn {
            @apply rounded-md px-2 py-1 text-center font-medium shadow-sm ring-1 ring-slate-700/10 hover:bg-slate-50 text-slate-700
        }

        .link {
            @apply font-medium text-gray-700 underline decoration-pink-500
        }

        label {
            @apply block uppercase text-slate-700 mb-2
        }

        input, textarea {
            @apply shadow-sm appearance-none border w-full px-3 py-2 text-slate-700 leading-tight focus:outline-none
        }

        .error {
            @apply text-sm text-red-500
        }

        .success-message {
            @apply relative rounded border border-green-500 text-green-700 bg-green-100 px-4 py-3
        }
    </style>
    {{-- blade-formatter-enable --}}
</head>

<body class="container mx-auto mt-10 mb-10 max-w-lg">
    <h1 class="text-2xl mb-4">@yield('title')</h1>

    @if (session()->has('success'))
        <div x-data="{ flash: true }">
            <div x-show="flash">
                <div class="mb-4 relative success-message" role="alert">

                    <div><strong class="font-bold">Success!</strong></div>
                    <div>{{ session('success') }}</div>


                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            @click="flash = false" stroke="currentColor" class="h-6 w-6 cursor-pointer">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </span>
                </div>
            </div>
        </div>
    @endif

    <div class="mb-4">
        @yield('content')
    </div>
</body>

</html>
