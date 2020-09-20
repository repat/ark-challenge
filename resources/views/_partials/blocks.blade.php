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
    @foreach($blocks as $block)
        <tr>
            <td class="border px-4 py-2">
                {{ $block['id'] }}
            </td>
            <td class="border px-4 py-2">
                {{ $block['timestamp']['human'] ?? '' }}
            </td>
            <td class="border px-4 py-2">
                <x-button href="{{ route('block.show', $block['id']) }}" title="{{ __('block.show') }}" type="show" />
            </td>
        </tr>
    @endforeach
    </tbody>
</table>