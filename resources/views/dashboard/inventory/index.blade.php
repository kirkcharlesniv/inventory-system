@extends('layouts.dashboard')

@section('page_title', 'Inventory')

@section('card_title', 'Item Stocks/Inventory')
@section('card_body')
<div class="table-responsive">
    <table class="table">
        <thead class=" text-primary">
            <th>Stock Code</th>
            <th>Name</th>
            <th>Description</th>
            <th>Initial Stocks</th>
            <th>Remaining Stocks</th>
            <th>Links</th>
        </thead>
        <tbody>
            @if(count($items) > 0)
                @foreach($items as $item)
                    <tr>
                        <td>{{ $item->stock_code }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->description }}</td>
                        <td>{{ $item->initial_stocks }}</td>
                        <td>{{ $item->remaining_stocks }}</td>
                        <td>
                            <a class="btn btn-primary" href="items/{{$item->id}}">Show/Delete</a>
                            <a class="btn btn-primary" href="items/{{$item->id}}/edit">Edit</a>
                        </td>
                    </tr>
                @endforeach
            @else
                <span><b>No entry was found.</b></span>
            @endif
        </tbody>
    </table>
</div>
{{ $items->links() }}
@endsection