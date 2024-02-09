@extends('Layouts.app')
@include('Partials.navbar')
@section('facuiltyhomepage')
@if(Session::has('msg'))
    
<div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong></strong> {{Session::get('msg')}}
</div>


@endif
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="container">
    <div class="row" style="margin-left: 50px;margin-top:30px">
        <div class="col-md-4 " style="margin-top: 55px">
        <div class="card dashboard-product">
      <span>  Mark Attendence</span>
      <h2 class="dashboard-total-products invisible"></h2>
      <span class="label label-warning invisible">Sales</span>
                <a
                    class="btn btn-primary btn-block"
                    type="button"
                    href="{{route('showAttendencePage')}}"
                >
                    Mark Attendence
                </a>
        </div>
        </div>
    </div>
</div>
@endsection