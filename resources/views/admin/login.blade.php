@include('../components/head')
  <!-- Body-->
  <body>

    <!-- Page wrapper-->
    <main class="page-wrapper">
      <!-- Page content-->
      <div class="d-lg-flex position-relative h-100">
        <!-- Home button--><a class="text-nav btn btn-icon bg-light border rounded-circle position-absolute top-0 end-0 p-0 mt-3 me-3 mt-sm-4 me-sm-4" href="/" data-bs-toggle="tooltip" data-bs-placement="left" title="Back to home"><i class="ai-home"></i></a>
        <!-- Sign in form-->
        <div class="d-flex flex-column align-items-center w-lg-50 h-100 px-3 px-lg-12 pt-5">
          <div class="w-100 mt-auto" style="max-width: 526px;">
            <h1>Sign in to your Account</h1>
            <form class="needs-validation" novalidate action="{{ route('login') }}" method="post">
              @csrf
              <div class="pb-3 mb-3">
                <div class="position-relative"><i class="ai-mail fs-lg position-absolute top-50 start-0 translate-middle-y ms-3"></i>
                  <input class="form-control form-control-lg ps-5" name="email" type="email" placeholder="Email address" required>
                </div>
              </div>
              <div class="mb-4">
                <div class="position-relative"><i class="ai-lock-closed fs-lg position-absolute top-50 start-0 translate-middle-y ms-3"></i>
                  <div class="password-toggle">
                    <input class="form-control form-control-lg ps-5" name="password" type="password" placeholder="Password" required>
                    <label class="password-toggle-btn" aria-label="Show/hide password">
                      <input class="password-toggle-check" type="checkbox"><span class="password-toggle-indicator"></span>
                    </label>
                  </div>
                </div>
              </div>
              <div class="d-flex flex-wrap align-items-center justify-content-between pb-4">
                <form-check class="my-1">
                  <input class="form-check-input" type="checkbox" id="keep-signedin">
                  <label class="form-check-label ms-1" for="keep-signedin">Keep me signed in</label>
                </form-check><a class="fs-sm fw-semibold text-decoration-none my-1" href="account-password-recovery.html">Forgot password?</a>
              </div>
              <button class="btn btn-lg btn-primary w-100 mb-4" type="submit">Sign in</button>
            </form>
          </div>
          <!-- Copyright-->
          <p class="w-100 fs-sm pt-5 mt-auto mb-5" style="max-width: 526px;"><span class="text-muted">&copy; All rights reserved. Made by</span><a class="nav-link d-inline-block p-0 ms-1" href="/" target="_blank" rel="noopener">Git Startup</a></p>
        </div>
       
      </div>
    </main>

     <!-- Back to top button--><a class="btn-scroll-top" href="#top" data-scroll>
     <svg viewBox="0 0 40 40" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
        <circle cx="20" cy="20" r="19" fill="none" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10"></circle>
      </svg><i class="ai-arrow-up"></i></a>
    <!-- Vendor scripts: js libraries and plugins-->

      <script src="{{ asset('assets/vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js') }}"></script>
      <!-- Main theme script-->
      <script src="{{ asset('assets/js/theme.min.js') }}"></script>
   

  </body>
</html>