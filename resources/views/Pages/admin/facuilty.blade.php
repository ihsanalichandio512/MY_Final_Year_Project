@extends('Layouts.app')
@include('Partials.navbar')
@include('Partials.sidebar')




@section('faculity')
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

    @if (Session::has('faculty'))
        <div class="alert alert-primary" role="alert">
            <strong> {{ Session::get('faculty') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="row  align-items-center justify-content-center" style="min-height: 100vh;">
        <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
            <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <a href="{{ route('addfacuilty') }}" class="">
                        <div class="">
                            <img class="img-fluid" src="{{ URL::asset('images/hd logo.png') }}">
                        </div>
                    </a>
                </div>
                <h3 class="text-center">Add Faculity</h3>
                <form action="{{ route('addfacuilty') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-floating mb-3">
                        <select class="form-control" name="department_id" id="">
                            <option selected disabled>Select Department</option>
                            @foreach ($department as $a)
                                <option value="{{ $a->Department_id }}">{{ $a->Title }}</option>
                            @endforeach
                        </select>
                        @error('department_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <input type="file" class="form-control" name="img" value="{{ old('img') }}" id=""
                            placeholder="" aria-describedby="fileHelpId" />
                        @error('img')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>



                    <div class="form-floating mb-3">
                        <input class="form-check-input" id="floatingText" type="radio" name="gender" value="male" />
                        <label class="form-check-label"> Male</label>
                        @error('gender')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-floating mb-3 mt-3 ">
                        <input class="form-check-input" type="radio" name="gender" value="female" id="" />
                        <label class="form-check-label" for="">Female</label>
                        @error('gender')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-floating mb-3 mt-4 ">
                        <input type="text" name="job_status" value="{{ old('job_status') }}" id="floatingText"
                            class="form-control _ge_de_ol" type="text" placeholder="Enter Job Status" required=""
                            aria-required="true">
                        <label for="floatingText">Enter Job Status</label>
                        @error('job_status')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>


                    <div class="form-floating mb-3">
                        <input type="text" name="qualification" value="{{ old('qualification') }}" id="floatingText"
                            class="form-control _ge_de_ol" type="text" placeholder="Enter Title" required=""
                            aria-required="true">
                        <label for="floatingText">qualification</label>
                        @error('qualification')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" name="cnic" value="{{ old('cnic') }}" id="floatingText"
                            class="form-control _ge_de_ol" type="text" placeholder="Enter Title" required=""
                            aria-required="true">
                        <label for="floatingText">cnic</label>
                        @error('cnic')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <input type="date" name="dob" value="{{ old('dob') }}" id="floatingText"
                            class="form-control _ge_de_ol" type="text" placeholder="Enter Title" required=""
                            aria-required="true">
                        <label for="floatingText">Date Of Birth</label>
                        @error('dob')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" name="contact" value="{{ old('contact') }}" id="floatingText"
                            class="form-control _ge_de_ol" type="text" placeholder="Enter Title" required=""
                            aria-required="true">
                        <label for="floatingText">contact</label>
                        @error('contact')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" name="designation" value="{{ old('designation') }}" id="floatingText"
                            class="form-control _ge_de_ol" type="text" placeholder="Enter Title" required=""
                            aria-required="true">
                        <label for="floatingText">designation</label>
                        @error('designation')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" name="address" value="{{ old('address') }}" id="floatingText"
                            class="form-control _ge_de_ol" type="text" placeholder="Enter Title" required=""
                            aria-required="true">
                        <label for="floatingText">address</label>
                        @error('address')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Add Facuitly</button>

            </div>
            </form>
        </div>
    </div>

    

    <div class="col-12 ">
        <div class="bg-light rounded h-100 p-4">
            <h6 class="mb-4">Responsive Table</h6>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">faculty_id</th>
                            <th scope="col">Image</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Job_Status</th>
                            <th scope="col">Qualification</th>
                            <th scope="col">Cnic</th>
                            <th scope="col">Date_of_Birth</th>
                            <th scope="col">Contact_No</th>
                            <th scope="col">Designation</th>
                            <th scope="col">Address</th>
                            <th scope="col">status</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach ($faculty as $faculty)
                      <tr>
                        <th scope="row">{{$faculty->faculty_id}}</th>
                        <td><img class="rounded-circle me-lg-2" src="{{asset('theme/img/user.jpg')}}" alt="" style="width: 40px; height: 40px;"></td>
                        <td>{{$faculty->Gender}}</td>
                        <td>{{$faculty->Job_Status}}</td>
                        <td>{{$faculty->Qualification}}</td>
                        <td>{{$faculty->Cnic}}</td>
                        <td>{{$faculty->Date_of_Birth}}</td>
                        <td>{{$faculty->Contact_No}}</td>
                        <td>{{$faculty->Designation}}</td>
                        <td>{{$faculty->Address}}</td>
                        <td>
                          @if ($faculty->status == 1)
                             <span class="badge bg-success">{{'Active'}}</span>
                            @else
                            <span class="badge bg-danger">{{'Deactive'}}</span>
                          @endif
                        </td>
                    </tr>
                      @endforeach  
                      
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>

  </div>
  <!-- Sign Up End -->
  </div>
@endsection
