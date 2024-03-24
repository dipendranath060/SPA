    <!-- Sidebar -->
    <div class="sidebar px-2" id="sidebar" style="width: 140px">
        <div
          class="d-flex justify-content-center mb-3 py-2 align-items-center"
          id="menu-top"
        >
          <div class="logo d-none rounded" id="logo">
            <a href="{{route('dashboard')}}">
            <img src="{{asset('assets/icons/logo.png')}}" alt="logo" class="w-100" />
          </a>
          </div>
          <div id="menu" class="p-2">
            <i class="fa-solid fa-bars fa-2xl" style="color: #ffffff"></i>
          </div>
        </div>
  
        <!-- Menu -->
        <ul class="menu text-center list-unstyled">
          <li class="menu-item mb-2 {{request()->is('admin/dashboard') ? 'active-page' : ''}}">
            <a href="{{route('dashboard')}}" class="text-decoration-none d-block">
              <img src="{{asset('assets/icons/business-report.png')}}" alt="" class="mb-1" />
              <span class="menu-title d-block m-0">Dashboard</span>
            </a>
          </li>
          <li class="menu-item mb-2 {{request()->is('admin/packages')|| request()->is('admin/add-package') ? 'active-page' : ''}}">
            <a href="{{route('packages')}}" class="text-decoration-none d-block">
              <img src="{{asset('assets/icons/package.png')}}" alt="" class="mb-1" />
              <span class="menu-title d-block m-0">Package</span>
            </a>
          </li>
  
          <li class="menu-item mb-2 {{request()->is('admin/services')|| request()->is('admin/add-service') ? 'active-page' : ''}}">
            <a href="{{route('services')}}" class="text-decoration-none d-block">
              <img src="{{asset('assets/icons/services.png')}}" alt="" class="mb-1" />
              <span class="menu-title d-block m-0">Service</span>
            </a>
          </li>
  
          {{-- <li class="menu-item mb-2 {{request()->is('admin/members')|| request()->is('admin/add-member') ? 'active-page' : ''}}">
            <a href="{{route('members')}}" class="text-decoration-none d-block">
              <img src="{{asset('assets/icons/team.png')}}" alt="" class="mb-1" />
              <span class="menu-title d-block m-0">Team</span>
            </a>
          </li> --}}
  
          <li class="menu-item mb-2 {{request()->is('admin/blogs')|| request()->is('admin/add-blog') ? 'active-page' : ''}}">
            <a href="{{route('blogs')}}" class="text-decoration-none d-block">
              <img src="{{asset('assets/icons/blog.png')}}" alt="" class="mb-1" />
              <span class="menu-title d-block m-0">Blog</span>
            </a>
          </li>
  
          <li class="menu-item mb-2 {{request()->is('admin/testimonials')|| request()->is('admin/add-testimonial') ? 'active-page' : ''}}">
            <a href="{{route('testimonials')}}" class="text-decoration-none d-block">
              <img src="{{asset('assets/icons/testimonials.png')}}" alt="" class="mb-1" />
              <span class="menu-title d-block m-0">Testimonial</span>
            </a>
          </li>
          <li class="menu-item mb-2 {{request()->is('admin/milestones')|| request()->is('admin/add-milestone') ? 'active-page' : ''}}">
            <a href="{{route('milestones')}}" class="text-decoration-none d-block">
              <img src="{{asset('assets/icons/counter.png')}}" alt="" class="mb-1" />
              <span class="menu-title d-block m-0">Milestone</span>
            </a>
          </li>
          <li class="menu-item mb-2{{request()->is('admin/banners')|| request()->is('admin/add-banner') ? 'active-page' : ''}}">
            <a href="{{route('banners')}}" class="text-decoration-none d-block">
              <img src="{{asset('assets/icons/banner.png')}}" alt="" class="mb-1" />
              <span class="menu-title d-block m-0">Banner</span>
            </a>
          </li>
          <li class="menu-item mb-2 {{request()->is('admin/users')|| request()->is('admin/add-user') ? 'active-page' : ''}}">
            @if (auth()->user()->role_as == '1')
            <a href="{{route('users')}}" class="text-decoration-none d-block">
              <img src="{{asset('assets/icons/profile.png')}}" alt="" class="mb-1" />
              <span class="menu-title d-block m-0">User</span>
            </a>
            @endif
          </li>
        </ul>
      </div>