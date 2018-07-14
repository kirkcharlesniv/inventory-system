@extends('layouts.dashboard')

@section('page_title', 'Borrowed Items\' Records')

@section('card_title', "See the records for the borrowed items")
@section('card_body')
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
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>Item Name</th>
                <th>Stock Code</th>
                <th>Borrowed</th>
                <th>Returned</th>
                <th>Borrowed at</th>
                <th>Returned at</th>
                <th>Links</th>
            </tr>
        </thead>
        <tbody id="employee-records">
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>
    <script type="text/javascript">
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

                    $name=$("#name_selection").val();
                    $.ajax({
                        type : 'get',
                        url : '{{URL::to('home/borrow/employeerecords')}}',
                        data:{'search':$name},
                        beforeSend: function() {
                            $('#employee-records').html("");
                        },
                        success:function(data){
                            $('#employee-records').html(data);
                        }
                    });
                }
            });
        })
    </script>
    <script type="text/javascript">
        $('#name_selection').on('change',function(){
            $value=$(this).val();
            $.ajax({
                type : 'get',
                url : '{{URL::to('home/borrow/employeerecords')}}',
                data:{'search':$value},
                beforeSend: function() {
                    $('#employee-records').html("");
                },
                success:function(data){
                    $('#employee-records').html(data);
                }
            });
        })
    </script>
    <script type="text/javascript">
        $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
    </script>
@endsection