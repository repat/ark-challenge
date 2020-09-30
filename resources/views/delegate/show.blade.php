<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('delegate.headers.show', ['address' => $delegate->address ?? trans('general.crud.err')]) }}
        </h2>
    </x-slot>

    @include('_partials.record', ['record' => $delegate, 'transKey' => 'delegate'])

    <x-panel>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('general.crud.votes_for') }}
            </h2>
        </x-slot>

        <include-fragment src='{{ route('delegate._partial.vote', $delegate->address ?? trans('general.crud.err'), $relativeRoute = true) }}'>
            @include('_partials.placeholder-n-col', ['amountCol' => 2, 'amountRows' => 1])
        </include-fragment>
    </x-panel>

</x-app-layout>