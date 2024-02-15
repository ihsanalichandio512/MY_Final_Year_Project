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


<div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
    <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
        <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <a href="{{route('adddepartment')}}" class="">
                  <div class="">
                    <img class="img-fluid" src="{{URL::asset('images/hd logo.png')}}">
                  </div>
                </a>
              </div>
              <h3 class="text-center">Add Department</h3>
              <form  method="get">
                @csrf
            <div class="form-floating mb-3">
                <select class="form-control" name="batch" id="batch">
                    <option selected disabled>Select Batch</option>
                    @foreach ($batch as $batch)
                        <option value="{{ $batch->Batch_id }}">{{ $batch->Title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-floating mb-3">
                <select class="form-control" name="degree" id="degree">

                </select>
            </div>

            <div class="form-floating mb-3">
                <select class="form-control" name="semester" id="semester">

                </select>
            </div>
                <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Mark Attendance</button>
            
        </div>
      </form>
    </div>
</div>
</div>
<div class="table-responsive">
    <table class="table" id="students">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Contact_No</th>
                <th scope="col">Cnic</th>
                <th scope="col">Address</th>
                <th scope="col">Picture</th>
                <th scope="col">Gender</th>
            </tr>
        </thead>
    </table>
</div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function(){
    $('#batch').change(function(){
        var batch_id = $(this).val();
        $.get('/get-degrees', {batch_id: batch_id}, function(data){
            $('#degree').empty();
            $.each(data, function(index, degree){
                $('#degree').append('<option value="'+degree.Degree_id+'">'+degree.Title+'</option>');
            });
        });
    });

    $('#degree').change(function(){
        var degree_id = $(this).val();
        $.get('/get-semesters', {degree_id: degree_id}, function(data){
            $('#semester').empty();
            $.each(data, function(index, semester){
                $('#semester').append('<option value="'+semester.Semester_id+'">'+semester.Title+'</option>');
            });
        });
    });

    $('#semester').change(function(){
        var semester_id = $(this).val();
        $.get('/get-students', {semester_id: semester_id}, function(data){
            $('#students').empty();
            $.each(data, function(index, student){
                $('#students').append('<tr><td>'+student.Name+'</td></tr>');
            });
        });
    });
});
</script>
@endsection