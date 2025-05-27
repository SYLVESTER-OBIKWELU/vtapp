<div>
    <section class="mt-10">
        <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
            <div class="relative shadow-md sm:rounded-lg overflow-hidden bg-white dark:bg-gray-800">
                <div class="flex items-center justify-between p-4">
                    <div class="flex">
                        <div class="relative w-full">
                            @if ($list)

                            <input wire:model.live.debounce.300ms='search' type="text"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2"
                                placeholder="Search">
                            @endif
                        </div>
                    </div>
                    <div class="flex">
                        <div class="flex relative w-full">
                            <button wire:click='openList'
                                class="w-6 h-6 flex items-center justify-center rounded-full bg-blue-500 text-white mx-1 focus:ring-2 focus:ring-blue-500 ring-4 ring-blue-700 "
                                title="Add Product">
                                <i class="fa fa-users" aria-hidden="true"></i>
                            </button>
                            <button wire:click='openMailer'
                                class="w-6 h-6 flex items-center justify-center rounded-full bg-green-500 text-white mx-1 focus:ring-2 focus:ring-green-300  ring-4 ring-green-700 "
                                title="View Product">
                                <i class="fa fa-mail-forward" aria-hidden="true"></i>
                            </button>
                        </div>
                    </div>
                    <div class="flex items-center space-x-4">
                        @if ($list)
                        <label class="w-full text-sm font-medium text-gray-700 dark:text-white">Per Page</label>
                        <select wire:model.live='perPage'
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="50">50</option>
                            <option value="75">75</option>
                            <option value="100">100</option>
                        </select>
                        @endif
                    </div>
                </div>
                @if ($list)
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-center text-gray-500 dark:text-gray-400">
                        <thead>
                            <tr>
                                <th scope="col"
                                    class="px-4 py-3 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    S/N</th>
                                <th scope="col"
                                    class="px-4 py-3 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    Email</th>
                                <th scope="col"
                                    class="px-4 py-3 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    DATE JOINED</th>
                                <th scope="col"
                                    class="px-4 py-3 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($subscribers) != 0)
                            @foreach ($subscribers as $user)
                            <tr wire:key='{{$user->id}}' class="border-b dark:border-gray-700">
                                <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{$count++}}
                                </td>
                                <td class="px-4 py-3">{{$user->email}}</td>
                                <td class="px-4 py-3">{{$user->created_at->diffForHumans()}}</td>
                                <td class="px-4 py-3">
                                    <button class="px-3 py-1 bg-red-500 text-white rounded" onclick="deletion(event)">
                                        <a href="#" class="btn btn-danger" onclick="deletion(event)">DELETE</a>
                                        <button wire:click='deleteSubscriber({{$user->id}})' id="deleteBtn"></button>
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="5">
                                    <div class="flex justify-center items-center text-gray-700 dark:text-white p-5"
                                        style="min-height: 50vh;">
                                        No subscribers available
                                    </div>
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                <div class="py-4 px-3">
                    {{$subscribers->links()}}
                </div>
                @endif

                @if ($mailer)
                <div class="overflow-x-auto">
                    <form wire:submit.prevent="sendNewsletter" class="space-y-6 p-6">
                        <div>
                            <label for="subject"
                                class="block mb-2 text-sm font-medium text-gray-700 dark:text-white">Subject</label>
                            <input wire:model.defer="subject" type="text" id="subject"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5"
                                placeholder="Enter subject">
                            @error('subject') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
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
                        <div>
                            <label for="message"
                                class="block mb-2 text-sm font-medium text-gray-700 dark:text-white">Message</label>
                            <textarea wire:model.defer="body" id="message" rows="6"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5"
                                placeholder="Type your message"></textarea>
                            @error('body') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-md-12 text-center">
                            <div wire:loading wire:target='sendNewsletter' class="loading">Loading ...</div>

                            <button wire:loading.remove wire:target='sendNewsletter' type="submit">Send Message</button>
                        </div>
                    </form>
                </div>

                @endif

            </div>
        </div>
    </section>
</div>