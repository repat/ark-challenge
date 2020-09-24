<x-jet-form-section submit="updateArkNet">
    <x-slot name="title">
        {{ __('Select Ark Net') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Either select Main or Dev Net.') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-12 sm:col-span-12">
            <x-jet-label for="net" value="{{ __('ark.net') }}" />
            <select wire:model="net" id="select-net">
                @foreach(array_keys(config('ark.connections')) as $availableNet)
                    <option title="{{ $availableNet }}" value="{{ $availableNet }}">{{ __('ark.nets.' . $availableNet) }}</option>
                @endforeach
            </select>
            <x-jet-input-error for="net" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>

        <x-jet-button>
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
