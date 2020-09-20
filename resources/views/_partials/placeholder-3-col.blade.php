@include('_partials.fade')

@foreach(range(1,3) as $r)
<table class="bg-gray-100 w-full">
    <tbody>
        <tr class="border-b">
            <td class="px-4 py-2 bg-grey-300 text-transparent rounded">
                {{ str_random() }}
            </td>
            <td class="px-4 py-2 bg-grey-300 text-transparent rounded">
                {{ str_random() }}
            </td>
            <td class="px-4 py-2 bg-grey-300 text-transparent rounded">
                Button
            </td>
        </tr>
    </tbody>
</table>
@endforeach