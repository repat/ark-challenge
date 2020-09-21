<x-panel>
    <div class="flex flex-col">
        @if(array_key_exists('timestamp', $record) && array_key_exists('human', $record['timestamp']))
        <small class="text-right pr-2 pt-2">
            {{ carbon($record['timestamp']['human'])->format(config('app.format_dates')) }}
        </small>
        @endif
        <h2 class="text-center pb-4 pt-2">{{ __('general.crud.details') }}</h2>

        @foreach(array_filter($record, fn($r) => !is_array($r)) as $key => $values)
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
                        @else
                            @if($values === "0" || !empty($values))
                                {{ $values }}
                            @else
                                {{ __('general.crud.no') }}
                            @endif
                        @endif
                    </div>
                </div>
        @endforeach
    </div>
</x-panel>