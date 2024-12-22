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
            <!-- Feedback -->
            @include('admin/components/feedback') 
            <div class="">
                <form autocomplete="off" method="post" action="{{ route('admin.teachers.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3 mb-sm-4">
                    <label for="en_name" class="form-label">teacher name (english)</label>
                    <input type="text" name="en_name" class="form-control" id="en_name" placeholder="Enter teacher name in english">
                    </div>
                    <div class="mb-3 mb-sm-4">
                    <label for="ar_name" class="form-label">teacher name (arabic)</label>
                    <input type="text" name="ar_name" class="form-control" id="ar_name" placeholder="Enter teacher name in arabic">
                    </div>
                    <div class="mb-3 mb-sm-4">
                    <label for="role_en" class="form-label">teacher role (english)</label>
                    <input type="text" name="role_en" class="form-control" id="role" placeholder="Enter teacher role">
                    </div>
                    <div class="mb-3 mb-sm-4">
                    <label for="role_ar" class="form-label">teacher role (arabic)</label>
                    <input type="text" name="role_ar" class="form-control" id="role" placeholder="Enter teacher role">
                    </div>
                    <div class="mb-3 mb-sm-4">
                    <label for="rating" class="form-label">teacher rating</label>
                    <input type="text" name="rating" class="form-control" id="rating" placeholder="Enter teacher rating">
                    </div>
                    <div class="mb-3 mb-sm-4">
                    <label for="students" class="form-label">teacher students number</label>
                    <input type="number" name="students" class="form-control" id="students" placeholder="Enter teacher students number">
                    </div>
                    <div class="mb-3 mb-sm-4">
                    <label for="courses" class="form-label">teacher courses number</label>
                    <input type="number" name="courses" class="form-control" id="courses" placeholder="Enter teacher courses number">
                    </div>
                    <div class="mb-3 mb-sm-4">
                    <label for="sub_of" class="form-label">teacher Category</label>
                    <select name="sub_of" id="sub_of" class="form-control">
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->en_name }}</option>
                        @endforeach
                    </select>
                    </div>
                    <div class="mb-3 mb-sm-4">
                    <label for="image" class="form-label">teacher Image</label>
                    <input type="file" name="image" class="form-control" id="image">
                    </div>
                    <div class="mb-3 mb-sm-4">
                      <label for="en_desc" class="form-label">teacher description (english)</label>
                      <textarea name="en_desc" id="en_desc" cols="8" rows="8" class="form-control tiny-editor"></textarea>
                    </div>
                    <div class="mb-3 mb-sm-4">
                      <label for="ar_desc" class="form-label">teacher description (arabic)</label>
                      <textarea name="ar_desc" id="ar_desc" cols="8" rows="8" class="form-control tiny-editor"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Save Details</button>
                </form>
                </div>
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