<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Your Favorite Wallets') }}
        </h2>
    </x-slot>

    <x-panel>
        @if($userFavorites->isNotEmpty())
        <table class="table-auto w-full" id="blocks-table">
            <thead>
                <tr>
                    <th class="px-4 py-2">
                        {{ __('general.crud.address') }}
                    </th>
                    <th>
                        {{ __('general.crud.added') }}
                    </th>
                </tr>
            </thead>
            <tbody>
            @foreach($userFavorites as $userFavorite)
                <tr>
                    <td class="border px-4 py-2">
                        <a href="{{ route('wallet.show', $userFavorite->address) }}" title="{{ __('wallet.show', ['address' => $userFavorite->address]) }}">
                            <i class="fas fa-wallet"></i> {{ str_limit($userFavorite->address, config('ark.long_id_length')) }}
                        </a>
                    </td>
                    <td class="border px-4 py-2">
                        {{ $userFavorite->created_at->format(config('app.format_dates')) }}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        @else
            <x-warning-box>
                ⚠️ {{ __('wallet.no_favorites_yet') }}
            </x-warning-box>
        @endif
    </x-panel>
</x-app-layout>
