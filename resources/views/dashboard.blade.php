<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <h2>{{ __('block.header') }}</h2>
                <table class="table-auto">
                <thead>
                    <tr>
                        <th class="px-4 py-2">
                            {{ __('general.crud.id') }}
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
                            <a href="{{ route('block.show', $block->id) }}" title="{{ __('block.show', ['id' => $block['id']]) }}">
                                <i class="fa fa-eye"></i> {{ __('general.crud.show') }}
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </div>
        </div>
    </div>
</x-app-layout>
