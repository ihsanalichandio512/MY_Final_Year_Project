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

        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-lg-6 d-flex  justify-content-center flex-column ">
                    <h1 class="text-center">Mark Attendance</h1>
                    <form action="{{ route('attendance.store') }}" class="" method="POST">
                        @csrf
                        {{-- Select Batch --}}
                        {{-- <div class="form-group my-2">
                        <label for="batch_id">Degree:</label>
                        <select name="batch_id" id="batch_id" class="form-control" required>
                            <option value="">Select Degree</option>
                            @foreach ($degree as $Degree)
                                <option value="{{ $Degree->Degree_id }}">{{ $Degree->Title }}</option>
                            @endforeach
                        </select>
                    </div> --}}

                        <div class="form-group">
                            <label for="degree_id">Degree:</label>
                            <select name="degree_id" id="degree_id" class="form-control" required
                                onchange="fetchBatches(this.value)">
                                <option value="" selected disabled>Select Degree</option>
                                @foreach ($degrees as $degree)
                                    <option value="{{ $degree->Degree_id }}">{{ $degree->Title }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="batch_id">Batch:</label>
                            <select name="batch_id" id="batch_id" class="form-control" required disabled>
                                <option value="">-- Select Batch --</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="semester_id">Semester:</label>
                            <select name="semester_id" id="semester_id" class="form-control" required disabled>
                                <option value="">-- Select Semester --</option>
                            </select>
                        </div>

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Student Name</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($students)
                                    @foreach ($students as $student)
                                        <tr>
                                            <td>{{ $student->Name }}</td>
                                            <td>{{ $student->Gender }}</td>
                                            <td>{{ $student->Picture }}</td>
                                            <td>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        name="student_id[{{ $student->Student_id }}]"
                                                        id="present{{ $student->Student_id }}" value="present">
                                                    <label class="form-check-label"
                                                        for="present{{ $student->Student_id }}">Present</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        name="student_id[{{ $student->Student_id }}]"
                                                        id="absent{{ $student->Student_id }}" value="absent">
                                                    <label class="form-check-label"
                                                        for="absent{{ $student->Student_id }}">Absent</label>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>

                        <button type="submit" class="btn btn-primary">Mark Attendance</button>
                    </form>

                    <script>
                        function fetchBatches(degreeId) {
                            if (degreeId) {
                                $.ajax({
                                    url: "{{ route('attendance.fetch.batches') }}", // Your custom route to fetch batches
                                    data: {
                                        degree_id: degreeId
                                    },
                                    success: function(data) {
                                        console.log(data);
                                        // Update batch select
                                        $('#batch_id').empty().prop('disabled', false);
                                        $('#batch_id').append('<option value="">-- Select Batch --</option>');
                                        data.forEach(function(batch) {
                                            $('#batch_id').append('<option value="' + batch.Batch_id + '">' + batch
                                                .Title + '</option>');
                                        });

                                        // Clear and disable semesters initially
                                        $('#semester_id').empty().prop('disabled', true);

                                        // Fetch semesters only if a batch is selected
                                        $('#batch_id').change(function() {
                                            var batchId = $(this).val();
                                            if (batchId) {
                                                $.ajax({
                                                    url: "{{ route('attendance.fetch.semesters') }}", // Your custom route to fetch semesters
                                                    data: {
                                                        batch_id: batchId
                                                    },
                                                    success: function(data) {
                                                        $('#semester_id').empty().prop('disabled', false);
                                                        $('#semester_id').append(
                                                            '<option value="">-- Select Semester --</option>'
                                                        );
                                                        data.forEach(function(semester) {
                                                            $('#semester_id').append(
                                                                '<option value="' + semester
                                                                .Semester_id + '">' + semester
                                                                .Title + '</option>');
                                                        });
                                                    },
                                                    error: function(error) {
                                                        console.error(error);
                                                    }
                                                });
                                            } else {
                                                $('#semester_id').empty().prop('disabled',
                                                    true); // Clear and disable semesters if no batch is selected
                                            }
                                        });
                                    },
                                    error: function(error) {
                                        console.error(error);
                                    }
                                });
                            } else {
                                $('#batch_id').empty().prop('disabled', true);
                                $('#semester_id').empty().prop('disabled', true); // Clear and disable semesters if degree is not selected
                            }

                            $('#semester_id').change(function() {
                                var batchId = $('#batch_id').val();
                                var semesterId = $(this).val();

                                if (batchId && semesterId) {
                                    // Additional code to fetch students
                                    fetchStudents(batchId, semesterId);
                                } else {
                                    // Clear and disable student list if no batch or semester is selected
                                    $('#student_list').empty();
                                    
                                }
                            });

                            function fetchStudents(batchId, semesterId) {
                                $.ajax({
                                    url: "{{ route('attendance.fetch.students') }}", // Your custom route to fetch students
                                    data: {
                                        batch_id: batchId,
                                        semester_id: semesterId
                                    },
                                    success: function(data) {
                                        console.log(data);
                                        // Update student list using the received data
                                        updateStudentList(data);
                                    },
                                    error: function(error) {
                                        console.error(error);
                                    }
                                });

                                function updateStudentList(students) {
                                    // Clear existing student list entries
                                    $('#student_list').empty();

                                    // Loop through each student and create list elements
                                    students.forEach(function(student) {
                                        // Build student list element with relevant information (e.g., name, status)
                                        var studentListItem = '<li>' + student.Name + ' - ... (status)</li>';

                                        // Add the student list element to the container
                                        $('#student_list').append(studentListItem);
                                       
                                    });
                                }
                            }
                        }
                    </script>


                </div>
            </div>

        </div>

    @endsection
