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

    <div class="container mt-3">
        <h1 class="text-center">Mark Attendance</h1>
        <form action="{{ route('mark-attendance-submit') }}" class="d-flex justify-content-between flex-column d-sm-flex " method="post">
            @csrf

            {{-- Select Batch --}}
            <div class="form-group my-2">
                <label for="batch_id">Batch:</label>
                <select name="batch_id" id="batch_id" class="form-control" required>
                    <option value="">Select Batch</option>
                    @foreach ($batches as $batch)
                        <option value="{{ $batch->Batch_id }}">{{ $batch->Title }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Select Degree (dynamically populated) --}}
            <div class="form-group my-2">
                <label for="degree_id">Degree:</label>
                <select name="degree_id" id="degree_id" class="form-control" required disabled>
                    <option value="">Select Batch First</option>
                </select>
            </div>

            {{-- Select Semester (dynamically populated) --}}
            <div class="form-group my-2">
                <label for="semester_id">Semester:</label>
                <select name="semester_id" id="semester_id" class="form-control" required disabled>
                    <option value="">Select Degree First</option>
                </select>
            </div>

            {{-- Search for Students (optional) --}}
            <div class="form-group my-2">
                <label for="search">Search Students:</label>
                <input type="text" name="search" id="search" class="form-control" placeholder="Enter name or roll number">
            </div>

            {{-- Fetch Students Button --}}
            <button type="button" id="fetch-students-btn" class="btn btn-primary my-2">Fetch Students</button>

            {{-- Table to display students with radio buttons for presence/absence --}}
            <table class="table table-bordered my-2" id="students-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Roll Number</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- This section will be populated dynamically with student data --}}
                </tbody>
            </table>

            {{-- Mark Attendance Button --}}
            <button type="submit" class="btn btn-success my-2">Mark Attendance</button>
        </form>
    </div>

    {{-- Show success message if attendance is marked --}}
    @if (session()->has('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Include JavaScript for dynamic population and error handling --}}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script>
        $(document).ready(function() {
            // Populate degrees based on selected batch
            $('#batch_id').on('change', function() {
                var batchId = $(this).val();
                if (batchId) {
                    $.ajax({
                        url: "{{ route('mark-attendance.get-degrees', ':batchId') }}".replace(':batchId', batchId),
                        method: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('#degree_id').empty().append('<option value="">Select Degree</option>');
                            $.each(data, function(index, degree) {
                                $('#degree_id').append('<option value="' + degree.Degree_id + '">' + degree.Title + '</option>');
                            });
                            $('#degree_id').removeAttr('disabled');
                        },
                        error: function(xhr, status, error) {
                            console.log("Error fetching degrees:", error);
                            // Handle error, e.g., display an error message
                        }
                    });
                } else {
                    $('#degree_id').empty().append('<option value="">Select Batch First</option>').attr('disabled', true);
                    $('#semester_id').empty().append('<option value="">Select Degree First</option>').attr('disabled', true);
                }
            });

            // Populate semesters based on selected degree
            $('#degree_id').on('change', function() {
                var degreeId = $(this).val();
                if (degreeId) {
                    $.ajax({
                        url: "{{ route('mark-attendance.get-semesters', ':degreeId') }}".replace(':degreeId', degreeId),
                        method: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('#semester_id').empty().append('<option value="">Select Semester</option>');
                            $.each(data, function(index, semester) {
                                $('#semester_id').append('<option value="' + semester.id + '">' + semester.Title + '</option>');
                            });
                            $('#semester_id').removeAttr('disabled');
                        },
                        error: function(xhr, status, error) {
                            console.log("Error fetching semesters:", error);
                            // Handle error, e.g., display an error message
                        }
                    });
                } else {
                    $('#semester_id').empty().append('<option value="">Select Degree First</option>').attr('disabled', true);
                }
            });

            // Fetch students based on selected filters and populate table
            $('#fetch-students-btn').on('click', function() {
                var batchId = $('#batch_id').val();
                var degreeId = $('#degree_id').val();
                var semesterId = $('#semester_id').val();
                var search = $('#search').val();

                if (batchId && degreeId && semesterId) {
                    $.ajax({
                        url: "{{ route('mark-attendance.get-students') }}",
                        method: 'POST',
                        dataType: 'json',
                        data: {
                            batch_id: batchId,
                            degree_id: degreeId,
                            semester_id: semesterId,
                            search: search,
                            _token: "{{ csrf_token() }}",
                        },
                        success: function(data) {
                            $('#students-table tbody').empty();
                            $.each(data, function(index, student) {
                                var row = '<tr>';
                                row += '<td>' + student.Name + '</td>';
                                row += '<td>' + student.Roll_Number + '</td>';
                                row += '<td>';
                                row += '<input type="radio" name="students[' + student.id + ']" value="Present" checked>';
                                row += '<label for="present">Present</label>';
                                row += '<input type="radio" name="students[' + student.id + ']" value="Absent">';
                                row += '<label for="absent">Absent</label>';
                                row += '</td>';
                                row += '</tr>';
                                $('#students-table tbody').append(row);
                            });
                        },
                        error: function(xhr, status, error) {
                            console.error("Error fetching students:", error);
                            // Handle error, e.g., display an error message
                        }
                    });
                } else {
                    // Handle missing selections, e.g., display an error message
                    console.log('error');
                }
            });
        });

    </script>
</div>

@endsection