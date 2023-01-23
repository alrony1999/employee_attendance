@extends('layouts.emp-layout')
@section('content')
    <div class="row my-3 ">
        <div class="col-md-6 offset-md-3">
            <h1 class="text-center">Attendance List</h1>
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th scope="col">Day</th>
                        <th scope="col">Time</th>
                        <th scope="col">Status</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($attendanceList as $list)
                        <tr>
                            @php
                                $day = Carbon\Carbon::create($list->created_at);
                            @endphp
                            <td title="">{{ $day->day }}</td>
                            <td>{{ $day->format('h:i:s') }}</td>
                            <td>{{ ucwords($list->status) }}</td>
                        </tr>
                    @endforeach


                </tbody>
            </table>
        </div>
        <div class="col-md-6 d-flex flex-column " style="margin-top: 57px">

            <button>Intime : {{ $intime }}</button>
            <button>Late : {{ $late }}</button>
            <button>Absent : {{ $absent }}</button>
        </div>
    </div>
@endsection
