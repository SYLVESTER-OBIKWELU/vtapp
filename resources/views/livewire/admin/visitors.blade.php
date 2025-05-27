<div>
    <section class="mt-10">
        <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
            <div class="relative shadow-md sm:rounded-lg overflow-hidden bg-white dark:bg-gray-800">
                <div class="flex items-center justify-between p-4">
                    <div class="flex">
                        
                    </div>
                    <div class="flex">
                        
                    </div>
                    <div class="flex items-center space-x-4">
                        <label class="w-32 text-sm font-medium text-gray-700 dark:text-white">Per Page</label>
                        <select wire:model.live='perPage'
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="50">50</option>
                            <option value="75">75</option>
                            <option value="100">100</option>
                        </select>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-center text-gray-500 dark:text-gray-400">
                        <thead>
                            <tr>
                                <th scope="col"
                                    class="px-4 py-3 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    S/N</th>
                                <th scope="col"
                                    class="px-4 py-3 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    IP ADDRESS</th>
                                <th scope="col"
                                    class="px-4 py-3 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    DEVICE</th>
                                <th scope="col"
                                    class="px-4 py-3 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    LOCATION</th>
                                <th scope="col"
                                    class="px-4 py-3 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    VIEWED</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($visitors) != 0)
                            @foreach ($visitors as $user)
                            <tr wire:key='{{$user->id}}' class="border-b dark:border-gray-700">
                                <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{$count++}}
                                </td>
                                <td class="px-4 py-3">{{$user->ip_address}}</td>
                                <td class="px-4 py-3">{{$user->device}}</td>
                                <td class="px-4 py-3">{{$user->location}}</td>
                                <td class="px-4 py-3">{{$user->updated_at->diffForHumans()}}</td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="5">
                                    <div class="flex justify-center items-center text-gray-700 dark:text-white p-5"
                                        style="min-height: 50vh;">
                                        No Visits Yet
                                    </div>
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                <div class="py-4 px-3">
                    {{$visitors->links()}}
                </div>
            </div>
        </div>
    </section>
</div>