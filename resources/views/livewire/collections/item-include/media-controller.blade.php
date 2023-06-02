@if ($itemType=='audio')
    <div class="rounded-md bg-gray-200">
        <audio controls class="w-full rounded-md bg-gray-200">
            <source src="{{ url($hasHfile) }}" type="audio/mpeg">
        </audio>
    </div>
@endif
