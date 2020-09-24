@if(! empty($transactions))
<table class="table-auto w-full" id="transactions-table">
    <thead>
        <tr>
            <th class="px-4 py-2">
                {{ __('general.crud.id') }}
            </th>
            <th>
                {{ __('general.crud.amount') }}
            </th>
            <th>
                {{ __('general.crud.fee') }}
            </th>
            <th>
                {{ __('general.crud.timestamp') }}
            </th>
        </tr>
    </thead>
    <tbody>
    @foreach($transactions as $transaction)
        <tr>
            <td class="border px-4 py-2">
                <a href="{{ route('transaction.show', $transaction['id']) }}" title="{{ __('transaction.show', ['id' => $transaction['id']]) }}">
                    <i class="fas fa-file-invoice-dollar"></i> {{ str_limit($transaction['id'], config('ark.long_id_length')) }}
                </a>
            </td>
            <td class="border px-4 py-2 text-right">
                {{ $transaction['fee'] }} {!! ARK_CURRENCY !!}
            </td>
            <td class="border px-4 py-2 text-right">
                {{ $transaction['amount'] }} {!! ARK_CURRENCY !!}
            </td>
            <td class="border px-4 py-2">
                {{ carbon($transaction['timestamp']['human'])->format(config('app.format_dates')) }}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@else
{{ __('general.crud.no_records_found') }}
@endif