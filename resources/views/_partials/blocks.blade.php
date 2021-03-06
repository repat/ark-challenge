<table class="table-auto w-full" id="blocks-table">
    <thead>
        <tr>
            <th class="px-4 py-2">
                {{ __('general.crud.id') }}
            </th>
            <th>
                {{ __('general.crud.transactions') }}
            </th>
            <th>
                {{ __('general.crud.generator') }}
            </th>
            <th>
                {{ __('general.crud.timestamp') }}
            </th>
        </tr>
    </thead>
    <tbody>
    @foreach($blocks as $block)
        <tr>
            <td class="border px-4 py-2">
                <a href="{{ route('block.show', $block->id) }}" title="{{ __('block.show', ['id' => $block->id]) }}">
                    <i class="fas fa-cubes"></i> {{ str_limit($block->id, config('ark.long_id_length')) }}
                </a>
            </td>
            <td class="border px-4 py-2">
                {{ $block->transactions }}
            </td>
            <td class="border px-4 py-2">
                <a href="{{ route('wallet.show', $block->{'generator.address'}) }}" title="{{ __('wallet.show', ['address' => $block->{'generator.address'}]) }}">
                    {{ $block->generator['username'] }}
                </a>
            </td>
            <td class="border px-4 py-2">
                {{ $block->formatDate('timestamp.human') }}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>