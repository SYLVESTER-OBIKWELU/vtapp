@props(['reply','reply_id','image'])

@if ($reply)
    {{-- Modal Overlay --}}
<div class="fixed inset-0 flex items-center justify-center z-50">
    {{-- Modal Background --}}
    <div {{--wire:click="closeModal"--}} class="absolute inset-0 bg-gray-500 opacity-70" style="z-index: 5;"></div>

    {{-- Modal Body --}}
    <div class="relative rounded-lg shadow-lg p-6 bg-white dark:bg-gray-800 w-full max-w-lg" style="z-index: 10;">
        {{-- Close Button --}}
        <button wire:click="closeModal"
            class="absolute top-4 right-4 text-gray-500 hover:text-gray-700 focus:outline-none">
            <i class="fa fa-times" aria-hidden="true"></i>
        </button>

        {{-- Modal Content --}}
        <div class="mt-5 overflow-y-auto" style="max-height: 80vh;">
            <form wire:submit.prevent="submitReply({{ $reply_id }})" class="space-y-4">
                <div>
                    <label for="replyText" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Your Reply</label>
                    <textarea
                        id="replyText"
                        wire:model="replies"
                        rows="4"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:text-white"
                        placeholder="Type your reply here..."></textarea>
                        @error('replies') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
                <div>
                            <label for="image"
                                class="block mb-2 text-sm font-medium text-gray-700 dark:text-white">Image</label>
                            <input wire:model="image" type="file" id="image"
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none">
                            @if ($image)
                            <img src="{{ $image->temporaryUrl() }}" class="mt-2 h-24 rounded" alt="Preview">
                            @endif
                            @error('image') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                <div class="flex justify-end">
                    <button
                        type="submit"
                        class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        wire:loading.attr="disabled"
                    >
                        <span wire:loading.remove wire:target="submitReply.{{ $reply_id }}">SEND</span>
                        <span wire:loading wire:target="submitReply({{ $reply_id }})">
                            <svg class="animate-spin h-5 w-5 mr-2 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8z"></path>
                            </svg>
                            Replying...
                        </span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endif
