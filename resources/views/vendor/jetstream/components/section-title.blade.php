<div class="mt-5 md:col-span-1 flex justify-between px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
    <div class="px-4 sm:px-0">
        <h3 class="text-lg font-medium text-gray-900">{{ $title }}</h3>

        <p class="mt-1 text-sm text-gray-600">
            {{ $description }}
        </p>
    </div>

    <div class="px-4 sm:px-0">
        {{ $aside ?? '' }}
    </div>
</div>
