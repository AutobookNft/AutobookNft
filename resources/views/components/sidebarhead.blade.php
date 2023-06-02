<div id="profile" class="space-y-3">
    <img src="{{ $image }}" alt="head photo page" title='head photo page'
        class="w-10 md:w-16 rounded-full mx-auto" />
    <div>
        <h2 class="font-medium text-lg text-center text-teal-500">
            {{ $name }}
        </h2>
        <p class="text-xs text-gray-500 text-center">{{ $type }}</p>
        <div class= 'mt-4'><p class="text-sm text-black font-semibold text-center">{{ 'Page: '}} {{ $pagename }}</p></div>
    </div>
</div>
