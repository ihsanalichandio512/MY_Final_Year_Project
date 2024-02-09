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
                    <a href="{{ route('showAttendencePage') }}" class="">
                        <div class="">
                            <img class="img-fluid" src="{{ URL::asset('images/hd logo.png') }}">
                        </div>
                    </a>
                </div>
                <h3 class="text-center">Mark Attendance</h3>
                <form method="get" action="{{ route('getstudentdata') }}">
                    @csrf

                    <div class="form-floating mb-3">
                        <select class="form-control mb-4" name="batch" id="batch">
                            <option value="" selected disabled>---Select batch---</option>
                            @foreach ($batches as $batchItem)
                                <option value="{{ $batchItem->Batch_id }}">{{ $batchItem->Title }}</option>
                            @endforeach
                        </select>

                        <select class="form-control mb-4" name="degree" id="degree">
                            <option value="" selected disabled>---Select degree---</option>
                            @foreach ($degrees as $degreeItem)
                                <option value="{{ $degreeItem->Degree_id }}">{{ $degreeItem->Title }}</option>
                            @endforeach
                        </select>

                        <select class="form-control mb-4" name="semester" id="semester">
                            <option value="" selected disabled>---Select semester---</option>
                            @foreach ($semesters as $semesterItem)
                                <option value="{{ $semesterItem->Semester_id }}">{{ $semesterItem->Title }}</option>
                            @endforeach
                        </select>
                        @error('batch')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <a href="" id="getStudentsLink" class="btn btn-primary py-3 w-100 mb-4">Get Students</a>
                </form>



                <div class="col-12">
                    <div class="bg-light rounded p-4">
                        <h6 class="mb-4">Responsive Table</h6>
                        <div class="table-responsive">
                            <table class="table" id="studentsTable">
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Photo</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Present</th>
                                    <th scope="col">Absent</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($students as $student)
                                        <tr>
                                            <th scope="row">{{ $student->Student_id }}</th>
                                            <td>{{ $student->Photo }}</td>
                                            <td>{{ $student->Name }}</td>
                                            <td>
                                                <input class="form-check-input" name="attendance" id="present"
                                                    type="radio" value="present" aria-label="Text for screen reader" />
                                            </td>
                                            <td>
                                                <input class="form-check-input" name="attendance" id="absent"
                                                    type="radio" value="absent" aria-label="Text for screen reader" />
                                            </td>
                                        </tr>
                                    @endforeach

                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- Sign Up End -->
    </div>


    <script>
        document.getElementById('getStudentsLink').addEventListener('click', function(event) {
            event.preventDefault();

            // Get selected values
            var batchId = document.getElementById('batch').value;
            var degreeId = document.getElementById('degree').value;
            var semesterId = document.getElementById('semester').value;

            // Construct URL
            var url = "{{ route('showAttendencePage') }}";
            url += "?batchName=" + batchId + "&degreeName=" + degreeId + "&semesterName=" + semesterId;

            // Redirect to URL
            window.location.href = url;
        });
    </script>


@endsection
