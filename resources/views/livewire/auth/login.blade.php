<div>
    <div
        class="h-screen flex flex-col items-center justify-center px-6 pt-8 mx-auto md:h-screen pt:mt-0 dark:bg-gray-900">
        <!-- Card -->
        <div class="w-full max-w-md p-6 space-y-8 sm:p-8 bg-white rounded-lg shadow dark:bg-gray-800">
            <a href="#"
                class="flex items-center justify-center mb-8 text-2xl font-semibold lg:mb-10 dark:text-white">
                <img src="{{ asset('vistalab.png') }}" class="mr-4 h-11"
                    alt="vistalab Logo">
                <span>{{ config('app.name') }}</span>
            </a>

            <form class="mt-6 space-y-6" wire:submit="login">
                <div>
                    <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                        username</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z" />
                            </svg>
                        </div>
                        <input type="text" id="username" wire:model="username"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="username">
                    </div>
                    @error('username')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                        password</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 20">
                                <path
                                    d="M14 7h-1V4a5 5 0 1 0-10 0v3H2a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2ZM5 4a3 3 0 1 1 6 0v3H5V4Z" />
                            </svg>
                        </div>
                        <input type="password" id="password" wire:model="password" placeholder="••••••••"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                    @error('password')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-start">
                    <div class="flex items-center h-5">
                        <input id="remember" type="checkbox" wire:model="remember"
                            class="w-4 h-4 border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:bg-gray-700 dark:border-gray-600">
                    </div>
                    <div class="ml-3 text-sm">
                        <label for="remember" class="font-medium text-gray-900 dark:text-white">Remember me</label>
                    </div>
                    <a href="#" class="ml-auto text-sm text-blue-700 hover:underline dark:text-blue-500">Lost
                        Password?</a>
                </div>

                <button type="submit"
                    class="w-full px-5 py-3 text-base font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                    wire:loading.attr="disabled">
                    <span wire:loading.remove>Log In</span>
                    <span wire:loading>
                        <svg class="inline w-4 h-4 mr-3 text-white animate-spin" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 3V1m0 18v-2M5.05 5.05L3.64 3.64m12.72 12.72l-1.41-1.41M3 10H1m18 0h-2M5.05 14.95l-1.41 1.41m12.72-12.72l-1.41 1.41" />
                        </svg>
                        Logging in...
                    </span>
                </button>

                <div class="text-sm font-medium text-gray-500 dark:text-gray-400 text-center">
                    &copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
                </div>
            </form>
        </div>
    </div>
</div>
