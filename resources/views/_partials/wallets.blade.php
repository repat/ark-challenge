<table class="table-auto w-full">
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
        <th>
            {{ __('general.crud.action') }}
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
                {{ $wallet['address'] }}
            </td>
            <td class="border px-4 py-2 text-right">
                {{ $wallet['balance'] }} &#1127;
            </td>
            <td class="border px-4 py-2">
                <x-button href="{{ route('wallet.show', $wallet['address']) }}" title="{{ __('wallet.show') }}" type="show" />
            </td>
        </tr>
        @endforeach
    @else
        {{ __('general.crud.no_records_found') }}
    @endif
    </tbody>
</table>