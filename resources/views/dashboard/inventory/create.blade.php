@extends('layouts.dashboard')

@section('page_title', 'Create New Item')

@section('card_title', 'Create New Item Entry')
@section('card_body')
    {!! Form::open(['action' => 'ItemsController@store', 'method' => 'POST']) !!}
    <div class="form-group">
        {{ Form::label('stock_type', 'Stock Type') }}
        {{ Form::select('stock_type', ['0' => 'SMAW NC I', '1' => 'Pipefitting  NC II', '2' =>'Dressmaking NC 2', '3' => 'Construction Painting NC II', '4' => 'Office Supply'], '0', ['class' => 'form-control']) }}
    </div>
    <div class="form-group">
        {{ Form::label('inventory_type', 'Inventory Type') }}
        {{ Form::select('inventory_type', ['0' => 'Tools and Equipments', '1' => 'Material'], '0', ['class' => 'form-control']) }}
    </div>
    <div class="form-group" id="materialDiv" style="display:none">
        {{ Form::label('material_unit', 'Material Type') }}
        <select class="form-control" id="material_unit">
            <option selected disabled value="null">--- Select a material type ---</option>
            <option value="0">Ream/s</option>
            <option value="1">Box/es</option>
            <option value="2">Kilogram/s</option>
            <option value="3">Piece/s</option>
            <option value="4">Liter/s</option>
            <option value="5">Gallon/s</option>
            <option value="6">Quart/s</option>
        </select>
    </div>
    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', '', ['class' => 'form-control', 'required' => 'required']) }}
    </div>
    <div class="form-group">
        {{ Form::label('stock_code', 'Stock Code') }}
        {{ Form::text('stock_code', '', ['class' => 'form-control', 'required' => 'required']) }}
    </div>
    <div class="form-group">
        {{ Form::label('description', 'Description') }}
        {{ Form::text('description', '', ['class' => 'form-control', 'required' => 'required']) }}
    </div>
    <div class="form-group">
        {{ Form::label('initial_stocks', 'Initial Stocks') }}
        {{ Form::number('initial_stocks', '', ['class' => 'form-control', 'required' => 'required']) }}
    </div>
    {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
    {!! Form::close() !!}
    <script>
        $('#inventory_type').on('change', function () {
            if($('#inventory_type').find(":selected").text() > 0) {
                $('#materialDiv').show()
            } else {
                $('#materialDiv').hide()
            }
        });
    </script>
@endsection