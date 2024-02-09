@extends('Layouts.app')
@include('Partials.navbar')
@include('Partials.sidebar')


@section('role')
  <!-- Sign Up Start -->
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

    @if (Session::has('roles'))
        <div class="alert alert-primary" role="alert">
            <strong> {{ Session::get('roles') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
        <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
            <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <a href="{{route('addrole')}}" class="">
                      <div class="">
                        <img class="img-fluid" src="{{URL::asset('images/hd logo.png')}}">
                      </div>
                    </a>
                  </div>
                  <h3 class="text-center">Add Roles</h3>
                  <form action="{{route('addrole')}}" method="get">
                    @csrf
                <div class="form-floating mb-3">
                  <input type="text" name="title" value="{{old('title')}}" id="floatingText" class="form-control _ge_de_ol" type="text" placeholder="Enter Title" required="" aria-required="true">
                  <label for="floatingText">Title</label>
                  @error('title')
                    <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>
                <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Add Roles</button>
                
            </div>
          </form>
        </div>
    </div>
</div>
<!-- Sign Up End -->
</div>
@endsection

