<li
    class="{{ $class_list ?? '' }} items-center gap-x-3.5 py-2.5 px-4 text-sm font-medium bg-white border text-gray-800 -mt-px first:rounded-t-lg first:mt-0 last:rounded-b-lg dark:bg-gray-800 dark:border-gray-700 dark:text-white">
    @isset($has_icon)
        <i class="{{ $icon }}"></i>
    @endisset
    {{ $slot }}
</li>
