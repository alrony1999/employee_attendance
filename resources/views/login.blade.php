@extends('layouts.emp-layout')
@section('message')
    @if (Session::has('fmsg'))
        <p class="text-red text-xs mt-2">{{ Session::get('fmsg') }} <span class="mx-2 btn btn-primary btn-sm">&times;</span>
        </p>
    @endif
@endsection
@section('content')
    <section class="h-100 w-100 bg-secondary">
        <div class="row d-flex justify-content-center align-items-center" style="height: 100vh;">
            <div class="col-md-6">
                <div class="card rounded-3">
                    <div class="card-body p-4 p-md-5">
                        <h3 class="mb-4 pb-2 text-center ">Login Info</h3>
                        <form method="POST" action="/login" class="">
                            @csrf
                            <div class="form-group mb-4">
                                <label class="form-label" for="email">Email</label>
                                <input type="email" name="email" value="{{ old(' email') }}" id="email"
                                    class="form-control" />
                                @error('email')
                                    <p class="text-red text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label class="form-label" for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control" />
                                @error('password')
                                    <p class="text-red text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-success btn-lg mb-1">Log In</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
