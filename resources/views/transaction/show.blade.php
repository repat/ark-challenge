<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('transaction.headers.show', ['id' => $transaction->id ?? trans('general.crud.err')]) }}
        </h2>
    </x-slot>

   @include('_partials.record', ['record' => $transaction, 'transKey' => 'transaction'])
</x-app-layout>