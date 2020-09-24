<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Wallets') }}
        </h2>
    </x-slot>

    <x-panel>
        <include-fragment src='{{ route('wallet._partial', $noParameters = [], $relativeRoute = true) }}'>
            @include('_partials.placeholder-n-col', ['amountCol' => 3])
        </include-fragment>
    </x-panel>
</x-app-layout>
