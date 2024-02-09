@extends('Layouts.app')


@section('adminhomepage')
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
    <h1>Welcome to User webpage</h1>
    <a class="btn btn-block btn-danger" href="{{URL::to('logout')}}" >
    Logout
    </a>
@endsection