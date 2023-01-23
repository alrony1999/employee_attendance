@extends('layouts.emp-layout')
@section('message')
    @if (Session::has('msg'))
        <p class="text-red text-xs mt-2 msg-btn">{{ Session::get('msg') }} <span class="mx-2 btn btn-primary btn-sm"
                id="profile-smg">&times;</span>
        </p>
    @endif
@endsection
@section('content')
    <h1 class="text-center border ">Employee Profile</h1>
    <div class="row d-flex justify-content-center">
        <div class="col-md-4">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="{{ asset('assets/image/profile/' . $employee->profile) }}" alt="Card image cap"
                    width="250px" height="300px">
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-secondary mb-3" style="max-width: 28rem;">
                <div class="card-header">Employee Info</div>
                <div class="card-body">
                    <h5 class="card-title">Name : {{ $employee->name }}</h5>
                    <h5 class="card-title">Email : {{ $employee->email }}</h5>
                </div>
            </div>
            <div>
                <a href="{{ route('profile.edit') }}" class="btn btn-primary btn-lg">Edit</a>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $(document).on('click', '#profile-smg', function() {
                $('.msg-btn').hide();
            })

        })
    </script>
@endsection
