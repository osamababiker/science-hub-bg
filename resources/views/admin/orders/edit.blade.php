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
            <form autocomplete="off" method="post" action="{{ route('admin.orders.update', ['order' => $order->id]) }}" >
                @csrf
                @method('PUT')
                @csrf
                <div class="mb-3 mb-sm-4">
                <label for="status" class="form-label">order status</label>
                <select name="status" id="status" class="form-control">
                    <option selected value="{{ $order->status }}"></option>
                    <option value="1"> Is Paied </option>
                    <option value="0"> Is Un Paied </option>
                </select>
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