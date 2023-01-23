@extends('layouts.admin-layout')
@section('message')
    @if (Session::has('msg'))
        <p class="text-red text-xs mt-2">{{ Session::get('msg') }} <span class="mx-2 btn btn-primary btn-sm">&times;</span>
        </p>
    @endif
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12 d-flex flex-column  align-items-center" style="width:100vh;">
            <h1 class="mb-5">Add Employee</h1>
            <form action="{{ route('admin.add-employee') }}" class="form-inline " method="POST">
                @csrf
                <div class="form-group">
                    <label for="" class="form-control ">Name</label>
                    <input type="text" name="name" class="form-control mx-1">
                </div>
                <div class="form-group">
                    <label for="" class="form-control ">Email</label>
                    <input type="email" name="email" class="form-control mx-1">
                </div>
                <button type="submit" class="btn btn-success">Add</button>
            </form>
        </div>
    </div>
@endsection
