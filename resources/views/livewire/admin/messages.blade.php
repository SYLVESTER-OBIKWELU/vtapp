<div>
    <section class="mt-10">
        <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
            <div class="relative shadow-md sm:rounded-lg overflow-hidden bg-white dark:bg-gray-800">
                <div class="flex items-center justify-between p-4">
                    <div class="flex">
                        <div class="relative w-full">
                            <input wire:model.live.debounce.300ms='search' type="text"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2"
                                placeholder="Search">
                        </div>
                    </div>
                    <div class="flex">

                    </div>
                    <div class="flex items-center space-x-4">
                        @if ($messages->count() > 0)
                        <x-message :mail="$mail">{!! nl2br(e($body)) !!}</x-message>
                        <x-reply :reply="$reply" :reply_id="$reply_id" :image="$image" />
                        <label class="w-32 text-sm font-medium text-gray-700 dark:text-white">Per Page</label>
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
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-center text-gray-500 dark:text-gray-400">
                        <thead>
                            @if ($messages->count() > 0)
                            <tr>
                                <th scope="col"
                                    class="px-4 py-3 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    S/N</th>
                                <th scope="col"
                                    class="px-4 py-3 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    IP ADDRESS</th>
                                <th scope="col"
                                    class="px-4 py-3 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    NAME</th>
                                <th scope="col"
                                    class="px-4 py-3 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    EMAIL</th>
                                <th scope="col"
                                    class="px-4 py-3 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    SUBJECT</th>
                                <th scope="col"
                                    class="px-4 py-3 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    STATUS</th>
                                <th scope="col"
                                    class="px-4 py-3 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    DATE</th>
                                <th scope="col"
                                    class="px-4 py-3 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                </th>
                                <th scope="col"
                                    class="px-4 py-3 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <i class="fa fa-reply-all" aria-hidden="true"></i>
                                </th>
                                <th scope="col"
                                    class="px-4 py-3 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    ACTION</th>
                            </tr>
                            @endif
                        </thead>
                        <tbody>
                            @if (count($messages) != 0)
                            @foreach ($messages as $message)
                            <tr wire:key='{{$message->id}}' class="border-b dark:border-gray-700">
                                <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{$count++}}
                                </td>
                                <td class="px-4 py-3">{{$message->ip}}</td>
                                <td class="px-4 py-3">{{$message->name}}</td>
                                <td class="px-4 py-3">{{$message->email}}</td>
                                <td class="px-4 py-3">{{$message->subject}}</td>
                                <td class="px-4 py-3">
                                    <span class="px-2 py-1 rounded text-white
                                        @if($message->status === 'new')
                                            bg-red-500 animate-pulse
                                        @else
                                            bg-green-500
                                        @endif
                                    ">
                                        {{$message->status}}
                                    </span>
                                </td>
                                <td class="px-4 py-3">{{$message->updated_at->diffForHumans()}}</td>
                                <td class="px-4 py-3">
                                    <button wire:click='openMail({{$message->id}})'
                                        class="px-3 py-1 bg-blue-500 text-white rounded "><i class="fa fa-envelope-open"
                                            aria-hidden="true"></i></button>
                                </td>
                                <td class="px-4 py-3">
                                    <button wire:click='openReply({{$message->id}})'
                                        class="px-3 py-1 bg-blue-500 text-white rounded"><i class="fa fa-reply"
                                            aria-hidden="true"></i></button>
                                </td>
                                <td class="px-4 py-3">
                                    <button class="px-3 py-1 bg-red-500 text-white rounded" onclick="deletion(event)">
                                        <a href="#" class="btn btn-danger" onclick="deletion(event)"><i
                                                class="fa fa-trash" aria-hidden="true"></i></a>
                                        <button wire:click='deleteMessage({{$message->id}})' id="deleteBtn"></button>
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="5">
                                    <div class="flex justify-center items-center text-gray-700 dark:text-white p-5"
                                        style="min-height: 50vh;">
                                        Your Inbox is empty!
                                    </div>
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                <div class="py-4 px-3">
                    {{$messages->links()}}
                </div>
            </div>
        </div>
    </section>
</div>