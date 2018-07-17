@extends('layouts.dashboard')

@section('page_title', 'Inventory')

@section('card_title')
    {{ $item->name }} Records
@endsection

@section('card_body')
    <div class="table-responsive">
        <table class="table">
            <thead class=" text-primary">
            <th>Stock Code</th>
            <th>Name</th>
            <th>Description</th>
            <th>Initial Stocks</th>
            <th>Remaining Stocks</th>
            <th>Delete</th>
            </thead>
            <tbody>
            @if(!empty($item))
                <tr>
                    <td>{{ $item->stock_code }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->description }}</td>
                    <td>{{ $item->initial_stocks }}</td>
                    <td>{{ $item->remaining_stocks }}</td>
                    <td>
                        {!! Form::open(['action' => ['ItemsController@destroy', $item->id], 'method' => 'POST']) !!}
                        {{ Form::hidden('_method', 'DELETE') }}
                        {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endif
            </tbody>
        </table>
    </div>
@endsection