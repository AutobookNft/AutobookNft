@php
$traits = App\Models\Item_traits::where('teams_items_id', $itemId)->get();
@endphp

@if(count($traits)>0)
<<<<<<< HEAD
    <div class="relative bg-white rounded-lg shadow-md dark:bg-gray-800">
=======
<div class="relative bg-white rounded-lg shadow-md dark:bg-gray-800">
>>>>>>> f0ed47c (unito locale con remoto)

    <div class="grid grid-cols-1 m-2 border border-gray-300">
        <table class="table-auto w-full text-left">
            <thead class="bg-gray-800 text-white">
                <th class="px-4 py-2">
                    <a href="{{ url('dashboard/collection/items_edit/'. $itemId . '/traits' ) }}">
                        {{ __('Traits') }}
                    </a>
                </th>
            </thead>

            <tbody>
                @foreach ($traits as $item)
                <tr class="bg-orange-300">
                    <td class="border px-2 py-1">{{ $item->title }}</td>
                    <td class="border px-2 py-1">{{ $item->description }}</td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>
<<<<<<< HEAD
=======
</div>
>>>>>>> f0ed47c (unito locale con remoto)
@endif
