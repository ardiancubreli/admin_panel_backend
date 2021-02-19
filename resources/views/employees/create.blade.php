@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <h2>Create employee</h2>
        </div>
        <div class="col-md-4"></div>
    </div>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <form action="{{ route('employees.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="exampleInputEmail1">First name:</label>
                    <input type="text" name="first_name" value="{{ old('first_name') }}" class="form-control" placeholder="Enter first name">
                </div>
                @error('first_name')
                    <span class="text-danger">{{$message}}</span>
                @enderror

                <div class="form-group">
                    <label for="exampleInputEmail1">Last name:</label>
                    <input type="text" name="last_name" value="{{ old('last_name') }}"  class="form-control" placeholder="Enter last name">
                </div>
                @error('last_name')
                    <span class="text-danger">{{$message}}</span>
                @enderror

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Company</label>
                    </div>
                    <select class="custom-select" name="company_id">
                        <option selected>Choose...</option>
                        @foreach($companies as $company)
                            <option value="{{ $company->id }}" {{($company->id == old('company_id') ? 'selected' : '') }}> {{ $company->name }}</option>
                        @endforeach
                    </select>
                </div>
                @error('company_id')
                    <span class="text-danger">{{$message}}</span>
                @enderror

                <div class="form-group">
                    <label for="exampleInputEmail1">Email:</label>
                    <input type="email" name="email" value="{{ old('email') }}"  class="form-control" placeholder="Enter email">
                </div>
                @error('email')
                    <span class="text-danger">{{$message}}</span>
                @enderror

                <div class="form-group">
                    <label for="exampleInputEmail1">Phone number:</label>
                    <input type="text" name="phone" value="{{ old('phone') }}"  class="form-control" placeholder="Enter phone number">
                </div>
                @error('phone')
                    <span class="text-danger">{{$message}}</span>
                @enderror

                <button type="submit" class="btn btn-info">Submit</button>

            </form>
        </div>
        <div class="col-md-1"></div>

    </div>
@endsection
