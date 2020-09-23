@if(! empty($votes))
<table class="table-auto w-full" id="votes-table">
    <thead>
        <tr>
            <th class="px-4 py-2">
                {{ __('general.crud.id') }}
            </th>
            <th>
                {{ __('general.crud.timestamp') }}
            </th>
        </tr>
    </thead>
    <tbody>
    @foreach($votes as $vote)
        <tr>
            <td class="border px-4 py-2">
                {{ str_limit($vote['id'], config('ark.long_id_length')) }}
            </td>
            <td class="border px-4 py-2">
                {{ carbon($vote['timestamp']['human'])->format(config('app.format_dates')) }}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@else
    {{ __('general.crud.no_records_found') }}
@endif