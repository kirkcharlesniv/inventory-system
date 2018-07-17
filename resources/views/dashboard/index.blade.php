@extends('layouts.dashboard')

@section('page_title', 'Dashboard')

@section('card_title', "Dashboard")
@section('card_body')
    <a class="btn btn-success btn-block" href="home/items">Show All</a>
    <div class="row">
        <div class="col-md-3">
            <button class="btn btn-primary btn-block" id="smaw">SMAW NC I</button>
        </div>
        <div class="col-md-3">
            <button class="btn btn-primary btn-block" id="pipefitting">Pipefitting NC II</button>
        </div>
        <div class="col-md-3">
            <button class="btn btn-primary btn-block" id="dress">Dressmaking NC II</button>
        </div>
        <div class="col-md-3">
            <button class="btn btn-primary btn-block" id="cons">Construction Painting NC II</button>
        </div>
    </div>
    <button class="btn btn-primary btn-block" id="office">Office Supply</button>
@endsection

@section('custom_content_bottom')
    <div class="row" id="smaw_content" style="display:none">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">SMAW NC I</h4>
                </div>
                <div class="card-body">
                    <h3>Tools and Equipments</h3>
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
                        @if(count($smaws_t) > 0)
                            @foreach($smaws_t as $smaw)
                                <tr>
                                    <td>{{ $smaw->stock_code }}</td>
                                    <td>{{ $smaw->name }}</td>
                                    <td>{{ $smaw->description }}</td>
                                    <td>{{ $smaw->initial_stocks }}</td>
                                    <td>{{ $smaw->remaining_stocks }}</td>
                                    <td>
                                        <a class="btn btn-primary" href="home/items/{{$smaw->id}}">Show/Edit</a>
                                        <a class="btn btn-primary" href="home/items/{{$smaw->id}}/edit">Edit</a>
                                        <br><br>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <span><b>No entry was found.</b></span>
                        @endif
                        </tbody>
                    </table>
                    <br>
                    <hr>
                    <br>
                    <h3>Materials</h3>
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
                        @if(count($smaws_m) > 0)
                            @foreach($smaws_m as $smaw)
                                <tr>
                                    <td>{{ $smaw->stock_code }}</td>
                                    <td>{{ $smaw->name }}</td>
                                    <td>{{ $smaw->description }}</td>
                                    <td>{{ $smaw->initial_stocks }}</td>
                                    <td>{{ $smaw->remaining_stocks }}</td>
                                    <td>
                                        <a class="btn btn-primary" href="home/items/{{$smaw->id}}">Show/Delete</a>
                                        <br><br>
                                        <a class="btn btn-warning" href="home/items/{{$smaw->id}}/edit">Edit</a>
                                        <a class="btn btn-danger" href="home/items/decrement/{{$smaw->id}}">-</a>
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
    <div class="row" id="pipefitting_content" style="display:none">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Pipefitting NC II</h4>
                </div>
                <div class="card-body">
                    <h3>Tools and Equipments</h3>
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
                                        <a class="btn btn-primary" href="home/items/{{$pipe->id}}">Show/Delete</a>
                                        <a class="btn btn-primary" href="home/items/{{$pipe->id}}/edit">Edit</a>
                                        <br><br>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <span><b>No entry was found.</b></span>
                        @endif
                        </tbody>
                    </table>
                    <br>
                    <hr>
                    <br>
                    <h3>Materials</h3>
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
                        @if(count($pipes_m) > 0)
                            @foreach($pipes_m as $pipe)
                                <tr>
                                    <td>{{ $pipe->stock_code }}</td>
                                    <td>{{ $pipe->name }}</td>
                                    <td>{{ $pipe->description }}</td>
                                    <td>{{ $pipe->initial_stocks }}</td>
                                    <td>{{ $pipe->remaining_stocks }}</td>
                                    <td>
                                        <a class="btn btn-primary" href="home/items/{{$pipe->id}}">Show/Delete</a>
                                        <br><br>
                                        <a class="btn btn-warning" href="home/items/{{$pipe->id}}/edit">Edit</a>
                                        <a class="btn btn-danger" href="home/items/decrement/{{$pipe->id}}">-</a>
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
    <div class="row" id="dress_content" style="display:none">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Dressmaking NC II</h4>
                </div>
                <div class="card-body">
                    <h3>Tools and Equipments</h3>
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
                                        <a class="btn btn-primary" href="home/items/{{$dress->id}}">Show/Delete</a>
                                        <a class="btn btn-primary" href="home/items/{{$dress->id}}/edit">Edit</a>
                                        <br><br>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <span><b>No entry was found.</b></span>
                        @endif
                        </tbody>
                    </table>
                    <br>
                    <hr>
                    <br>
                    <h3>Materials</h3>
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
                        @if(count($dresses_m) > 0)
                            @foreach($dresses_m as $dress)
                                <tr>
                                    <td>{{ $dress->stock_code }}</td>
                                    <td>{{ $dress->name }}</td>
                                    <td>{{ $dress->description }}</td>
                                    <td>{{ $dress->initial_stocks }}</td>
                                    <td>{{ $dress->remaining_stocks }}</td>
                                    <td>
                                        <a class="btn btn-primary" href="home/items/{{$dress->id}}">Show/Delete</a>
                                        <br><br>
                                        <a class="btn btn-warning" href="home/items/{{$dress->id}}/edit">Edit</a>
                                        <a class="btn btn-danger" href="home/items/decrement/{{$dress->id}}">-</a>
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
    <div class="row" id="cons_content" style="display:none">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Construction Supply NC II</h4>
                </div>
                <div class="card-body">
                    <h3>Tools and Equipments</h3>
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
                                        <a class="btn btn-primary" href="home/items/{{$cons->id}}">Show/Delete</a>
                                        <a class="btn btn-primary" href="home/items/{{$cons->id}}/edit">Edit</a>
                                        <br><br>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <span><b>No entry was found.</b></span>
                        @endif
                        </tbody>
                    </table>
                    <br>
                    <hr>
                    <br>
                    <h3>Materials</h3>
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
                        @if(count($conses_m) > 0)
                            @foreach($conses_m as $cons)
                                <tr>
                                    <td>{{ $cons->stock_code }}</td>
                                    <td>{{ $cons->name }}</td>
                                    <td>{{ $cons->description }}</td>
                                    <td>{{ $cons->initial_stocks }}</td>
                                    <td>{{ $cons->remaining_stocks }}</td>
                                    <td>
                                        <a class="btn btn-primary" href="home/items/{{$cons->id}}">Show/Delete</a>
                                        <br><br>
                                        <a class="btn btn-warning" href="home/items/{{$cons->id}}/edit">Edit</a>
                                        <a class="btn btn-danger" href="home/items/decrement/{{$cons->id}}">-</a>
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
    <div class="row" id="office_content" style="display:none">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Office Supply</h4>
                </div>
                <div class="card-body">
                    <h3>Tools and Equipments</h3>
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
                                        <a class="btn btn-primary" href="home/items/{{$office->id}}">Show/Delete</a>
                                        <a class="btn btn-primary" href="home/items/{{$office->id}}/edit">Edit</a>
                                        <br><br>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <span><b>No entry was found.</b></span>
                        @endif
                        </tbody>
                    </table>
                    <br>
                    <hr>
                    <br>
                    <h3>Materials</h3>
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
                            @if(count($offices_m) > 0)
                                @foreach($offices_m as $office)
                                    <tr>
                                        <td>{{ $office->stock_code }}</td>
                                        <td>{{ $office->name }}</td>
                                        <td>{{ $office->description }}</td>
                                        <td>{{ $office->initial_stocks }}</td>
                                        <td>{{ $office->remaining_stocks }}</td>
                                        <td>
                                            <a class="btn btn-primary" href="home/items/{{$office->id}}">Show/Delete</a>
                                            <br><br>
                                            <a class="btn btn-warning" href="home/items/{{$office->id}}/edit">Edit</a>
                                            <a class="btn btn-danger" href="home/items/decrement/{{$office->id}}">-</a>
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
    <script type="text/javascript">
        $(document).ready(function () {
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
@endsection