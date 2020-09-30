<x-panel>
    <div class="flex flex-col">
        @if(isset($record->{'timestamp.human'}))
        <small class="text-right pr-2 pt-2">
            {{ $record->formatDate('timestamp.human') }}
        </small>
        @endif
        <h2 class="text-center pb-4 pt-2">{{ __('general.crud.details') }}</h2>

        @if(is_a($record, \App\Models\ArkModel::class))
        @foreach(array_filter($record->getDataArray(), fn($r) => !is_array($r)) as $key => $values)
                <div class="flex mb4">
                    <div class="w-1/4 bg-gray-100 h-12 p-10">
                        {{ __($transKey . '.fields.' . $key) }}
                    </div>
                    <div class="w-3/4 bg-gray-200 h-12 p-10">
                        @if(in_array($key, config('ark.linked_keys.wallet')))
                            <a href="{{ route('wallet.show', $values) }}">
                                <i class="fas fa-wallet"></i> {{ $values }}
                            </a>
                        @elseif(in_array($key, config('ark.linked_keys.block')))
                            <a href="{{ route('block.show', $values) }}">
                                <i class="fas fa-cubes"></i> {{ $values }}
                            </a>
                        @elseif(in_array($key, ['amount', 'fee']))
                            {{ floatval($values) * ARKTOSHI2ARK_MULTIPLIER }} {!! ARK_CURRENCY !!}
                        @else
                            @if(starts_with($key, 'is') && empty($values))
                                {{ __('general.crud.no') }}
                            @elseif(starts_with($key, 'is') && $values == 1)
                                {{ __('general.crud.yes') }}
                            @else
                                {{ $values }}
                            @endif
                        @endif
                    </div>
                </div>
        @endforeach
        @endif
    </div>
</x-panel>