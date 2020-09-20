<div class="py-12 flex">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg relative">
            @if(isset($header))
                {{ $header }}
            @endif
            {{ $slot }}
        </div>
    </div>
</div>