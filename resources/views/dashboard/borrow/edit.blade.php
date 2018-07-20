@extends('layouts.dashboard')

@section('page_title', 'Borrowed Item\'s Edit Form')

@section('card_title', 'Edit a record')
@section('card_body')
    <p>Stats: <br> Stock Code: {{ $item->stock_code }} <br>
        Item Name: {{ $item->name }} <br>
        Borrow ID: {{ $borrow->borrow_id }} <br><br>
        You borrowed: {{ $borrow->borrowed }} <br>
        You returned: {{ $borrow->returned }}</p>
    {!! Form::open(['action' => ['BorrowsController@update', $borrow->borrow_id], 'method' => 'POST']) !!}
    <div class="form-group">
        {{Form::label('return_number', 'Amount to Return')}}
        {{Form::number('return_number', '', ['class' => 'form-control', 'required' => 'required', 'max' => abs($borrow->borrowed - $borrow->returned)])}}
    </div>
    {{Form::hidden('item_id', $borrow->item_id)}}
    {{Form::hidden('_method', 'PUT')}}
    {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}

    {!! Form::open(['action' => ['BorrowsController@destroy', $borrow->borrow_id], 'method' => 'POST']) !!}
    {{Form::hidden('_method', 'DELETE')}}
    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
    {!! Form::close() !!}
@endsection