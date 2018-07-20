@extends('layouts.dashboard')

@section('page_title', 'Borrow Form')

@section('card_title', 'Borrow an Item')
@section('card_body')
    {!! Form::open(['action' => 'BorrowsController@store', 'method' => 'POST']) !!}
    <div class="form-group">
        <label for="name_search">Search for Employee Name</label>
        <input type="text" class="form-controller form-control" id="name_search" name="name_search">
    </div>
    <div class="form-group">
        <label for="name_selection">Select a Employee</label>
        <select class="custom-select custom-select-sm form-group" id="name_selection" name="name_selection">
            <option selected>Select a Employee</option>
        </select>
    </div>
    <div class="form-group">
        <label for="search">Search for Item Name</label>
        <input type="text" class="form-controller form-control" id="search" name="search">
    </div>
    <div class="form-group">
        <label for="item_selection">Select A Item</label>
        <select class="custom-select custom-select-sm form-group" id="item_selection" name="item_selection">
            <option selected>Select a item</option>
        </select>
    </div>
    <div class="form-group">
        {{Form::label('borrow_number', 'Amount to Borrow')}}
        {{Form::number('borrow_number', '', ['class' => 'form-control', 'required' => 'required', 'min' => 1])}}
    </div>
    {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}

    <script type="text/javascript">
    </script>
    <script type="text/javascript">
        var max;
        $('#search').on('keyup',function(){
            $value=$(this).val();
            $.ajax({
                type : 'get',
                url : '{{URL::to('home/borrow/search')}}',
                data:{'search':$value},
                success:function(data){
                    $("#item_selection").html(data);
                }
            });
        });
        $("#item_selection").on('change', function() {
            max = $(this).find(':selected').data('max');
            $("#borrow_number").attr("max", max);
        });
        $('#name_search').on('keyup',function(){
            $value=$(this).val();
            $.ajax({
                type : 'get',
                url : '{{URL::to('home/borrow/employeenames')}}',
                data:{'name_search':$value},
                beforeSend: function () {
                    $("#name_selection").find('option')
                        .remove()
                        .end();
                },
                success:function(data){
                    $("#name_selection").html(data);
                }
            });
        });

    </script>
    <script type="text/javascript">
        $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
    </script>
@endsection