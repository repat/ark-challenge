<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Wallets') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <h2>{{ __('wallet.header') }}</h2>
                <table class="table-auto">
                    <thead>
                        <tr>
                            <th class="px-4 py-2">
                                {{ __('general.crud.delegate') }}
                            </th>
                            <th class="px-4 py-2">
                                {{ __('general.crud.address') }}
                            </th>
                            <th>
                                {{ __('general.crud.balance') }}
                            </th>
                            <th>
                                {{ __('general.crud.action') }}
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($wallets as $wallet)
                        <tr>
                            <td class="border px-1 py-1">
                                @if($wallet['isDelegate'])
                                    <i class="far fa-vote-yea"></i>
                                @endif
                            </td>
                            <td class="border px-4 py-2">
                                {{ $wallet['address'] }}
                            </td>
                            <td class="border px-4 py-2">
                                {{ $wallet['balance'] }}
                            </td>
                            <td class="border px-4 py-2">
                                <a href="{{ route('wallet.show', $wallet['address']) }}" title="{{ __('wallet.show') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">
                                    <i class="far fa-eye"></i> {{ __('general.crud.show') }}
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
