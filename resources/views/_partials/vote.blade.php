
@if(array_key_exists('vote', $wallet))
    <div class="flex">
        <div class="w-auto bg-gray-100 p-10">
            {{ __('wallet.fields.publicKey') }}
        </div>
        <div class="w-auto bg-gray-200 p-10">
            <a href="{{ route('wallet.show', $wallet['vote']) }}" title="{{ __('wallet.show', ['address' => $wallet['vote']]) }}">
                {{-- $wallet['vote'] is the public key but this still works --}}
                <i class="fas fa-wallet"></i> {{ str_limit($wallet['vote'], config('ark.long_id_length')) }}
            </a>
        </div>
    </div>
@else
    {{ __('wallet.no_vote') }}
@endif