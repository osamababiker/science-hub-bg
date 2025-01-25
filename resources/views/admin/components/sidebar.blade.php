<aside class="col-lg-3 pe-lg-4 pe-xl-5 mt-n3">
  <div class="position-lg-sticky top-0">
    <div class="d-none d-lg-block" style="padding-top: 5px;"></div>
    <div class="offcanvas-lg offcanvas-start" id="sidebarAccount">
      <button class="btn-close position-absolute top-0 end-0 mt-3 me-3 d-lg-none" type="button" data-bs-dismiss="offcanvas" data-bs-target="#sidebarAccount"></button>
      <div class="offcanvas-body">
        <div class="pb-2 pb-lg-0 mb-4 mb-lg-5">
          <img class="d-block rounded-circle mb-2" src="{{ asset('assets/img/user.png') }}" width="80" alt="Isabella Bocouse">
          <h3 class="h5 mb-1">{{ Auth::user()->name }}</h3>
        </div>
        <nav class="nav flex-column pb-2 pb-lg-4 mb-3">
          <h4 class="fs-xs fw-medium text-muted text-uppercase pb-1 mb-2">Account</h4>
          <a class="nav-link fw-semibold py-2 px-0" href="{{ route('admin.index') }}"><i class="ai-user-check fs-5 opacity-60 me-2"></i>Overview</a>
          <a class="nav-link fw-semibold py-2 px-0" href="{{ route('admin.settings.index') }}"><i class="ai-settings fs-5 opacity-60 me-2"></i>Settings</a>
        </nav>
        <nav class="nav flex-column pb-2 pb-lg-4 mb-1">
          <h4 class="fs-xs fw-medium text-muted text-uppercase pb-1 mb-2">Dashboard</h4>
          <a class="nav-link fw-semibold py-2 px-0" href="{{ route('admin.orders.index') }}"><i class="ai-flag fs-5 opacity-60 me-2"></i>Orders</a>
          <a class="nav-link fw-semibold py-2 px-0" href="{{ route('admin.users.index') }}"><i class="ai-flag fs-5 opacity-60 me-2"></i>Users</a>
          <a class="nav-link fw-semibold py-2 px-0" href="{{ route('admin.blogs.index') }}"><i class="ai-edit fs-5 opacity-60 me-2"></i>Blogs</a>
          <a class="nav-link fw-semibold py-2 px-0" href="{{ route('admin.messages.index') }}"><i class="ai-messages fs-5 opacity-60 me-2"></i>Messages</a>
          <a class="nav-link fw-semibold py-2 px-0" href="{{ route('admin.partners.index') }}"><i class="ai-code-curly fs-5 opacity-60 me-2"></i>Partners</a>
          <a class="nav-link fw-semibold py-2 px-0" href="{{ route('admin.categories.index') }}"><i class="ai-flag fs-5 opacity-60 me-2"></i>Categories</a>
          <a class="nav-link fw-semibold py-2 px-0" href="{{ route('admin.teachers.index') }}"><i class="ai-flag fs-5 opacity-60 me-2"></i>Teachers</a>
          <a class="nav-link fw-semibold py-2 px-0" href="{{ route('admin.courses.index') }}"><i class="ai-flag fs-5 opacity-60 me-2"></i>Courses</a>
          <a class="nav-link fw-semibold py-2 px-0" href="{{ route('admin.testimonials.index') }}"><i class="ai-flag fs-5 opacity-60 me-2"></i>Testimonials</a>
        </nav>
        <nav class="nav flex-column">
          <a class="nav-link fw-semibold py-2 px-0" onclick="logout()" href="#">
            <i class="ai-logout fs-5 opacity-60 me-2"></i>Sign out
          </a>
          <form method="POST" id="logoutForm" action="{{ route('logout') }}">
              @csrf
          </form>
        </nav>
      </div>
    </div>
  </div>
</aside>