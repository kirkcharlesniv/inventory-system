@extends('layouts.dashboard')

@section('page_title', 'Borrowed Item\'s Record')

@section('card_title', "See the records for the borrowed items, you can also delete the record.")
@section('card_body')
    <table class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>Item Name</th>
            <th>Borrowed</th>
            <th>Returned</th>
            <th>Borrowed at</th>
            <th>Returned at</th>
            <th>Links</th>
        </tr>
        </thead>
        <tbody id="employee-records">
        <tr>
            <td>{{ $item->name }}</td>
            <td>{{ $borrow->borrowed }}</td>
            <td>{{ $borrow->returned }}</td>
            <td>{{ $borrow->created_at }}</td>
            <td>{{ $borrow->updated_at }}</td>
            <td>{!! Form::open(['action' => ['BorrowsController@destroy', $borrow->borrow_id], 'method' => 'POST']) !!}
                {{ Form::hidden('_method', 'DELETE') }}
                {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                {!! Form::close() !!}</td>
        </tr>
        </tbody>
    </table>
@endsection