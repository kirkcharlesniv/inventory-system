@extends('layouts.dashboard')

@section('page_title', 'Create New Item')

@section('card_title', 'Edit Item Entry')
@section('card_body')
    {!! Form::open(['action' => ['ItemsController@update', $item->id], 'method' => 'POST']) !!}
    <div class="form-group">
        {{ Form::label('stock_type', 'Stock Type') }}
        {{ Form::select('stock_type', ['0' => 'SMAW NC I', '1' => 'Pipefitting  NC II', '2' =>'Dressmaking NC 2', '3' => 'Construction Painting NC II', '4' => 'Office Supply'], $item->stock_type, ['class' => 'form-control']) }}
    </div>
    <div class="form-group">
        {{ Form::label('inventory_type', 'Inventory Type') }}
        {{ Form::select('inventory_type', ['0' => 'Tools and Equipments', '1' => 'Material'], $item->inventory_type, ['class' => 'form-control']) }}
    </div>
    <div class="form-group" id="materialDiv">
        {{ Form::label('material_unit', 'Material Type') }}
        {{ Form::select('inventory_type', ['null' => '--- Select a Material Unit (Ignore if Tools & Materials) ---','0' => 'Ream/s', '1' => 'Box/es', '2' => 'Kilogram/s', '3' => 'Piece/s', '4' => 'Liter/s', '5' => 'Gallon/s', '6' => 'Quart/s'], $item->material_unit, ['class' => 'form-control']) }}
    </div>
    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', $item->name, ['class' => 'form-control', 'required' => 'required']) }}
    </div>
    <div class="form-group">
        {{ Form::label('stock_code', 'Stock Code') }}
        {{ Form::text('stock_code', $item->stock_code, ['class' => 'form-control', 'required' => 'required']) }}
    </div>
    <div class="form-group">
        {{ Form::label('description', 'Description') }}
        {{ Form::text('description', $item->description, ['class' => 'form-control', 'required' => 'required']) }}
    </div>
    <div class="form-group">
        {{ Form::label('initial_stocks', 'Initial Stocks') }}
        {{ Form::number('initial_stocks', $item->initial_stocks, ['class' => 'form-control', 'required' => 'required']) }}
    </div>
    <div class="form-group">
        {{ Form::label('remaining_stocks', 'Remaining Stocks') }}
        {{ Form::number('remaining_stocks', $item->remaining_stocks, ['class' => 'form-control', 'required' => 'required']) }}
    </div>
    {{ Form::hidden('_method', 'PUT') }}
    {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
    {!! Form::close() !!}
@endsection