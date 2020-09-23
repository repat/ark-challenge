<table class="table-auto w-full" id='delegates-table'>
    <thead>
        <th class="px-4 py-2">
            {{ __('general.crud.rank') }}
        </th>
        <th class="px-4 py-2">
            {{ __('general.crud.address') }}
        </th>
        <th>
            {{ __('general.crud.username') }}
        </th>
    </thead>
    <tbody>
    @if(! empty($delegates))
        @foreach($delegates as $delegate)
        <tr>
            <td class="border px-4 py-2 text-center">
                {{ $delegate['rank'] }}
            </td>
            <td class="border px-4 py-2">
                <a href="{{ route('delegate.show', $delegate['address']) }}" title="{{ __('delegate.show', ['address' => $delegate['address']]) }}">
                    <i class="fas fa-wallet"></i> {{ str_limit($delegate['address'], config('ark.long_id_length')) }}
                </a>
            </td>
            <td class="border px-4 py-2 text-right">
                {{ $delegate['username'] }}
            </td>
        </tr>
        @endforeach
    @else
        {{ __('general.crud.no_records_found') }}
    @endif
    </tbody>
</table>