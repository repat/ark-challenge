<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('delegate.headers.show', ['address' => $delegate['address']]) }}
        </h2>
    </x-slot>

    @include('_partials.record', ['record' => $delegate, 'transKey' => 'delegate'])

</x-app-layout>