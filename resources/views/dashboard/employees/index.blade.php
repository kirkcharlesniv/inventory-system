@extends('layouts.dashboard')

@section('page_title', 'Employees')

@section('card_title', 'Employees Record')
@section('card_body')
    <div class="table-responsive">
        <table class="table">
            <thead class=" text-primary">
            <th>ID Number</th>
            <th>Name</th>
            <th>Links</th>
            </thead>
            <tbody>
            @if(count($employees) > 0)
                @foreach($employees as $employee)
                    <tr>
                        <td>{{ $employee->id_num }}</td>
                        <td>{{ $employee->name }}</td>
                        <td>
                            <a class="btn btn-primary" href="employees/{{ $employee->id }}">Profile</a>
                            <a class="btn btn-primary" href="employees/{{ $employee->id }}/edit">Edit</a>
                            <br><br>
                            {!! Form::open(['action' => ['EmployeesController@destroy', $employee->id], 'method' => 'POST']) !!}
                            {{ Form::hidden('_method', 'DELETE') }}
                            {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
            @else
                <span><b>No entry was found.</b></span>
            @endif
            </tbody>
        </table>
    </div>
    {{ $employees->links() }}
@endsection