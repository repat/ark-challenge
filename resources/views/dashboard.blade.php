<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <x-panel>
        <x-slot name="header">
            <h2>{{ __('block.header') }}</h2>
        </x-slot>
        <include-fragment src='/block/_partial'>
            @include('_partials.placeholder-3-col')
        </include-fragment>
    </x-panel>

    <x-panel>
        <x-slot name="header">
            <h2>{{ __('transaction.header') }}</h2>
        </x-slot>
        <include-fragment src='/transaction/_partial'>
            @include('_partials.placeholder-3-col')
        </include-fragment>
    </x-panel>

    {{-- <x-slot name="scripts"> --}}
        {{-- <script src="{{ mix('js/echo.js') }}"></script> --}}
    {{-- </x-slot> --}}
</x-app-layout>

