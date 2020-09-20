<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('wallet.headers.show', ['address' => $wallet['address']]) }}
        </h2>
    </x-slot>

    <x-panel>
        <div class="flex flex-col">

            <h2 class="text-center">{{ __('general.crud.details') }}<h3>

            @foreach($wallet as $key => $values)
                @if(!is_array($values))
                    <div class="flex mb4">
                        <div class="w-1/4 bg-gray-100 h-12 p-10">
                            {{ __('wallet.fields.' . $key) }}
                        </div>
                        <div class="w-3/4 bg-gray-200 h-12 p-10">
                                {{ $values ?: __('general.crud.no') }}
                        </div>
                    </div>
                @endif
            @endforeach

            <x-panel>
                <x-slot name="header">
                    <h2>{{ __('transaction.header') }}</h2>
                </x-slot>
                <include-fragment src='/wallet/_partial/{{ $wallet['address'] }}'>
                    @include('_partials.placeholder-3-col')
                </include-fragment>
            </x-panel>

        </div> {{-- .flex .flex-col --}}
    </x-panel>
    <x-slot name="scripts">
        <script type="module" src="https://unpkg.com/@github/include-fragment-element@latest?module"></script>
    </x-slot>
</x-app-layout>