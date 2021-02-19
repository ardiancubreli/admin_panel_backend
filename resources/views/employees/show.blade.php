@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <h2>Employee info</h2>
        </div>
        <div class="col-md-4"></div>
    </div>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">

            <div class="form-group">
                <label for="exampleInputEmail1">First name:</label>
                <input type="text" name="first_name" value="{{ $employee->first_name }}" class="form-control" placeholder="Enter first name" disabled>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Last name:</label>
                <input type="text" name="last_name" value="{{ $employee->last_name }}"  class="form-control" placeholder="Enter last name" disabled>
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Company</label>
                </div>
                <select class="custom-select" name="company_id" disabled>
                        <option selected> {{ $employee->company->name }}</option>
                </select>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Email:</label>
                <input type="email" name="email" value="{{ $employee->email }}"  class="form-control" placeholder="Enter email" disabled>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Phone number:</label>
                <input type="text" name="phone" value="{{ $employee->phone }}"  class="form-control" placeholder="Enter phone number" disabled>
            </div>

                <a href="{{ route('employees.index') }}" class="btn btn-info">Back</a>

        </div>
        <div class="col-md-1"></div>

    </div>
@endsection
