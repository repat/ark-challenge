<table class="table-auto w-full">
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
                <x-button href="{{ route('transaction.show', $transaction['id']) }}" title="{{ __('transaction.show') }}" type="show" />
            </td>
        </tr>
    @endforeach
    </tbody>
</table>