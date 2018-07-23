<h3>Materials</h3>
<div class="table-responsive">
    <table class="table table-striped table-fixed">
        <thead class="text-primary">
            <tr>
                <th class="col-md-2">Stock Code</th>
                <th class="col-md-2">Name</th>
                <th class="col-md-2">Description</th>
                <th class="col-md-2">Unit</th>
                <th class="col-md-2">Initial Stocks</th>
                <th class="col-md-2">Remaing Stocks</th>
                <th class="col-md-2">Links</th>
            </tr>
        {{--<th>Stock Code</th>--}}
        {{--<th>Name</th>--}}
        {{--<th>Description</th>--}}
        {{--<th>Unit</th>--}}
        {{--<th>Initial Stocks</th>--}}
        {{--<th>Remaining Stocks</th>--}}
        {{--<th>Links</th>--}}
        </thead>
        <tbody>
        @if(count($items) > 0)
            @foreach($items as $item)
                {{--<tr>--}}
                    {{--<td>{{ $item->stock_code }}</td>--}}
                    {{--<td>{{ $item->name }}</td>--}}
                    {{--<td>{{ $item->description }}</td>--}}
                    {{--<td>@switch($item->material_unit)--}}
                            {{--@case(0)--}}
                                {{--Ream/s--}}
                            {{--@break--}}
                            {{--@case(1)--}}
                                {{--Box/es--}}
                            {{--@break--}}
                            {{--@case(2)--}}
                                {{--Kilogram/s--}}
                            {{--@break--}}
                            {{--@case(3)--}}
                                {{--Piece/s--}}
                            {{--@break--}}
                            {{--@case(4)--}}
                                {{--Liter/s--}}
                            {{--@break--}}
                            {{--@case(5)--}}
                                {{--Gallon/s--}}
                            {{--@break--}}
                            {{--@case(6)--}}
                                {{--Quart/s--}}
                            {{--@break--}}
                        {{--@endswitch</td>--}}
                    {{--<td>{{ $item->initial_stocks }}</td>--}}
                    {{--<td>{{ $item->remaining_stocks }}</td>--}}
                    {{--<td>--}}
                        {{--<div class="row">--}}
                            {{--<div class="col-md-6"><a class="btn btn-info" href="home/items/{{$item->id}}">Show/Delete</a></div>--}}
                            {{--<div class="col-md-6"><a class="btn btn-info" href="home/items/{{$item->id}}/edit">Edit/Add Value</a></div>--}}
                        {{--</div>--}}
                        {{--<br>--}}
                        {{--<div class="row">--}}
                            {{--<div class="col-md-12">--}}
                                {{--<button type="button" class="open-editItemValueDialog btn btn-info" data-id="{{$item->id}}" data-max="{{$item->remaining_stocks}}" data-toggle="modal" data-target="#editItemValue">Decrement</button>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</td>--}}
                {{--</tr>--}}
                <tr>
                    <td class="col-md-2">{{ $item->stock_code }}</td>
                    <td class="col-md-2">{{ $item->name }}</td>
                    <td class="col-md-2">{{ $item->description }}</td>
                    <td class="col-md-2">@switch($item->material_unit)
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
                    <td class="col-md-2">{{ $item->initial_stocks }}</td>
                    <td class="col-md-2">{{ $item->remaining_stocks }}</td>
                    <td class="col-md-2">
                        <div class="row">
                            <div class="col-md-6"><a class="btn btn-info" href="home/items/{{$item->id}}">Show/Delete</a></div>
                            <div class="col-md-6"><a class="btn btn-info" href="home/items/{{$item->id}}/edit">Edit/Add Value</a></div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <button type="button" class="open-editItemValueDialog btn btn-info" data-id="{{$item->id}}" data-max="{{$item->remaining_stocks}}" data-toggle="modal" data-target="#editItemValue">Decrement</button>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        @else
            <span><b>No entry was found.</b></span>
        @endif
        </tbody>
    </table>
</div>