<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('delegate.headers.show', ['address' => $delegate['address']]) }}
        </h2>
    </x-slot>

    @include('_partials.record', ['record' => $delegate, 'transKey' => 'delegate'])

    <x-panel>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('delegate.headers.transactions') }}
            </h2>
        </x-slot>

        <include-fragment src='{{ route('delegate._partial.transactions', $delegate['address'], $relativeRoute = true) }}'>
            @include('_partials.placeholder-n-col', ['amountCol' => 4])
        </include-fragment>
    </x-panel>

    <x-panel>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('delegate.headers.votes') }}
            </h2>
        </x-slot>
        <include-fragment src='{{ route('delegate._partial.votes', $delegate['address'], $relativeRoute = true) }}'>
            @include('_partials.placeholder-n-col', ['amountCol' => 4])
        </include-fragment>
    </x-panel>

</x-app-layout>