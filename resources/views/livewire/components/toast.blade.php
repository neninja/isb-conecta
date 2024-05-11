<div
        x-data="getToastData()"
        @toast-showed="initHideTimeout()"
        class="fixed inset-0 flex items-end px-4 py-6 pointer-events-none sm:p-6 sm:items-start z-50">
    <div class="w-full flex flex-col items-center space-y-4 sm:items-end">
        <div
                x-cloak
                x-show="shown"
                x-transition:enter="transform ease-out duration-300 transition"
                x-transition:enter-start="translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2"
                x-transition:enter-end="translate-y-0 opacity-100 sm:translate-x-0"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                class="max-w-xs w-2/12 bg-white shadow-lg rounded-xl px-1 border-l-8 border-{{ $this::TYPE_COLORS[$type] }} pointer-events-auto ring-1 ring-black ring-opacity-5 overflow-hidden">
            <div class="p-4">
                <div class="flex items-start">
                    <div class="flex-shrink-0">
                        @if($type === $this::TYPE_SUCCESS)
                            <x-heroicon-o-check-circle class="h-6 w-6 text-green-400"></x-heroicon-o-check-circle>
                        @else
                            <x-heroicon-o-x-circle class="h-6 w-6 text-red-300"></x-heroicon-o-x-circle>
                        @endif
                    </div>
                    <div class="ml-3 w-0 flex-1 pt-0.5">
                        <p class="text-md font-semibold text-gray-900">{{ $title }}</p>
                        @isset($body)
                        <p class="mt-1 text-sm text-gray-500">{{ $body }}</p>
                        @endisset
                    </div>
                    <div class="ml-4 flex-shrink-0 flex">
                        <button wire:click="initProperties"
                                class="bg-white rounded-md inline-flex text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-secondary">
                            <span class="sr-only">Close</span>
                            <x-heroicon-o-x-mark class="h-5 w-5"></x-heroicon-o-x-mark>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function getToastData() {
            const hideToastInSeconds = 10;

            return {
                shown: @entangle('isShown').live,
                timeout: null,
                initHideTimeout() {
                    clearTimeout(this.timeout);
                    this.timeout = setTimeout(() => {
                        this.shown = false;
                    }, hideToastInSeconds * 1000);
                }
            }
        }
    </script>
</div>
