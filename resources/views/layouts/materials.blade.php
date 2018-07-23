<h3>Materials</h3>
<div class="table-responsive">
    <table class="table table-striped display">
        <thead class="text-primary">
            <tr>
                <th>Stock Code</th>
                <th>Name</th>
                <th>Description</th>
                <th>Unit</th>
                <th>Initial Stocks</th>
                <th>Remaining Stocks</th>
                <th>Links</th>
            </tr>
        </thead>
        <tbody>
        @if(count($items) > 0)
            @foreach($items as $item)
                <tr>
                    <td>{{ $item->stock_code }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->description }}</td>
                    <td>@switch($item->material_unit)
                            @case(0)
                                Ream/s
                            @break
                            @case(1)
                                Box/es
                            @break
                            @case(2)
                                Kilogram/s
                            @break
                            @case(3)
                                Piece/s
                            @break
                            @case(4)
                                Liter/s
                            @break
                            @case(5)
                                Gallon/s
                            @break
                            @case(6)
                                Quart/s
                            @break
                        @endswitch</td>
                    <td>{{ $item->initial_stocks }}</td>
                    <td>{{ $item->remaining_stocks }}</td>
                    <td>
                        <a class="btn btn-info" href="home/items/{{$item->id}}">Show/Delete</a>
                        <a class="btn btn-info" href="home/items/{{$item->id}}/edit">Edit/Add Value</a>
                        <button type="button" class="open-editItemValueDialog btn btn-info" data-id="{{$item->id}}" data-max="{{$item->remaining_stocks}}" data-toggle="modal" data-target="#editItemValue">Decrement</button>
                    </td>
                </tr>
            @endforeach
        @else
            <span><b>No entry was found.</b></span>
        @endif
        </tbody>
    </table>
</div>