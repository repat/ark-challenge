<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('block.headers.show', ['id' => $block['id']]) }}
        </h2>
    </x-slot>

   @include('_partials.record', ['record' => $block, 'transKey' => 'block'])
</x-app-layout>