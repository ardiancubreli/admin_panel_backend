@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <h2>Edit company</h2>
        </div>
        <div class="col-md-4"></div>
    </div>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <form action="{{ route('companies.update', $company->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="exampleInputEmail1">Company name:</label>
                    <input type="text" name="name" value="{{ old('name') ?? $company->name }}" class="form-control" placeholder="Enter company name">
                </div>
                @error('name')
                    <span class="text-danger">{{$message}}</span>
                @enderror

                <div class="form-group">
                    <label for="exampleInputEmail1">Email:</label>
                    <input type="email" name="email" value="{{ old('email') ?? $company->email }}" class="form-control" placeholder="Enter email">
                </div>
                @error('email')
                    <span class="text-danger">{{$message}}</span>
                @enderror

                <label for="exampleInputEmail1">Logo:</label>
                <div class="custom-file mb-3">
                    <input type="file" name="logo" class="custom-file-input" id="customFile">
                    <label class="custom-file-label" for="customFile">Choose logo</label>
                </div>
                @error('logo')
                    <span class="text-danger">{{$message}}</span>
                @enderror

                <div class="form-group">
                    <label for="exampleInputEmail1">Website:</label>
                    <input type="text" name="website" value="{{ old('website') ?? $company->website }}" class="form-control" placeholder="Enter website">
                </div>
                @error('website')
                    <span class="text-danger">{{$message}}</span>
                @enderror

                <button type="submit" class="btn btn-info">Update</button>

            </form>
        </div>
        <div class="col-md-1"></div>

    </div>
@endsection
