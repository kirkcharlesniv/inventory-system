@if($materials == 'yes')
    <h3>Materials</h3>
@else
    <h3>Tools and Equipments</h3>
@endif
<table class="table table-striped display">
    <thead class="text-primary">
        <tr>
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
                        @case(7)
                            Set/s
                            @break
                        @case(8)
                            Unit/s
                            @break
                        @case('null')
                            N/A
                            @break
                        @default
                            N/A
                            @break
                    @endswitch</td>
                <td>{{ $item->initial_stocks }}</td>
                <td>{{ $item->remaining_stocks }}</td>
                <td>
                    <a class="btn btn-info" href="home/items/{{$item->id}}">Show/Delete</a>
                    <a class="btn btn-info" href="home/items/{{$item->id}}/edit">Edit/Add Value</a>
                    @if($item->inventory_type == 1)
                        <button type="button" class="open-editItemValueDialog btn btn-info" data-id="{{$item->id}}" data-max="{{$item->remaining_stocks}}" data-toggle="modal" data-target="#editItemValue">Decrement</button>
                    @endif
                </td>
            </tr>
        @endforeach
    @else
        <span><b>No entry was found.</b></span>
    @endif
    </tbody>
</table>