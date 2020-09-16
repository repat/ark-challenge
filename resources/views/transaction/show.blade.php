<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('transaction.headers.show') }}
        </h2>
    </x-slot>

    <div class="py-12">
    {{ dd($transaction) }}
    </div>
</x-app-layout>