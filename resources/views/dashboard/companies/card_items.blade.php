@foreach($finances as $finance)
    <tr>
        <td class="my-0 py-0">{{ $finance->date }}</td>
        <td class="my-0 py-0">{{ $finance->amount }}</td>
        @if ($finance->type == 'outgoing')
            <td class="my-0 py-0">{{ $finance->amount }}</td>
            <td class="my-0 py-0"></td>
        @else
            <td class="my-0 py-0"></td>
            <td class="my-0 py-0">{{ $finance->amount }}</td>
        @endif
    </tr>
@endforeach
