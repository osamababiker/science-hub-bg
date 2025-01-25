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

        <div class="card border-0 py-1 p-md-2 p-xl-3 p-xxl-4">
          <div class="card-body pb-4">
            <!-- bio -->
            @include('admin/components/feedback')
                <form autocomplete="off" method="post" action="{{ route('admin.testimonials.store') }}">
                    @csrf
                    <div class="mb-3 mb-sm-4">
                    <label for="en_title" class="form-label">title (en)</label>
                    <input type="text" class="form-control" name="en_title" id="en_title" placeholder="Enter the title in english">
                    </div>
                    <div class="mb-3 mb-sm-4">
                    <label for="ar_title" class="form-label">title (ar)</label>
                    <input type="text" class="form-control" name="ar_title" id="ar_title" placeholder="Enter the title in arabic ">
                    </div>
                    <div class="mb-3 mb-sm-4">
                    <label for="sub_of" class="form-label">relevent Course</label>
                    <select name="sub_of" id="sub_of" class="form-control">
                        @foreach($courses as $course)
                        <option value="{{ $course->id }}">{{ $course->en_name }}</option>
                        @endforeach
                    </select>
                    </div>
                    <div class="mb-3 mb-sm-4">
                    <label for="user_id" class="form-label"> user </label>
                    <select name="user_id" id="user_id" class="form-control">
                        @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                    </div>
                    <div class="mb-3 mb-sm-4">
                      <label for="en_content" class="form-label">content (en)</label>
                      <textarea name="en_content" id="en_content" cols="8" rows="8" class="form-control"></textarea>
                    </div>
                    <div class="mb-3 mb-sm-4">
                      <label for="ar_content" class="form-label">content (ar)</label>
                      <textarea name="ar_content" id="ar_content" cols="8" rows="8" class="form-control"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Save Details</button>
                </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Divider for dark mode only-->
  <hr class="d-none d-dark-mode-block">
  <!-- Sidebar toggle button-->
  <button class="d-lg-none btn btn-sm fs-sm btn-primary w-100 rounded-0 fixed-bottom" data-bs-toggle="offcanvas" data-bs-target="#sidebarAccount"><i class="ai-menu me-2"></i>Account menu</button>
@endsection