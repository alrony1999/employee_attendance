@extends('layouts.emp-layout')
@section('content')
    <h1 class="text-center border ">Profile Update</h1>
    <div class="row d-flex justify-content-center">

        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="d-flex flex-row" style="width: 600px; height:300px">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="{{ asset('assets/image/profile/' . $employee->profile) }}"
                        alt="Card image cap" width="250px" height="300px">

                </div>
                <div class="mx-2">
                    <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="new-name" value="{{ $employee->name }}" class="form-control">
                            @error('new-name')
                                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" name="new-email" value="{{ $employee->email }}" class="form-control">
                            @error('new-email')
                                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" name="new-password" class="form-control">
                            @error('new-password')
                                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">

                            <input type="file" name="new-profile">
                            @error('new-profile')
                                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <button class="btn btn-secondary btn-lg" type="submit">Update</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
