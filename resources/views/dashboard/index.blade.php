@extends('layouts.dashboard')

@section('page_title', 'Dashboard')

@section('card_title', "Dashboard")

@section('custom_content_top')
<div class="modal fade" id="editItemValue" tabindex="-1" role="dialog" aria-labelledby="editItemValueCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editItemValueLongTitle">Decrement Value</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <form class="form-inline">
                            <div class="form-group">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">-</div>
                                    </div>
                                    <form>
                                        <input type="text" class="form-control" id="decrementValue" placeholder="Decrement Value" min="1" max="1">
                                        <br>
                                        <button id="decrement_btn" class="decrementButton btn btn-info">Save</button>
                                    </form>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('card_body')
    <a class="btn btn-info btn-block" href="{{ URL::to('home/items') }}">Show All</a>
    <div class="row">
        <div class="col-md-3">
            <button class="btn btn-info btn-block" id="smaw">SMAW NC I</button>
        </div>
        <div class="col-md-3">
            <button class="btn btn-info btn-block" id="pipefitting">Pipefitting NC II</button>
        </div>
        <div class="col-md-3">
            <button class="btn btn-info btn-block" id="dress">Dressmaking NC II</button>
        </div>
        <div class="col-md-3">
            <button class="btn btn-info btn-block" id="cons">Construction Painting NC II</button>
        </div>
    </div>
    <button class="btn btn-info btn-block" id="office">Office Supply</button>
@endsection

@section('custom_content_bottom')
    <div class="row" id="smaw_content" style="display:none">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">SMAW NC I</h4>
                </div>
                <div class="card-body">
                    @include('layouts.tools_equipments', ['items' => $smaws_m])
                    <br> <hr> <br>
                    @include('layouts.materials', ['items' => $smaws_t])
                </div>
            </div>
        </div>
    </div>
    <div class="row" id="pipefitting_content" style="display:none">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Pipefitting NC II</h4>
                </div>
                <div class="card-body">
                    <h3>Tools and Equipments</h3>
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                            <th>Stock Code</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Initial Stocks</th>
                            <th>Remaining Stocks</th>
                            <th>Links</th>
                            </thead>
                            <tbody>
                            @if(count($pipes_t) > 0)
                                @foreach($pipes_t as $pipe)
                                    <tr>
                                        <td>{{ $pipe->stock_code }}</td>
                                        <td>{{ $pipe->name }}</td>
                                        <td>{{ $pipe->description }}</td>
                                        <td>{{ $pipe->initial_stocks }}</td>
                                        <td>{{ $pipe->remaining_stocks }}</td>
                                        <td>
                                            <div class="row">
                                                <div class="col-md-6"><a class="btn btn-info" href="home/items/{{$pipe->id}}">Show/Delete</a></div>
                                                <div class="col-md-6"><a class="btn btn-info" href="home/items/{{$pipe->id}}/edit">Edit</a></div>
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
                    <br>
                    <hr>
                    <br>
                    <h3>Materials</h3>
                    <div class="table-responsive">
                        <table class="table">
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
                            @if(count($pipes_m) > 0)
                                @foreach($pipes_m as $pipe)
                                    <tr>
                                        <td>{{ $pipe->stock_code }}</td>
                                        <td>{{ $pipe->name }}</td>
                                        <td>{{ $pipe->description }}</td>
                                        <td>@switch($pipe->material_unit)
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
                                        <td>{{ $pipe->initial_stocks }}</td>
                                        <td>{{ $pipe->remaining_stocks }}</td>
                                        <td>
                                            <div class="row">
                                                <div class="col-md-6"><a class="btn btn-info" href="home/items/{{$pipe->id}}">Show/Delete</a></div>
                                                <div class="col-md-6"><a class="btn btn-info" href="home/items/{{$pipe->id}}/edit">Edit/Add Value</a></div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <button type="button" class="open-editItemValueDialog btn btn-info" data-id="{{$pipe->id}}" data-max="{{$pipe->remaining_stocks}}" data-toggle="modal" data-target="#editItemValue">Decrement</button>
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
                </div>
            </div>
        </div>
    </div>
    <div class="row" id="dress_content" style="display:none">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Dressmaking NC II</h4>
                </div>
                <div class="card-body">
                    <h3>Tools and Equipments</h3>
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                            <th>Stock Code</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Initial Stocks</th>
                            <th>Remaining Stocks</th>
                            <th>Links</th>
                            </thead>
                            <tbody>
                            @if(count($dresses_t) > 0)
                                @foreach($dresses_t as $dress)
                                    <tr>
                                        <td>{{ $dress->stock_code }}</td>
                                        <td>{{ $dress->name }}</td>
                                        <td>{{ $dress->description }}</td>
                                        <td>{{ $dress->initial_stocks }}</td>
                                        <td>{{ $dress->remaining_stocks }}</td>
                                        <td>
                                            <div class="row">
                                                <div class="col-md-6"><a class="btn btn-info" href="home/items/{{$dress->id}}">Show/Delete</a></div>
                                                <div class="col-md-6"><a class="btn btn-info" href="home/items/{{$dress->id}}/edit">Edit</a></div>
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
                    <br>
                    <hr>
                    <br>
                    <h3>Materials</h3>
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                            <th>Stock Code</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Unit</th>
                            <th>Initial Stocks</th>
                            <th>Remaining Stocks</th>
                            <th>Links</th>
                            </thead>
                            <tbody>
                            @if(count($dresses_m) > 0)
                                @foreach($dresses_m as $dress)
                                    <tr>
                                        <td>{{ $dress->stock_code }}</td>
                                        <td>{{ $dress->name }}</td>
                                        <td>{{ $dress->description }}</td>
                                        <td><td>@switch($dress->material_unit)
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
                                        <td>{{ $dress->initial_stocks }}</td>
                                        <td>{{ $dress->remaining_stocks }}</td>
                                        <td>
                                            <div class="row">
                                                <div class="col-md-6"><a class="btn btn-info" href="home/items/{{$dress->id}}">Show/Delete</a></div>
                                                <div class="col-md-6"><a class="btn btn-info" href="home/items/{{$dress->id}}/edit">Edit/Add Value</a></div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <button type="button" class="open-editItemValueDialog btn btn-info" data-id="{{$dress->id}}" data-max="{{$dress->remaining_stocks}}" data-toggle="modal" data-target="#editItemValue">Decrement</button>
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
                </div>
            </div>
        </div>
    </div>
    <div class="row" id="cons_content" style="display:none">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Construction Supply NC II</h4>
                </div>
                <div class="card-body">
                    <h3>Tools and Equipments</h3>
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                            <th>Stock Code</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Initial Stocks</th>
                            <th>Remaining Stocks</th>
                            <th>Links</th>
                            </thead>
                            <tbody>
                            @if(count($conses_t) > 0)
                                @foreach($conses_t as $cons)
                                    <tr>
                                        <td>{{ $cons->stock_code }}</td>
                                        <td>{{ $cons->name }}</td>
                                        <td>{{ $cons->description }}</td>
                                        <td>{{ $cons->initial_stocks }}</td>
                                        <td>{{ $cons->remaining_stocks }}</td>
                                        <td>
                                            <div class="row">
                                                <div class="col-md-6"><a class="btn btn-info" href="home/items/{{$cons->id}}">Show/Delete</a></div>
                                                <div class="col-md-6"><a class="btn btn-info" href="home/items/{{$cons->id}}/edit">Edit</a></div>
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
                    <br>
                    <hr>
                    <br>
                    <h3>Materials</h3>
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                            <th>Stock Code</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Unit</th>
                            <th>Initial Stocks</th>
                            <th>Remaining Stocks</th>
                            <th>Links</th>
                            </thead>
                            <tbody>
                            @if(count($conses_m) > 0)
                                @foreach($conses_m as $cons)
                                    <tr>
                                        <td>{{ $cons->stock_code }}</td>
                                        <td>{{ $cons->name }}</td>
                                        <td>{{ $cons->description }}</td>
                                        <td>@switch($cons->material_unit)
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
                                        <td>{{ $cons->initial_stocks }}</td>
                                        <td>{{ $cons->remaining_stocks }}</td>
                                        <td>
                                            <div class="row">
                                                <div class="col-md-6"><a class="btn btn-info" href="home/items/{{$cons->id}}">Show/Delete</a></div>
                                                <div class="col-md-6"><a class="btn btn-info" href="home/items/{{$cons->id}}/edit">Edit/Add Value</a></div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <button type="button" class="open-editItemValueDialog btn btn-info" data-id="{{$cons->id}}" data-max="{{$cons->remaining_stocks}}" data-toggle="modal" data-target="#editItemValue">Decrement</button>
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
                </div>
            </div>
        </div>
    </div>
    <div class="row" id="office_content" style="display:none">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Office Supply</h4>
                </div>
                <div class="card-body">
                    <h3>Tools and Equipments</h3>
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                            <th>Stock Code</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Initial Stocks</th>
                            <th>Remaining Stocks</th>
                            <th>Links</th>
                            </thead>
                            <tbody>
                            @if(count($offices_t) > 0)
                                @foreach($offices_t as $office)
                                    <tr>
                                        <td>{{ $office->stock_code }}</td>
                                        <td>{{ $office->name }}</td>
                                        <td>{{ $office->description }}</td>
                                        <td>{{ $office->initial_stocks }}</td>
                                        <td>{{ $office->remaining_stocks }}</td>
                                        <td>
                                            <div class="row">
                                                <div class="col-md-6"><a class="btn btn-info" href="home/items/{{$office->id}}">Show/Delete</a></div>
                                                <div class="col-md-6"><a class="btn btn-info" href="home/items/{{$office->id}}/edit">Edit</a></div>
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
                    <br>
                    <hr>
                    <br>
                    <h3>Materials</h3>
                    <div class="table-responsive">
                        <table class="table">
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
                            @if(count($offices_m) > 0)
                                @foreach($offices_m as $office)
                                    <tr>
                                        <td>{{ $office->stock_code }}</td>
                                        <td>{{ $office->name }}</td>
                                        <td>{{ $office->description }}</td>
                                        <td>@switch($office->material_unit)
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
                                        <td>{{ $office->initial_stocks }}</td>
                                        <td>{{ $office->remaining_stocks }}</td>
                                        <td>
                                            <div class="row">
                                                <div class="col-md-6"><a class="btn btn-info" href="home/items/{{$office->id}}">Show/Delete</a></div>
                                                <div class="col-md-6"><a class="btn btn-info" href="home/items/{{$office->id}}/edit">Edit/Add Value</a></div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <button type="button" class="open-editItemValueDialog btn btn-info" data-id="{{$office->id}}" data-max="{{$office->remaining_stocks}}" data-toggle="modal" data-target="#editItemValue">Decrement</button>
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
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function () {
            var decrement_value;
            var item_id;
            var max_value;
            $(document).on("click", ".open-editItemValueDialog", function () {
                item_id = $(this).data('id');
                max_value = $(this).data('max').toString().replace(/\s/g,'');
                max_value = parseInt(max_value);
            });
            $(document).on("click", ".decrementButton", function () {
                decrement_value = $('#decrementValue').val().toString();
                if (decrement_value > max_value && max_value !== 0) {
                    alert('You shouldn\'t go higher than ' + max_value + '.');
                } else {
                    $.ajax({
                        type : 'get',
                        url : '{{URL::to('home/items/decrement')}}',
                        data: {'id': item_id, 'value': decrement_value},
                        success: function() {
                            location.reload();
                        }
                    });
                }
            });
            $("#smaw").click(function () {
                $("#pipefitting_content").fadeOut();
                $("#dress_content").fadeOut();
                $("#cons_content").fadeOut();
                $("#office_content").fadeOut();
                setTimeout(
                    function () {
                        $("#smaw_content").fadeIn();
                    }, 800
                );
            });
            $("#pipefitting").click(function () {
                $("#smaw_content").fadeOut();
                $("#dress_content").fadeOut();
                $("#cons_content").fadeOut();
                $("#office_content").fadeOut();
                setTimeout(
                    function () {
                        $("#pipefitting_content").fadeIn();
                    }, 800
                );
            });
            $("#cons").click(function () {
                $("#smaw_content").fadeOut();
                $("#dress_content").fadeOut();
                $("#pipefitting_content").fadeOut();
                $("#office_content").fadeOut();
                setTimeout(
                    function () {
                        $("#cons_content").fadeIn();
                    }, 800
                );
            });
            });
            $("#dress").click(function () {
                $("#smaw_content").fadeOut();
                $("#pipefitting_content").fadeOut();
                $("#cons_content").fadeOut();
                $("#office_content").fadeOut();
                setTimeout(
                    function () {
                        $("#dress_content").fadeIn();
                    }, 800
                );
        });
        $("#office").click(function () {
            $("#smaw_content").fadeOut();
            $("#pipefitting_content").fadeOut();
            $("#cons_content").fadeOut();
            $("#dress_content").fadeOut();
            setTimeout(
                function () {
                    $("#office_content").fadeIn();
                }, 800
            );
        });
    </script>
    <script type="text/javascript">
        $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
    </script>
@endsection