<table class="table-auto w-full" id="wallets-table">
    <thead>
        <th class="px-4 py-2">
            {{ __('general.crud.delegate') }}
        </th>
        <th class="px-4 py-2">
            {{ __('general.crud.address') }}
        </th>
        <th>
            {{ __('general.crud.balance') }}
        </th>
    </thead>
    <tbody>
    @if(! empty($wallets))
        @foreach($wallets as $wallet)
        <tr>
            <td class="border text-center">
                @if($wallet['isDelegate'])
                    <i class="fas fa-vote-yea"></i>
                @endif
            </td>
            <td class="border px-4 py-2">
                <a href="{{ route('wallet.show', $wallet['address']) }}" title="{{ __('wallet.show', ['address' => $wallet['address']]) }}">
                    <i class="fas fa-wallet"></i> {{ str_limit($wallet['address'], config('ark.long_id_length')) }}
                </a>
            </td>
            <td class="border px-4 py-2 text-right">
                {{ floatval($wallet['balance']) * ARKTOSHI2ARK_MULTIPLIER }} {!! ARK_CURRENCY !!}
            </td>
        </tr>
        @endforeach
    @else
        {{ __('general.crud.no_records_found') }}
    @endif
    </tbody>
</table>