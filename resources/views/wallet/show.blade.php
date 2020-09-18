<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('wallet.headers.show', ['address' => $wallet['address']]) }}
        </h2>
    </x-slot>

    <div class="flex flex-col">
        @foreach($wallet as $key => $values)
        <div class="flex mb4">
            <div class="w-1/4 bg-gray-400 h-12">
                {{ $key }}
            </div>
            <div class="w-3/4 bg-gray-500 h-12">
                @if(! is_array($values))
                {{ $values }}
                {{-- @else
                    <ul>
                    @foreach($values as $valueKey => $value)
                        @if(is_string($value))
                        <li>
                            {{ $valueKey }} : {{ $value }}
                        </li>
                        @endif
                    @endforeach
                    </ul> --}}
                @endif
            </div>
        </div>
        @endforeach

        @if(!empty($transactions))
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <h2>{{ __('transaction.header') }}</h2>
                    <table class="table-auto">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">
                                    {{ __('general.crud.id') }}
                                </th>
                                <th>
                                    {{ __('general.crud.timestamp') }}
                                </th>
                                <th>
                                    {{ __('general.crud.action') }}
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($transactions as $transaction)
                            <tr>
                                <td class="border px-4 py-2">
                                    {{ $transaction['id'] }}
                                </td>
                                <td class="border px-4 py-2">
                                    {{ $transaction['timestamp']['human'] ?? '' }}
                                </td>
                                <td class="border px-4 py-2">
                                    <a href="{{ route('transaction.show', $transaction['id']) }}" title="{{ __('transaction.show') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">
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
        @endif
    </div> {{-- .flex .flex-col --}}
</x-app-layout>