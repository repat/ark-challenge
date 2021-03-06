<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <i class="fas fa-qrcode" onclick="toggleModal()"></i>
            {{ __('wallet.headers.show', ['address' => $wallet->address ?? trans('general.crud.err')]) }}

            @auth
                @livewire('user-favorite', ['address' => $wallet->address ?? trans('general.crud.err')])
            @endauth
        </h2>
    </x-slot>

    <x-panel>
        <div class="flex flex-col">

            @include('_partials.record', ['record' => $wallet, 'transKey' => 'wallet'])

            <x-panel>
                <x-slot name="header">
                    <h2>{{ __('transaction.header') }}</h2>
                </x-slot>
                <include-fragment src='{{ route('wallet._partial.transactions', $wallet->address ?? trans('general.crud.err'), $relativeRoute = true) }}'>
                    @include('_partials.placeholder-n-col', ['amountCol' => 4])
                </include-fragment>
            </x-panel>

        </div> {{-- .flex .flex-col --}}
    </x-panel>

    @prepend('modals')
    <x-modal>
        <x-slot name="title">
            {{ $wallet->address ?? trans('general.crud.err') }}
        </x-slot>
        <x-slot name="body">
            {!! QrCode::size(100)->generate(config('ark.cta') . ($wallet->address ?? trans('general.crud.err'))) !!}
        </x-slot>
    </x-modal>
    @endprepend

    <x-slot name="scripts">
        <script>
        function toggleModal(){
            const modal = document.querySelector('.modal');
            modal.classList.toggle('opacity-0');
            modal.classList.toggle('pointer-events-none')
        }
        </script>
    </x-slot>

</x-app-layout>