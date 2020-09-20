<a
    href="{{ $href }}"
    class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center"
    title="{{ $title }}"
>
@switch($type)
    @case('show')
    <i class="far fa-eye"></i> {{ __('general.crud.show') }}
    @break
    @default
    <i class="far fa-question"></i> {{ __('general.crud.na') }}
    @break
@endswitch
</a>