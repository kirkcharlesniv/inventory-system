<h3>Tools and Equipments</h3>
<div class="">
    <table class="table table-striped display">
        <thead class="text-primary">
        <th>Stock Code</th>
        <th>Name</th>
        <th>Description</th>
        <th>Unit</th>
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
                        <a class="btn btn-info" href="home/items/{{$item->id}}">Show/Delete</a>
                        <a class="btn btn-info" href="home/items/{{$item->id}}/edit">Edit</a>
                    </td>
                </tr>
            @endforeach
        @else
            <span><b>No entry was found.</b></span>
        @endif
        </tbody>
    </table>
</div>