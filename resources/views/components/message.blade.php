@props(['mail'])

@if ($mail)
    {{-- Modal Overlay --}}
<div class="fixed inset-0 flex items-center justify-center z-50">
    {{-- Modal Background --}}
    <div wire:click="closeModal" class="absolute inset-0 bg-gray-500 opacity-70" style="z-index: 5;"></div>

    {{-- Modal Body --}}
    <div class="relative rounded-lg shadow-lg p-6 bg-white dark:bg-gray-800 w-full max-w-lg" style="z-index: 10;">
        {{-- Close Button --}}
        <button wire:click="closeModal"
            class="absolute top-4 right-4 text-gray-500 hover:text-gray-700 focus:outline-none">
            <i class="fa fa-times" aria-hidden="true"></i>
        </button>

        {{-- Modal Content --}}
        <div class="mt-5 overflow-y-auto" style="max-height: 80vh;">
            <br>
            <hr>
            <br>
            {{ $slot }}
            {{-- slot for the modal content --}}
        </div>
    </div>
</div>
@endif
