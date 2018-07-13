@extends('layouts.dashboard')

@section('page_title', 'Inventory')

@section('card_title')
    {{ $employee->name }}'s Profile
@endsection

@section('card_body')
    {!! Html::image('http://markelias.s3-ap-southeast-1.amazonaws.com/'.$employee->picture), 'profile', ['width' => '30%', 'height' => '30%'] !!}
    <div class="table-responsive">
        <table class="table">
            <thead class=" text-primary">
                <th>ID Number</th>
                <th>Name</th>
                <th>Address</th>
                <th>Phone</th>
                <th>TIN Number</th>
            </thead>
            <tbody>
            @if(!empty($employee))
                <tr>
                    <td>{{ $employee->id_num }}</td>
                    <td>{{ $employee->name }}</td>
                    <td>{{ $employee->address }}</td>
                    <td>{{ $employee->phone }}</td>
                    <td>{{ $employee->tin_number }}</td>
                </tr>
            @endif
            </tbody>
        </table>
    </div>
@endsection