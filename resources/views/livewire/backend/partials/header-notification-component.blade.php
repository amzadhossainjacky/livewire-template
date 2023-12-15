 <div class="relative md:flex hidden">
    <button data-fc-type="dropdown" data-fc-placement="bottom-end" type="button" class="nav-link p-2">
        <span class="sr-only">View notifications</span>
        <span class="flex items-center justify-center h-6 w-6">
            <i class="{{ $log_counter_icon }} text-2xl"></i>

            @if ($notificationStatus)
                <span
                    class="absolute top-0 end-0 inline-flex items-center py-0.5 px-1.5 rounded-full text-xs font-medium transform -translate-y-1/4 translate-x-1/4 bg-rose-500 text-white">
                    0 </span>
            @else
                <span
                    class="absolute top-0 end-0 inline-flex items-center py-0.5 px-1.5 rounded-full text-xs font-medium transform -translate-y-1/4 translate-x-1/4 bg-rose-500 text-white">
                    {{ $unread_log_counter }}</span>
            @endif

        </span>
    </button>
    <div
        class="fc-dropdown fc-dropdown-open:opacity-100 hidden opacity-0 w-80 z-50 mt-2 transition-[margin,opacity] duration-300 bg-white dark:bg-gray-800 shadow-lg border border-gray-200 dark:border-gray-700 rounded-lg">

        <div class="p-2 border-b border-dashed border-gray-200 dark:border-gray-700">
            <div class="flex items-center justify-between">
                <h6 class="text-sm"> {{ $item_title }}</h6>
                <a href="javascript:void(0);" wire:click.prevent="allNotificationUpdated"
                    class="text-gray-500 underline">
                    <small>{{ $mark_all_as_read_text }}</small>
                </a>
            </div>
        </div>

        <div class="p-4 h-80" data-simplebar>

            {{-- @if ($notificationStatus)

            @else
            @foreach ($unread_notification_list as $key => $notification)
            <a href="javascript:void(0);" wire:click.prevent="notificationUpdated({{ $notification['id']}})" class="block mb-4">
                <div class="card-body">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="flex justify-center items-center h-9 w-9 rounded-full bg text-white bg-primary">
                                <i class="{{ _icons($notification['notifiable']['model']) }} text-2xl"></i>
                            </div>
                        </div>
                        <div class="flex-grow truncate ms-2">
                            <h5 class="text-sm font-semibold mb-1">{{$notification['notifiable']['subject']}} <small class="font-normal text-gray-500 ms-1">{{$notification['notifiable']['created_at']}}</small>
                            </h5>
                            <small class="noti-item-subtitle text-muted">{!!$notification['notifiable']['description']!!}</small>
                        </div>
                    </div>
                </div>
            </a>
            @endforeach
            @endif --}}

        </div>

        {{-- <a href="javascript:void(0);" class="p-2 border-t border-dashed border-gray-200 dark:border-gray-700 block text-center text-primary underline font-semibold">
            {{$view_all_text}}
        </a> --}}
    </div>
</div>
