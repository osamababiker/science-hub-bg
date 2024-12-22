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
        <!-- Basic info-->
        <section class="card border-0 py-1 p-md-2 p-xl-3 p-xxl-4 mb-4">
          <div class="card-body">
            <!-- Feedback -->
            @include('admin/components/feedback')
            <form id="updateSettingsForm" method="post" action="{{ route('admin.settings.update', ['setting' => $settings->id]) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row g-3 g-sm-4 mt-0 mt-lg-2">
                    <div class="col-sm-6">
                        <label class="form-label" for="company_name">Company name</label>
                        <input class="form-control" name="company_name" type="text" value="{{ $settings->company_name }}" id="company_name">
                    </div>
                    <div class="col-sm-6">
                        <label class="form-label" for="company_slogan">Company slogan</label>
                        <input class="form-control" type="text" name="company_slogan" value="{{ $settings->company_slogan}}" id="company_slogan">
                    </div>
                    <div class="col-sm-12">
                        <label class="form-label" for="logo">Company logo</label>
                        <input class="form-control" type="file" name="logo" id="logo">
                    </div>
                    <div class="col-sm-6">
                        <label class="form-label" for="primary_email">Primary name</label>
                        <input class="form-control" name="primary_email" type="email" value="{{ $settings->primary_email }}" id="primary_email">
                    </div>
                    <div class="col-sm-6">
                        <label class="form-label" for="secondary_email">Secondary email</label>
                        <input class="form-control" type="email" name="secondary_email" value="{{ $settings->secondary_email}}" id="secondary_email">
                    </div>
                    <div class="col-sm-6">
                        <label class="form-label" for="primary_phone">Primary phone</label>
                        <input class="form-control" name="primary_phone" type="text" value="{{ $settings->primary_phone }}" id="primary_phone">
                    </div>
                    <div class="col-sm-6">
                        <label class="form-label" for="secondary_phone">Secondary phone</label>
                        <input class="form-control" type="text" name="secondary_phone" value="{{ $settings->secondary_phone}}" id="secondary_phone">
                    </div>
                    <div class="col-sm-4">
                        <label class="form-label" for="facebook_link">Facebook link</label>
                        <input class="form-control" name="facebook_link" type="text" value="{{ $settings->facebook_link }}" id="facebook_link">
                    </div>
                    <div class="col-sm-4">
                        <label class="form-label" for="twitter_link">Twitter link</label>
                        <input class="form-control" type="text" name="twitter_link" value="{{ $settings->twitter_link}}" id="twitter_link">
                    </div>
                    <div class="col-sm-4">
                        <label class="form-label" for="linkedin_link">Linkedin link</label>
                        <input class="form-control" type="text" name="linkedin_link" value="{{ $settings->linkedin_link}}" id="linkedin_link">
                    </div>
                    <div class="col-sm-6">
                        <label class="form-label" for="youtube_link">Youtube link</label>
                        <input class="form-control" type="text" name="youtube_link" value="{{ $settings->youtube_link}}" id="youtube_link">
                    </div>
                    <div class="col-sm-6">
                        <label class="form-label" for="instagram_link">Instagram link</label>
                        <input class="form-control" type="text" name="instagram_link" value="{{ $settings->instagram_link}}" id="instagram_link">
                    </div>
                    <div class="col-sm-12">
                        <label class="form-label" for="company_bio">Company bio</label>
                        <textarea rows="6" cols="6" name="company_bio" class="form-control tiny-editor" id="company_bio">{{ $settings->company_bio }}</textarea>
                    </div>
                    <div class="col-sm-12">
                        <label class="form-label" for="privacy_policy">Privacy policy</label>
                        <textarea rows="6" cols="6" name="privacy_policy" class="form-control tiny-editor" id="privacy_policy">{{ $settings->privacy_policy }}</textarea>
                    </div>
                    <div class="col-sm-12">
                        <label class="form-label" for="terms_of_use">Terms of use</label>
                        <textarea rows="6" cols="6" name="terms_of_use" class="form-control tiny-editor" id="terms_of_use">{{ $settings->terms_of_use }}</textarea>
                    </div>
                    <div class="col-12 d-flex justify-content-end pt-3">
                        <button class="btn btn-secondary" type="button">Cancel</button>
                        <button class="btn btn-primary ms-3" form="updateSettingsForm" type="submit">Save changes</button>
                    </div>
                </div>
            </form>
          </div>
        </section>
        <!-- Password-->
        <section class="card border-0 py-1 p-md-2 p-xl-3 p-xxl-4 mb-4">
          <div class="card-body">
            <div class="d-flex align-items-center pb-4 mt-sm-n1 mb-0 mb-lg-1 mb-xl-3"><i class="ai-lock-closed text-primary lead pe-1 me-2"></i>
              <h2 class="h4 mb-0">Password change</h2>
            </div>
            <form id="changePasswordForm" method="post" action="{{ route('changePassword') }}">
                @csrf
                <div class="row align-items-center g-3 g-sm-4 pb-3">
                <div class="col-sm-6">
                    <label class="form-label" for="current-pass">Current password</label>
                    <div class="password-toggle">
                    <input class="form-control" name="current_password" type="password"  id="current-pass">
                    <label class="password-toggle-btn" aria-label="Show/hide password">
                        <input class="password-toggle-check" type="checkbox"><span class="password-toggle-indicator"></span>
                    </label>
                    </div>
                </div>
                <div class="col-sm-6"><a class="d-inline-block fs-sm fw-semibold text-decoration-none mt-sm-4" href="#">Forgot password?</a></div>
                <div class="col-sm-6">
                    <label class="form-label" for="new-pass">New password</label>
                    <div class="password-toggle">
                    <input class="form-control" name="password" type="password" id="new-pass">
                    <label class="password-toggle-btn" aria-label="Show/hide password">
                        <input class="password-toggle-check" type="checkbox"><span class="password-toggle-indicator"></span>
                    </label>
                    </div>
                </div>
                <div class="col-sm-6">
                    <label class="form-label" for="confirm-pass">Confirm new password</label>
                    <div class="password-toggle">
                    <input class="form-control" name="password_confirmation" type="password" id="confirm-pass">
                    <label class="password-toggle-btn" aria-label="Show/hide password">
                        <input class="password-toggle-check" type="checkbox"><span class="password-toggle-indicator"></span>
                    </label>
                    </div>
                </div>
                </div>
                <div class="alert alert-info d-flex my-3 my-sm-4"><i class="ai-circle-info fs-xl me-2"></i>
                <p class="mb-0">Password must be minimum 8 characters long - the more, the better.</p>
                </div>
                <div class="d-flex justify-content-end pt-3">
                <button class="btn btn-secondary" type="button">Cancel</button>
                <button class="btn btn-primary ms-3" form="changePasswordForm" type="submit">Save changes</button>
                </div>
            </div>
            </form>
        </section>
      </div>
    </div>
  </div>
  <!-- Divider for dark mode only-->
  <hr class="d-none d-dark-mode-block">
  <!-- Sidebar toggle button-->
  <button class="d-lg-none btn btn-sm fs-sm btn-primary w-100 rounded-0 fixed-bottom" data-bs-toggle="offcanvas" data-bs-target="#sidebarAccount"><i class="ai-menu me-2"></i>Account menu</button>
@endsection