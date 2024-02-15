@extends('Layouts.app')
@include('Partials.navbar')

@section('facuiltyhomepage')

<div class="container-fluid pt-4 px-4 responsive">
    <div class="row g-4">
        <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-book fa-3x text-danger "></i>
                <div class="ms-3">
                    <p class="mb-2">Mark Attendance</p>
                    <h6 class="mb-0"><a class="btn btn-sm btn-success " type="button" href="{{URL::to('/show/attendance/page')}}">Mark Attendance</a></h6>
                </div>
            </div>
        </div>
</div>
@endsection