@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <h2>All employees</h2>
        </div>
        <div class="col-md-4"></div>
    </div>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First name</th>
                    <th scope="col">Last name</th>
                    <th scope="col">Company</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>

                @foreach($employees as $employee)
                    <tr>
                        <th scope="row">{{ $employee->id }}</th>
                        <td>{{ $employee->first_name }}</td>
                        <td>{{ $employee->last_name }}</td>
                        <td>{{ $employee->company->name }}</td>
                        <td>{{ $employee->email }}</td>
                        <td>{{ $employee->phone }}</td>
                        <td>
                            <a class="btn btn-info text-white" href="{{ route('employees.show', $employee->id) }}">View</a>
                            <a class="btn btn-info text-white" href="{{ route('employees.edit', $employee->id) }}">Edit</a>
                            <form class="d-inline-block" action="{{ route('employees.destroy', $employee->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger text-white">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
            {{ $employees->links("pagination::bootstrap-4") }}
        </div>
        <div class="col-md-1"></div>

    </div>
@endsection
