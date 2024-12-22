@extends('components/layout')
@section('title', 'Admin Panel' )
@section('content')
  <!-- Page content-->
  <div class="container py-5 mt-4 mt-lg-5 mb-lg-4 my-xl-5">
    <div class="row pt-sm-2 pt-lg-0">
      <!-- Sidebar (offcanvas on sreens < 992px)-->
      @include('admin/components/sidebar')
      <!-- Page content-->
      <div class="col-lg-9 pt-4 pb-2 pb-sm-4">
        <section class="card border-0 py-1 p-md-2 p-xl-3 p-xxl-4">
          <div class="card-body">
          <div class="row g-3 g-xl-4">
              <div class="col-md-4 col-sm-6">
                <div class="h-100 bg-secondary rounded-3 text-center p-4"> 
                  <h2 class="h6 pb-2 mb-1"> Messages</h2>
                  <div class="h2 text-primary mb-2">{{ $messages_count }}</div>
                </div>
              </div>
              <div class="col-md-4 col-sm-6">
                <div class="h-100 bg-secondary rounded-3 text-center p-4">
                  <h2 class="h6 pb-2 mb-1">Courses  </h2>
                  <div class="h2 text-primary mb-2">{{ $courses_count }}</div>
                </div>
              </div>
              <div class="col-md-4 col-sm-12">
                <div class="h-100 bg-secondary rounded-3 text-center p-4">
                  <h2 class="h6 pb-2 mb-1">Teachers</h2>
                  <div class="h2 text-primary mb-2">{{ $teachers_count }}</div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>
  <!-- Divider for dark mode only-->
  <hr class="d-none d-dark-mode-block">
  <!-- Sidebar toggle button-->
  <button class="d-lg-none btn btn-sm fs-sm btn-primary w-100 rounded-0 fixed-bottom" data-bs-toggle="offcanvas" data-bs-target="#sidebarAccount"><i class="ai-menu me-2"></i>Account menu</button>
@endsection