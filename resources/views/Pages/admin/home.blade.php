@extends('Layouts.app')
@include('Partials.navbar')
@include('Partials.sidebar')


@section('adminhomepage')
<!-- Sale & Revenue Start -->
<div class="container-fluid pt-4 px-4 responsive">
    @if (Session::has('msg'))
            <div class="alert alert-primary d-flex justify-content-between " role="alert">
            <strong> {{ Session::get('msg') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (Session::has('addsubject'))
           <div class="alert alert-primary" role="alert">
            <strong> {{ Session::get('addsubject') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif


        @if (count($errors) > 0)
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger alert-dismissible fade show d-flex justify-content-between" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>
                        {{ $error }}
                    </strong>
                </div>

                <script>
                    $(".alert").alert();
                </script>
            @endforeach
        @endif
    <div class="row g-4">
        <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-book fa-3x text-danger "></i>
                <div class="ms-3">
                    <p class="mb-2">Add Subject</p>
                    <h6 class="mb-0"><a class="btn btn-sm btn-success " type="button" href="{{URL::to('/admin/showsubject')}}">Add Subject</a></h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fas fa-building-columns fa-3x text-danger"></i>
                <div class="ms-3">
                    <p class="mb-2">Add Batch</p>
                    <h6 class="mb-0">
                        <a class="btn btn-success  btn-block" type="button" href="{{ route('showbatch') }}">
                            Add Batch
                        </a>
                    </h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fas fa-building-circle-check fa-3x text-danger"></i>
                <div class="ms-3">
                    <p class="mb-2">Add Department</p>
                    <h6 class="mb-0">
                        <a class="btn btn-success btn-block" type="button" href="{{ route('showdepartment') }}">
                            Add Department
                        </a>
                    </h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fas fa-user-tie fa-3x text-danger"></i>
                <div class="ms-3">
                    <p class="mb-2">Add Roles</p>
                    <h6 class="mb-0">
                        <a class="btn btn-success btn-block" type="button" href="{{ route('showrole') }}">
                            Add Roles
                        </a>
                    </h6>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4 mt-4">
        <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fas fa-scroll fa-3x text-danger"></i>
                <div class="ms-3">
                    <p class="mb-2">Add Degree</p>
                    <h6 class="mb-0"><a class="btn btn-success btn-block" type="button" href="{{ route('showdegree') }}">
                        Add Degree
                    </a>
                </h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fas fa-users-rectangle fa-3x text-danger"></i>
                <div class="ms-3">
                    <p class="mb-2">Add Faculty</p>
                    <h6 class="mb-0">
                        <a class="btn btn-success btn-block" type="button" href="{{ route('showfaclity') }}">
                            Add Faculity
                        </a>
                    </h6>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- Sale & Revenue End -->

@endsection
{{-- 
@section('adminhomepage')

    <div class="container">
        @if (Session::has('msg'))
            <div class="alert alert-success d-flex justify-content-center">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-window-close"
                        aria-hidden="true"></i></button>
                <strong></strong> {{ Session::get('msg') }}
            </div>
        @endif

        @if (Session::has('addsubject'))
            <div class="alert alert-success d-flex justify-content-center">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-window-close"
                        aria-hidden="true"></i></button>
                <strong></strong> {{ Session::get('addsubject') }}
            </div>
        @endif


        @if (count($errors) > 0)
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger alert-dismissible fade show d-flex justify-content-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>
                        {{ $error }}
                    </strong>
                </div>

                <script>
                    $(".alert").alert();
                </script>
            @endforeach
        @endif

        <div class="row">
            <div class="col-md-4 d-flex ">
                <div class="card dashboard-product">
                    <span>Add Subject</span>
                    <h2 class="dashboard-total-products invisible"></h2>
                    <span class="label label-warning invisible">Sales</span>
                    <a class="btn btn-primary btn-block" type="button" href="{{ route('show.subject') }}">
                        Add Subject
                    </a>
                </div>
            </div>

            <div class="col-md-4 " style="margin-top: 55px">
                <div class="card dashboard-product">
                    <span>Add Batch</span>
                    <h2 class="dashboard-total-products invisible"></h2>
                    <span class="label label-warning invisible">Sales</span>
                    <a class="btn btn-primary btn-block" type="button" href="{{ route('showbatch') }}">
                        Add Batch
                    </a>
                </div>
            </div>



            <div class="col-md-4 " style="margin-top: 55px">
                <div class="card dashboard-product">
                    <span>Add Department</span>
                    <h2 class="dashboard-total-products invisible"></h2>
                    <span class="label label-warning invisible">Sales</span>
                    <a class="btn btn-primary btn-block" type="button" href="{{ route('showdepartment') }}">
                        Add Department
                    </a>
                </div>
            </div>



            <div class="col-md-4 " style="margin-top: 55px">
                <div class="card dashboard-product">
                    <span>Add Roles</span>
                    <h2 class="dashboard-total-products invisible"></h2>
                    <span class="label label-warning invisible">Sales</span>
                    <a class="btn btn-primary btn-block" type="button" href="{{ route('showrole') }}">
                        Add Roles
                    </a>
                </div>
            </div>


            <div class="col-md-4 " style="margin-top: 55px">
                <div class="card dashboard-product">
                    <span>Add Degree</span>
                    <h2 class="dashboard-total-products invisible"></h2>
                    <span class="label label-warning invisible">Sales</span>
                    <a class="btn btn-primary btn-block" type="button" href="{{ route('showdegree') }}">
                        Add Degree
                    </a>
                </div>
            </div>



            <div class="col-md-4 " style="margin-top: 55px">
                <div class="card dashboard-product">
                    <span>Add Faculity</span>
                    <h2 class="dashboard-total-products invisible"></h2>
                    <span class="label label-warning invisible">Sales</span>
                    <a class="btn btn-primary btn-block" type="button" href="{{ route('showfaclity') }}">
                        Add Faculity
                    </a>
                </div>
            </div>





        </div>


    </div>



@endsection --}}
