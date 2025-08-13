<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Page Title' }}</title>
    <link href="{{ asset('vistalab.png') }}" rel="icon" type="image/x-icon">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="bg-gray-50 dark:bg-gray-800">

    @include('components._partials.navbar')

    <div class="flex pt-16 overflow-hidden bg-gray-50 dark:bg-gray-900">

        @include('components._partials.sidebar')

        <div class="fixed inset-0 z-10 hidden bg-gray-900/50 dark:bg-gray-900/90" id="sidebarBackdrop"></div>

        <div id="main-content" class="relative w-full h-full overflow-y-auto bg-gray-50 lg:ml-64 dark:bg-gray-900">
            <main>
                <div class="px-4 pt-6">
                    {{ $slot }}
                </div>
            </main>

            @include('components._partials.footer')

        </div>
    </div>

    @include('components._partials.scripts')
    @stack('script')

    @include('components.alerts')

    <script src="https://flowbite-admin-dashboard.vercel.app//app.bundle.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</body>

</html>
