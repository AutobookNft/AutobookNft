<div class="text-sm font-medium text-gray-700 py-2 px-2 hover:bg-teal-500 hover:text-white hover:scale-105 rounded-md
transition duration-150 ease-in-out">

<x-jet-dropdown align="left" width="48">
    <x-slot name="trigger">
        <svg class="w-6 h-6 fill-current inline-block" fill="currentColor" viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg">

            <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path>

            <path fill-rule="evenodd"
                d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z"
                clip-rule="evenodd"></path>
        </svg>
        <a>{{ 'Intarnal tranfer' }}</a>

    </x-slot>

    <x-slot name="content">
        <!-- Account Management -->
        {{-- <div class="block px-4 py-2 text-xs text-gray-400">
            {{ __('Manage Account') }}
        </div> --}}

        @foreach (Auth::user()->allTeams() as $team)
            <x-item-internal-tranfer :team="$team" />
            {{-- <x-jet-switchable-team :team="$team" /> --}}
        @endforeach

        <div class="border-t border-gray-100"></div>

    </x-slot>

   <!-- Remove Team Member Confirmation Modal -->

</x-jet-dropdown>


