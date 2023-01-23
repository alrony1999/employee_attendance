@extends('layouts.emp-layout')
@section('message')
    <div class="bg-primary ml-5" id="msg-btn"></div>
@endsection
@section('content')
    <section class="bg-secondary" style="height: 100vh">
        <div class="row d-flex justify-content-center align-items-center" style="height: 100vh;">
            <div class="col-md-4 ">
                <div class="d-flex flex-column ">
                    <h1 class="text-center text-uppercase font-weight-bold text-primary">Attendance</h1>
                    <button class="btn btn-success btn-lg rounded-lg" id="attendance-btn">Click Me</button>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            function dashboard() {
                $.ajax({
                    type: "GET",
                    url: "/employee/dshboard/check",
                    dataType: "json",
                    success: function(response) {
                        console.log(response);
                        $('#msg-btn').html('');
                        if (response.status == 200) {
                            $('#attendance-btn').text('');
                            $('#attendance-btn').text(response.message);
                            $('#attendance-btn').prop('disabled', true)

                        }


                    }

                });
            }

            function available() {
                const date = new Date();
                let hour = 12 - date.getHours();
                let day = date.toLocaleString(
                    "default", {
                        weekday: "long"
                    }
                );
                days = ["Friday", "Saturday"];
                if ((hour <= 0 || hour > 2) || days.includes(day)) {
                    $('#attendance-btn').prop('disabled', true)
                }
            }
            dashboard();
            available();

            $(document).on('click', '#attendance-btn', function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "POST",
                    url: "/employee/daily-attendance",
                    dataType: "json",
                    success: function(response) {
                        $('#msg-btn').html('');
                        if (response.status == 200) {
                            html = "<p class='text-center text-green text-xs mt-2'>" + response
                                .message +
                                "</p>";
                            $('#msg-btn').append(html);

                        } else {

                            html = "<p class=' text-center text-red text-xs mt-2'>" + response
                                .message +
                                "</p>";
                            $('#msg-btn').append(html);

                        }


                    }

                });
            })
        })
    </script>
@endsection
