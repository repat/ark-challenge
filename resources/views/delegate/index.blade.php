<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Delegates') }}
        </h2>
    </x-slot>

    <x-panel>
        <include-fragment src='/delegate/_partial'>
            @include('_partials.placeholder-n-col', ['amountCol' => 4])
        </include-fragment>
    </x-panel>
</x-app-layout>
