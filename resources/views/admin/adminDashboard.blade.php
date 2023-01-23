@extends('layouts.admin-layout')
@section('content')
    <div class="row my-3 ">

        <div class="col-md-6 offset-md-3">
            <h1 class="text-center">Employee List</h1>
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td title="">{{ $user->id }}</td>
                            <td>{{ ucwords($user->name) }}</td>
                            <td>{{ $user->email }}</td>
                            <td><a href="{{ route('attendance', ['id' => $user->id]) }}"
                                    class="btn btn-primary btn-sm">Attendance</a></td>
                        </tr>
                    @endforeach


                </tbody>
            </table>
        </div>
    </div>
@endsection
