@extends('Layouts.app')
@include('Partials.navbar')



@section('attendence')
    <div class="container-fluid">
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fa fa-exclamation-circle me-2"></i>
                @foreach ($errors->all() as $error)
                    <strong>{{ $error }}</strong>
                @endforeach
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

    </div>

    @if (Session::has('attendence'))
        <div class="alert alert-primary" role="alert">
            <strong> {{ Session::get('attendence') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
        <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
            <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <a href="" class="">
                        <div class="">
                            <img class="img-fluid" src="{{ URL::asset('images/hd logo.png') }}">
                        </div>
                    </a>
                </div>
                <h3 class="text-center">Mark Attendance</h3>
                <form method="get" action="{{ route('showAttendancePage') }}">
                    @csrf

                    <div class="form-floating mb-3">
                        <select class="form-control mb-4" name="batch" id="batch">
                            <option value="" selected disabled>---Select batch---</option>
                            @foreach ($batches as $batchItem)
                                <option value="{{ $batchItem->Batch_id }}">{{ $batchItem->Title }}</option>
                            @endforeach
                        </select>

                    </div>

                    <div class="form-floating mb-3">
                        <select id="degree" class="form-control mb-4">
                            <option value="" selected disabled>---Select Degree---</option>

                        </select>
                    </div>

                    <div class="form-floating mb-3">
                        <select id="semester" class="form-control mb-4">
                            <option value="" selected disabled>---Select Semester---</option>

                        </select>
                    </div>
                </form>



                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Responsive Table</h6>
                    <div class="table-responsive">
                        <table class="table" id="students">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">First Name</th>
                                    <th scope="col">Last Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Country</th>
                                    <th scope="col">ZIP</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>John</td>
                                    <td>Doe</td>
                                    <td>jhon@email.com</td>
                                    <td>USA</td>
                                    <td>123</td>
                                    <td>Member</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                

                {{-- Jquery Starts --}}

                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                <script>
                    $(document).ready(function() {
                        $('#batch').change(function() {
                            var batch_id = $(this).val();
                            $.get('/get-degrees', {
                                batch_id: batch_id
                            }, function(data) {
                                $('#degree').empty();
                                $.each(data, function(index, degree) {
                                    $('#degree').append('<option value="' + degree.id + '">' + degree
                                        .name + '</option>');
                                });
                            });
                        });

                        $('#degree').change(function() {
                            var degree_id = $(this).val();
                            $.get('/get-semesters', {
                                degree_id: degree_id
                            }, function(data) {
                                $('#semester').empty();
                                $.each(data, function(index, semester) {
                                    $('#semester').append('<option value="' + semester.id + '">' +
                                        semester.name + '</option>');
                                });
                            });
                        });

                        $('#semester').change(function() {
                            var semester_id = $(this).val();
                            $.get('/get-students', {
                                semester_id: semester_id
                            }, function(data) {
                                $('#students').empty();
                                $.each(data, function(index, student) {
                                    $('#students').append('<tr><td>' + student.name + '</td></tr>');
                                });
                            });
                        });
                    });
                </script>

                {{-- Jquery Ends --}}


            </div>

        </div>
    </div>
    <!-- Sign Up End -->
    </div>

@endsection
