{{-- alert success --}}
@if (session('success'))
    <div id="toast-interactive" x-cloak x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show" x-transition
        class="fixed top-5 right-5 z-50 w-full max-w-xs p-4 text-gray-900 bg-green-100 rounded-lg shadow-sm dark:bg-green-900 dark:text-white"
        role="alert">

        <div class="flex items-start">
            <div
                class="inline-flex items-center justify-center shrink-0 w-8 h-8 text-green-700 bg-green-200 rounded-lg dark:text-green-300 dark:bg-green-800">
                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                <span class="sr-only">Check icon</span>
            </div>

            <div class="ms-3 text-sm font-normal">
                <span class="mb-1 text-sm font-semibold text-green-800 dark:text-green-300">Success</span>
                <div class="text-sm font-normal">{{ session('success') }}</div>
            </div>

            <button type="button"
                class="ms-auto -mx-1.5 -my-1.5 bg-transparent text-gray-500 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 dark:text-gray-300 dark:hover:text-white dark:hover:bg-gray-700"
                @click="show = false" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
            </button>
        </div>
    </div>
@endif

{{-- alert delete --}}
<div id="toast-interactive" x-data="{ show: false, message: '', type: '' }"
    x-on:show-alert.window="
        message = $event.detail.message;
        type = $event.detail.type || 'success';
        show = true;
        setTimeout(() => show = false, 3000);
    "
    x-show="show" x-cloak x-transition
    x-bind:class="{
        'bg-green-100 dark:bg-green-900 text-gray-900 dark:text-white': type === 'success',
        'bg-red-100 dark:bg-red-900 text-gray-900 dark:text-white': type === 'danger',
        'bg-yellow-100 dark:bg-yellow-900 text-gray-900 dark:text-white': type === 'warning',
        'bg-blue-100 dark:bg-blue-900 text-gray-900 dark:text-white': type === 'info'
    }"
    class="fixed top-5 right-5 z-50 w-full max-w-xs p-4 rounded-lg shadow-sm"
    role="alert">

    <div class="flex items-start">
        <!-- Dynamic Icon -->
        <div class="inline-flex items-center justify-center shrink-0 w-8 h-8 rounded-lg"
            x-bind:class="{
                'text-green-700 bg-green-200 dark:text-green-300 dark:bg-green-800': type === 'success',
                'text-red-700 bg-red-200 dark:text-red-300 dark:bg-red-800': type === 'danger',
                'text-yellow-700 bg-yellow-200 dark:text-yellow-300 dark:bg-yellow-800': type === 'warning',
                'text-blue-700 bg-blue-200 dark:text-blue-300 dark:bg-blue-800': type === 'info'
            }">
            <template x-if="type === 'success'">
                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
            </template>
            <template x-if="type === 'danger'">
                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </template>
            <template x-if="type === 'warning'">
                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 9v2m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </template>
            <template x-if="type === 'info'">
                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </template>
            <span class="sr-only">Alert icon</span>
        </div>

        <!-- Text -->
        <div class="ms-3 text-sm font-normal">
            <span class="mb-1 text-sm font-semibold"
                x-bind:class="{
                    'text-green-800 dark:text-green-300': type === 'success',
                    'text-red-800 dark:text-red-300': type === 'danger',
                    'text-yellow-800 dark:text-yellow-300': type === 'warning',
                    'text-blue-800 dark:text-blue-300': type === 'info'
                }"
                x-text="type === 'success' ? 'Success' : type === 'danger' ? 'Error' : type === 'warning' ? 'Warning' : 'Info'">
            </span>
            <div class="text-sm font-normal" x-text="message"></div>
        </div>

        <!-- Close Button -->
        <button type="button"
            class="ms-auto -mx-1.5 -my-1.5 bg-transparent text-gray-500 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 dark:text-gray-300 dark:hover:text-white dark:hover:bg-gray-700"
            @click="show = false" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
        </button>
    </div>
</div>
