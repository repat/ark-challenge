<div class="relative rounded overflow-hidden">
    @include('_partials.fade')

    <table class="bg-gray-100 w-full">
        <tbody>
            @foreach(range(1, $amountRows ?? config('ark.limits.default')) as $row)
                <tr class="border-b">
                    @foreach(range(1, $amountCol) as $col)
                        <td class="p-4">
                            <span class="bg-gray-300 text-transparent rounded">
                                {{ str_random() }}
                            </span>
                        </td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
</div>