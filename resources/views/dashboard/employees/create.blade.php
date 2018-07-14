@extends('layouts.dashboard')

@section('page_title', 'Register a New Employee')

@section('card_title', 'Register a New Employee Entry')
@section('card_body')
    {!! Form::open(['action' => 'EmployeesController@store', 'method' => 'POST', 'files' => true]) !!}
    <div class="form-group">
        {{Form::label('id_num', 'ID Number')}}
        {{Form::text('id_num', '', ['class' => 'form-control', 'required' => 'required'])}}
    </div>
    <div class="form-group">
        {{Form::label('name', 'Name')}}
        {{Form::text('name', '', ['class' => 'form-control', 'required' => 'required'])}}
    </div>
    <div class="form-group">
        {{Form::label('address', 'Address')}}
        {{Form::text('address', '', ['class' => 'form-control', 'required' => 'required'])}}
    </div>
    <div class="form-group">
        {{Form::label('phone', 'Phone Number')}}
        {{Form::text('phone', '09', ['class' => 'form-control phonenumber', 'required' => 'required', 'minlength' => '11', 'maxlength' => '11'])}}
    </div>
    <div class="form-group">
        {{Form::label('tin_number', 'TIN Number')}}
        {{Form::text('tin_number', '', ['class' => 'form-control tin_mask', 'required' => 'required'])}}
    </div>
    <div class="form-group">
        {{Form::label('picture', 'Click me to add a Profile Picture')}}
        {{Form::file('picture')}}
    </div>
    {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
    <script>
        $(document).ready(function($){
            $('.tin_mask').mask("999-999-999");
            $('.phonenumber').mask("09#########");
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
@endsection