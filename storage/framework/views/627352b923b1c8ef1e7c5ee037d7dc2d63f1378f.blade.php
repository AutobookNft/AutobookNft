<?php extract(collect($attributes->getAttributes())->mapWithKeys(function ($value, $key) { return [Illuminate\Support\Str::camel(str_replace([':', '.'], ' ', $key)) => $value]; })->all(), EXTR_SKIP); ?>
@props(['href','wire:click.prevent'])
<x-jet-dropdown-link :href="$href" :wire:click.prevent="$wireClickPrevent" >

{{ $slot ?? "" }}
</x-jet-dropdown-link>