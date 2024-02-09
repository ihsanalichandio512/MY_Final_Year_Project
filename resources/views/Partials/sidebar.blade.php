 <!-- Sidebar Start -->
 <div class="sidebar pe-4 pb-3 bg-success " style="position:fixed;top: 3.2rem;}">
    <nav class="navbar bg-success navbar-light">
        <a href="{{ route('admin.home') }}" class="navbar-brand mx-4 mb-3">
            <div class="">
                <img class="img-fluid" src="{{ URL::asset('images/White hd logo .png') }}">
            </div>
        </a>
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <img class="rounded-circle" src="{{asset('theme/img/user.jpg')}}" alt="" style="width: 40px; height: 40px;">
                <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
            </div>
            <div class="ms-3 text-white">
                <h6 class="mb-0">
                    @if (Session::has('user'))
                    <span class="text-white">{{ Session::get('user')->Username }}</span>
                 @endif
                </h6>
                <span>
                    @if (Session::has('user'))
                    @if (Session::get('user')->Role_id == 1)
                        {{'Admin'}}
                    @elseif (Session::get('user')->Role_id == 2)
                    {{'User'}}
                    @elseif (Session::get('user')->Role_id == 3)
                    {{'Facilty'}}
                    @elseif (Session::get('user')->Role_id == 4)
                    {{'Student'}}
                    @endif
                 @endif
                </span>
            </div>
        </div>
        <div class="navbar-nav w-100">
            <a href="{{ route('admin.home') }}" class="nav-item nav-link text-white"><i class="fa fa-tachometer-alt me-2 text-success"></i>Dashboard</a>
            <a href="{{ route('show.subject') }}" class="nav-item nav-link text-white"><i class="fa fa-book me-2 text-success"></i>Add Subject</a>
            <a href="{{ route('showdepartment') }}" class="nav-item nav-link text-white"><i class="fa-solid fa-building me-2 text-success"></i>Add Department</a>
            <a href="{{ route('showbatch') }}" class="nav-item nav-link text-white"><i class="fa-solid fa-building-columns me-2 text-success"></i>Add Batch</a>
            <a href="{{ route('showrole') }}" class="nav-item nav-link text-white"><i class="fa-solid fa-circle-user me-2 text-success"></i>Add Roles</a>
            <a href="{{ route('showdegree') }}" class="nav-item nav-link text-white"><i class="fa-solid fa-certificate me-2 text-success"></i>Add Degrees</a>
            <a href="{{ route('showfaclity') }}" class="nav-item nav-link text-white"><i class="fa-solid fa-user-tie me-2 text-success"></i>Add faculty</a>
            
        </div>
    </nav>
</div>
<!-- Sidebar End -->
