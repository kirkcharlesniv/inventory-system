@extends('layouts.dashboard')

@section('page_title', 'Dashboard')

@section('card_title', "Dashboard")
@section('card_body')
    <div class="row">
        <div class="col-md-3">
            <button class="btn btn-primary btn-block" id="smaw">SMAW NC I</button>
        </div>
        <div class="col-md-3">
            <button class="btn btn-primary btn-block" id=   "pipefitting">Pipefitting NC II</button>
        </div>
        <div class="col-md-3">
            <button class="btn btn-primary btn-block" id="dress">Dress NC II</button>
        </div>
        <div class="col-md-3">
            <button class="btn btn-primary btn-block" id="cons">CONS II</button>
        </div>
    </div>
@endsection

@section('custom_content_bottom')
    <div class="row" id="smaw_content" style="display:none">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">SMAW NC I</h4>
                </div>
                <div class="card-body">
                    <p>Description about SMAW NC I.</p>
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
                    <p>Description about Pipefitting NC II.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row" id="dress_content" style="display:none">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Dress NC II</h4>
                </div>
                <div class="card-body">
                    <p>Description about Dress NC II.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row" id="cons_content" style="display:none">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">CONS NC II</h4>
                </div>
                <div class="card-body">
                    <p>Description about CONS NC II.</p>
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
                setTimeout(
                    function () {
                        $("#dress_content").fadeIn();
                    }, 800
                );
        });
    </script>
@endsection