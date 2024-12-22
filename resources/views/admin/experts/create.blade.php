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
                <form autocomplete="off" method="post" action="{{ route('admin.experts.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3 mb-sm-4">
                    <label for="name" class="form-label">expert name</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter expert name">
                    </div>
                    <div class="mb-3 mb-sm-4">
                    <label for="position" class="form-label">expert position</label>
                    <input type="text" class="form-control" name="position" id="position" placeholder="Enter expert position">
                    </div>
                    <div class="mb-3 mb-sm-4">
                    <label for="picture" class="form-label">expert picture</label>
                    <input type="file" name="picture" class="form-control" id="picture">
                    </div>
                    <div class="mb-3 mb-sm-4">
                    <label for="resume" class="form-label">expert resume</label>
                    <input type="file" name="resume" class="form-control" id="resume">
                    </div>
                    <div class="mb-3 mb-sm-4">
                      <label for="intro" class="form-label">expert intro</label>
                      <textarea name="intro" id="intro" cols="8" rows="8" class="form-control"></textarea>
                    </div>
                    <div class="mb-3 mb-sm-4">
                      <label for="bio" class="form-label">expert bio</label>
                      <textarea name="bio" id="bio" cols="8" rows="8" class="form-control tiny-editor"></textarea>
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