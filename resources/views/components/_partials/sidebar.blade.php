<aside id="sidebar"
    x-data="{
        isActive(path) {
            return $store.nav.currentPath === path || $store.nav.currentPath.startsWith(path + '/');
        },
        getActiveClasses(path) {
            return this.isActive(path)
                ? 'flex items-center p-2 text-base text-white bg-blue-600 rounded-lg group dark:bg-blue-600 shadow-md'
                : 'flex items-center p-2 text-base text-gray-900 rounded-lg hover:bg-gray-100 group dark:text-gray-200 dark:hover:bg-gray-700 transition-colors duration-200';
        },
        getIconClasses(path) {
            return this.isActive(path)
                ? 'w-6 h-6 text-white'
                : 'w-6 h-6 text-gray-800 dark:text-white';
        }
    }"
    x-cloak
    class="fixed top-0 left-0 z-20 flex flex-col flex-shrink-0 hidden w-64 h-full pt-16 font-normal duration-75 lg:flex transition-width"
    aria-label="Sidebar">

    <div class="relative flex flex-col flex-1 min-h-0 pt-0 bg-white border-r border-gray-200 dark:bg-gray-800 dark:border-gray-700">
        <div class="flex flex-col flex-1 pt-5 pb-4 overflow-y-auto">
            <div class="flex-1 px-3 space-y-1 bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                <ul class="pb-2 space-y-2">

                    {{-- Dashboard --}}
                    <li>
                        <a href="{{ route('dashboard') }}" wire:navigate :class="getActiveClasses('/dashboard')">
                            <svg :class="getIconClasses('/dashboard')" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M10 6.025A7.5 7.5 0 1 0 17.975 14H10V6.025Z" />
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M13.5 3c-.169 0-.334.014-.5.025V11h7.975c.011-.166.025-.331.025-.5A7.5 7.5 0 0 0 13.5 3Z" />
                            </svg>
                            <span class="ml-3" :class="isActive('/dashboard') ? 'text-white font-medium' : ''">Dashboard</span>
                        </a>
                    </li>

                    {{-- Interface/PMS --}}
                    <li>
                        <a href="{{ route('list-pms') }}" wire:navigate :class="getActiveClasses('/interface')">
                            <svg :class="getIconClasses('/interface')" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M13.213 9.787a3.391 3.391 0 0 0-4.795 0l-3.425 3.426a3.39 3.39 0 0 0 4.795 4.794l.321-.304m-.321-4.49a3.39 3.39 0 0 0 4.795 0l3.424-3.426a3.39 3.39 0 0 0-4.794-4.795l-1.028.961" />
                            </svg>
                            <span class="ml-3" :class="isActive('/interface') ? 'text-white font-medium' : ''">Interface</span>
                        </a>
                    </li>

                    {{-- Customer --}}
                    <li>
                        <a href="{{ route('list-customer') }}" wire:navigate :class="getActiveClasses('/customer')">
                            <svg :class="getIconClasses('/customer')" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M5 12a1 1 0 0 0-1 1v4a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1M5 12h14M5 12a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v4a1 1 0 0 1-1 1m-2 3h.01M14 15h.01M17 9h.01M14 9h.01" />
                            </svg>
                            <span class="ml-3" :class="isActive('/customer') ? 'text-white font-medium' : ''">Customer</span>
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </div>
</aside>
