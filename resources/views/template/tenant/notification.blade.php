@if(session('success') || session('error') || $errors->any())
<!-- This example requires Tailwind CSS v2.0+ -->
<div
    class="notification-bar bg-{{ session('success') ? 'green' : 'yellow' }}-600 animate__animated animate__fadeInDown">
    <div class="max-w-7xl mx-auto py-3 px-3 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between flex-wrap">
            <div class="w-0 flex-1 flex items-center">
                <span class="flex p-2 rounded-lg bg-{{ session('success') ? 'green' : 'yellow' }}-800">
                    @if(session('success'))
                    <!-- Heroicon name: outline/speakerphone -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                            clip-rule="evenodd" />
                    </svg>
                    @endif
                    @if (session('error') || $errors->any())
                    <!-- Heroicon name: outline/speakerphone -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                            clip-rule="evenodd" />
                    </svg>
                    @endif
                </span>
                <p class="ml-3 font-medium text-white truncate">
                    {{-- <span class="md:hidden">
                                            We announced a new product!
                                        </span> --}}
                    <span class="md:inline">
                        {{ session('success') }}
                        {{ session('error') }}
                        {{ $errors->first() }}
                    </span>
                </p>
            </div>
            <div class="order-2 flex-shrink-0 sm:order-3 sm:ml-3">
                <button onclick="onCloseNotif()" type="button"
                    class="-mr-1 flex p-2 rounded-md hover:bg-{{ session('success') ? 'green' : 'yellow' }}-500 focus:outline-none focus:ring-2 focus:ring-white sm:-mr-2">
                    <span class="sr-only">Dismiss</span>
                    <!-- Heroicon name: outline/x -->
                    <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</div>
@endif
