      
      <!-- Navbar Start -->
      <nav class="navbar navbar-expand bg-success sticky-top px-4 py-0">
         <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
             {{-- <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2> --}}
         </a>
         <a href="#" class="text-white sidebar-toggler flex-shrink-0">
             <i class="fa fa-bars"></i>
         </a>

         <div class="navbar-nav align-items-center ms-auto text-white ">
             <div class="nav-item dropdown text-white ">
                 <a href="#" class="nav-link dropdown-toggle text-white " data-bs-toggle="dropdown">
                     <img class="rounded-circle me-lg-2" src="{{asset('theme/img/user.jpg')}}" alt="" style="width: 40px; height: 40px;">
                     <span class="d-none d-lg-inline-flex">
                        @if (Session::has('user'))
                          <span class="text-white  ">{{ Session::get('user')->Username }}</span>
                        @endif
                     </span>
                 </a>
                 <div class=" dropdown-menu dropdown-menu-end bg-success text-white  border-0 rounded-0 rounded-bottom m-0">
                     <a href="#" class="dropdown-item text-white">My Profile</a>
                     <a href="#" class="dropdown-item text-white">Settings</a>
                     <a href="{{ route('logout') }}" class="dropdown-item text-white">Log Out</a>
                 </div>
             </div>
         </div>
     </nav>
     <!-- Navbar End -->
