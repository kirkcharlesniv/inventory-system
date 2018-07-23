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
    <a class="btn btn-success btn-block" href="{{ URL::to('home/items') }}">Show All</a>
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
                    @include('layouts.tools_equipments', ['items' => $smaws_m, 'table_id' => 1])
                    <br> <hr> <br>
                    @include('layouts.materials', ['items' => $smaws_t, 'table_id' => 2])
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
                    @include('layouts.tools_equipments', ['items' => $pipes_t, 'table_id' => 3])
                    <br> <hr> <br>
                    @include('layouts.materials', ['items' => $pipes_m, 'table_id' => 4])
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
                    @include('layouts.tools_equipments', ['items' => $dresses_t, 'table_id' => 5])
                    <br> <hr> <br>
                    @include('layouts.materials', ['items' => $dresses_m, 'table_id' => 6])
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
                    @include('layouts.tools_equipments', ['items' => $conses_t, 'table_id' => 7])
                    <br> <hr> <br>
                    @include('layouts.materials', ['items' => $conses_m, 'table_id' => 8])
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
                    @include('layouts.tools_equipments', ['items' => $offices_t, 'table_id' => 9])
                    <br> <hr> <br>
                    @include('layouts.materials', ['items' => $offices_m, 'table_id' => 10])
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function () {
            var decrement_value;
            var item_id;
            var max_value;
            var table = $('table.display').DataTable({
                "scrollY":        "200px",
                "scrollCollapse": true,
                "paging":         false
            });
            table.columns.adjust().draw();
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
        });
    </script>
    <script type="text/javascript">
        $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
    </script>
@endsection