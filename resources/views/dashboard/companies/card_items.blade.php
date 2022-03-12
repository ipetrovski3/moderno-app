@foreach($finances as $finance)
    <tr>
        <td class="my-0 py-0">{{ $finance->date }}</td>
        <td class="my-0 py-0">{{ $finance->number }}</td>
        @if ($finance->type == 'outgoing')
            <td class="my-0 py-0">{{ $finance->amount }}</td>
            <td class="my-0 py-0"></td>
        @else
            <td class="my-0 py-0"></td>
            <td class="my-0 py-0">{{ $finance->amount }}</td>
        @endif

    </tr>
@endforeach
    <tr class="bg-dark">
        <td></td>
        <td></td>
        <td>{{ $finances->where('type', 'outgoing')->pluck('amount')->sum() }}</td>
        <td>{{ $finances->where('type', 'incoming')->pluck('amount')->sum() }}</td>
        <td>{{ $finances->where('type', 'outgoing')->pluck('amount')->sum() - $finances->where('type', 'incoming')->pluck('amount')->sum() }}</td>
    </tr>
