@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <h2>All companies</h2>
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
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Website</th>
                    <th scope="col">Created at</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>

                @foreach($companies as $company)
                    <tr>
                        <th scope="row">{{ $company->id }}</th>
                        <td>{{ $company->name }}</td>
                        <td>{{ $company->email }}</td>
                        <td>{{ $company->website }}</td>
                        <td>{{ $company->created_at }}</td>
                        <td>
                            <a class="btn btn-info text-white" href="{{ route('companies.show', $company->id) }}">View</a>
                            <a class="btn btn-info text-white" href="{{ route('companies.edit', $company->id) }}">Edit</a>
                            <form class="d-inline-block" action="{{ route('companies.destroy', $company->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger text-white">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>

            {{ $companies->links("pagination::bootstrap-4") }}
        </div>
        <div class="col-md-1"></div>
    </div>
@endsection
