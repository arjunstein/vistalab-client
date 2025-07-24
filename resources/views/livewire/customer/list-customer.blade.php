<div>
    <div class="py-2">
        <div class="w-full mb-1">
            <div class="mb-4">
                <nav class="flex mb-5" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 text-sm font-medium md:space-x-2">
                        <li class="inline-flex items-center">
                            <a href="{{ route('dashboard') }}" wire:navigate
                                class="inline-flex items-center text-gray-700 hover:text-primary-600 dark:text-gray-300 dark:hover:text-white">
                                <svg class="w-5 h-5 mr-2.5" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                                    </path>
                                </svg>
                                Dashboard
                            </a>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="ml-1 text-gray-400 md:ml-2 dark:text-gray-500"
                                    aria-current="page">{{ $title ?? 'title page' }}</span>
                            </div>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 sm:p-6 dark:bg-gray-800">
        <!-- Card header -->
        <div class="mb-4">
            <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">{{ $title ?? 'title page' }}
            </h1>
        </div>
        <div class="items-center justify-between block sm:flex">
            <div class="flex items-center mb-4 sm:mb-0">
                <form class="sm:pr-3">
                    <label for="pms-search" class="sr-only">Search</label>
                    <div class="relative w-48 mt-1 sm:w-64 xl:w-96">
                        <input type="text" name="search" id="pms-search"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Search customer....">
                    </div>
                </form>
            </div>
            <a href="{{ route('add-customer') }}" wire:navigate
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 cursor-pointer"
                type="button">
                Add new
            </a>
        </div>

        <!-- Table -->
        <div class="flex flex-col mt-6">
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th class="px-4 py-2">#</th>
                            <th scope="col" class="px-4 py-2 text-gray-600 dark:text-gray-300">Customer</th>
                            <th scope="col" class="px-4 py-2 text-gray-600 dark:text-gray-300">Interface</th>
                            <th scope="col" class="px-4 py-2 text-gray-600 dark:text-gray-300">OS</th>
                            <th scope="col" class="px-4 py-2 text-gray-600 dark:text-gray-300">IP</th>
                            <th scope="col" class="px-4 py-2 text-gray-600 dark:text-gray-300">Megalos</th>
                            <th scope="col" class="px-4 py-2 text-gray-600 dark:text-gray-300">Server</th>
                            <th scope="col" class="px-4 py-2 text-gray-600 dark:text-gray-300">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($all_customer as $i=>$customer)
                            <tr
                                class="bg-white border-none dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600">
                                <td class="px-4 py-2">{{ $i + 1 }}</td>
                                <th scope="row"
                                    class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-gray-300">
                                    {{ $customer->customer_name }}
                                </th>
                                <td class="px-4 py-2 whitespace-nowrap">{{ $customer->pms->pms_name }}</td>
                                <td class="px-4 py-2 whitespace-nowrap">{{ $customer->os_server }}</td>
                                <td class="px-4 py-2">{{ $customer->ip_server }}</td>
                                <td class="px-4 py-2">{{ $customer->megalos }}</td>
                                <td class="px-4 py-2 whitespace-nowrap">{{ $customer->server_type }}</td>
                                <td class="px-4 py-2">
                                    <div class="flex items-center gap-2">
                                        <!-- Edit Button -->
                                        <a href="{{ route('edit-customer', $customer->id) }}" wire:navigate
                                            class="inline-flex items-center gap-1 px-3 py-2 text-sm font-medium text-white bg-yellow-500 rounded-lg hover:bg-yellow-600 focus:outline-none focus:ring-4 focus:ring-yellow-300 dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800 cursor-pointer">
                                            <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M10.779 17.779L4.36 19.918 6.5 13.5m4.279 4.279l8.364-8.643a3.027 3.027 0 00-2.14-5.165 3.03 3.03 0 00-2.14.886L6.5 13.5m4.279 4.279L6.499 13.5m2.14 2.14l6.213-6.504M12.75 7.04 17 11.28" />
                                            </svg>
                                            Update
                                        </a>

                                        <!-- Delete Button -->
                                        <button type="button" wire:click="deleteCustomer('{{ $customer->id }}')"
                                            class="inline-flex items-center gap-1 px-3 py-2 text-sm font-medium text-white bg-red-600 rounded-lg hover:bg-red-700 focus:outline-none focus:ring-4 focus:ring-red-300 dark:bg-red-700 dark:hover:bg-red-800 dark:focus:ring-red-900 cursor-pointer">
                                            <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 011 1v3H9V4a1 1 0 011-1ZM6 7h12v13a1 1 0 01-1 1H7a1 1 0 01-1-1V7Z" />
                                            </svg>
                                            Delete
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center border-b py-4">
                                    No Customer found
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Card Footer -->
        <div class="pt-4 sm:pt-6">
            {{ $all_customer->links(data: ['scrollTo' => false]) }}
        </div>
    </div>
</div>
