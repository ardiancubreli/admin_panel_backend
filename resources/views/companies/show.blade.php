@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <h2>Company info</h2>
        </div>
        <div class="col-md-4"></div>
    </div>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">

            <div class="form-group">
                <label for="exampleInputEmail1">Company name:</label>
                <input type="text" name="name" value="{{ old('name') ?? $company->name }}" class="form-control" disabled>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Email:</label>
                <input type="email" name="email" value="{{ old('email') ?? $company->email }}" class="form-control" disabled>
            </div>

            <label for="exampleInputEmail1">Logo:</label><br>
            <img src="{{ asset('storage/' . $company->logo) }}" alt="Company logo" style="width:300px;height:300px;">
            <br>
            <br>

            <div class="form-group">
                <label for="exampleInputEmail1">Website:</label>
                <input type="text" name="website" value="{{ old('website') ?? $company->website }}" class="form-control" disabled>
            </div>

                <a href="{{ route('companies.index') }}" class="btn btn-info">Back</a>

        </div>
        <div class="col-md-1"></div>

    </div>
@endsection
