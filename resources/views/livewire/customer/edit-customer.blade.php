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
                                <a href="{{ route('list-customer') }}" wire:navigate
                                    class="ml-1 text-gray-700 hover:text-primary-600 md:ml-2 dark:text-gray-300 dark:hover:text-white">Customer</a>
                            </div>
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
            <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">{{ $title ?? 'Add Customer' }}
            </h1>
        </div>

        <form wire:submit.prevent="updateCustomer">
            <!-- Customer Name -->
            <div class="mb-6">
                <label for="customer_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Customer
                    Name <span class="text-red-500">*</span></label>
                <input type="text" id="customer_name" wire:model="customer_name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @error('customer_name')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- PMS Selection -->
            <div class="mb-6">
                <label for="pms_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">PMS (Property
                    Management System)
                    <span class="text-red-500">*</span></label>
                <select id="pms_id" wire:model="pms_id"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="">Select PMS</option>
                    @if ($pmsList && count($pmsList) > 0)
                        @foreach ($pmsList as $pms)
                            <option value="{{ $pms->id }}">{{ $pms->pms_name }}</option>
                        @endforeach
                    @else
                        <option value="" disabled>No PMS available</option>
                    @endif
                </select>
                @error('pms_id')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror

                <!-- PMS Information Display -->
                @if ($pms_id)
                    @php
                        $selectedPms = collect($pmsList)->firstWhere('id', $pms_id);
                    @endphp
                    @if ($selectedPms)
                        <div
                            class="mt-3 p-3 bg-blue-50 border border-blue-200 rounded-lg dark:bg-blue-900/20 dark:border-blue-800">
                            <div class="flex items-start">
                                <svg class="w-5 h-5 text-blue-600 dark:text-blue-400 mt-0.5 mr-2" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <div>
                                    <h4 class="text-sm font-medium text-blue-800 dark:text-blue-300">Selected PMS:
                                        {{ $selectedPms->pms_name }}</h4>
                                    @if ($selectedPms->description)
                                        <p class="text-sm text-blue-700 dark:text-blue-400 mt-1">
                                            {{ $selectedPms->description }}</p>
                                    @endif
                                    <p class="text-xs text-blue-600 dark:text-blue-500 mt-2">This customer will be
                                        associated with the selected PMS system.</p>
                                </div>
                            </div>
                        </div>
                    @endif
                @endif
            </div>

            <!-- OS Server -->
            <div class="mb-6">
                <label for="os_server" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">OS Server
                    <span class="text-red-500">*</span></label>
                <input type="text" id="os_server" wire:model="os_server"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @error('os_server')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- IP Server -->
            <div class="mb-6">
                <label for="ip_server" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">IP Server
                    <span class="text-red-500">*</span></label>
                <input type="text" id="ip_server" wire:model="ip_server"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @error('ip_server')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Server Type -->
            <div class="mb-6">
                <label for="server_type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Server
                    Type <span class="text-red-500">*</span></label>
                <select id="server_type" wire:model="server_type"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="">Select Server Type</option>
                    <option value="cloud">Cloud</option>
                    <option value="on-premise">On-Premise</option>
                </select>
                @error('server_type')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Interface Note -->
            <div class="mb-6">
                <label for="interface_note"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Interface Note</label>
                <textarea id="interface_note" wire:model="interface_note" rows="4"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
                @error('interface_note')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit Button -->
            <div class="flex items-center space-x-4">
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 cursor-pointer"
                    wire:loading.attr="disabled">
                    <span wire:loading.remove>Edit Customer</span>
                    <span wire:loading>
                        <svg class="inline w-4 h-4 mr-3 text-white animate-spin" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"
                                d="M10 3V1m0 18v-2M5.05 5.05L3.64 3.64m12.72 12.72l-1.41-1.41M3 10H1m18 0h-2M5.05 14.95l-1.41 1.41m12.72-12.72l-1.41 1.41" />
                        </svg>
                        Updating...
                    </span>
                </button>
                <a href="{{ route('list-customer') }}" wire:navigate
                    class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>
