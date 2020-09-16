<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('block.headers.show', ['id' => $block['id']]) }}
        </h2>
    </x-slot>

    @foreach($block as $key => $values)
    <div class="flex mb4">
        <div class="w-1/4 bg-gray-400 h-12">
            {{ $key }}
        </div>
        <div class="w-3/4 bg-gray-500 h-12">
            @if(! is_array($values))
            {{ $values }}
            @else
                <ul>
                @foreach($values as $valueKey => $value)
                    <li>
                        {{ $valueKey }} : {{ $value }}
                    </li>
                @endforeach
                </ul>
            @endif
        </div>
    </div>
    @endforeach
</x-app-layout>