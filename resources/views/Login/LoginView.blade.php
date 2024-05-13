<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StudyPro | Login</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>
        .divider:after,
.divider:before {
content: "";
flex: 1;
height: 1px;
background: #eee;
}
.h-custom {
height: calc(100% - 73px);
}
h1{
  text-align: center;
}
h2{
  text-align: center;
}
@media (max-width: 450px) {
.h-custom {
height: 100%;
}
}
    </style>
</head>
<body>
    
<section class="vh-100">
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-5">
        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
          class="img-fluid" alt="Sample image">
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
        <form method="POST" action="{{ route('login') }}">
          @csrf
          <!-- Username input -->
          <h1>StudyPro</h1>
          <h2>Login</h2>
          <div data-mdb-input-init class="form-outline mb-4">
          <label class="form-label" for="form3Example3">Username</label>
            <input type="username" id="form3Example3" class="form-control form-control-lg" required/>
          </div>

          <!-- Password input -->
          <div data-mdb-input-init class="form-outline mb-3">
          <label class="form-label" for="form3Example4">Password</label>
            <input type="password" id="form3Example4" class="form-control form-control-lg" required/>
          </div>
          <!--Role-->
          <div data-mdb-input-init class="form-outline mb-3">
              <label class="form-label" for="form3Example4">Role</label>
              <select id="form3Example4" class="form-select form-select-lg" required>
                  <option value="">Select Role</option>
                  <option value="Staff">Staff</option>
                  <option value="Mentor">Mentor</option>
                  <option value="Platinum">Platinum</option>
              </select>
          </div>


          <div class="d-flex justify-content-between align-items-center">
            <!-- Checkbox -->
            <div class="form-check mb-0">
              <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
              <label class="form-check-label" for="form2Example3">
                Remember me
              </label>
            </div>
            <a href="/loginReset" class="text-body">Forgot password?</a>
          </div>

          <div class="text-center text-lg-start mt-4 pt-2">
            <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg"
              style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
            <p class="small fw-bold mt-2 pt-1 mb-0">First time user? <a href="/loginVerify"
                class="link-danger">Verify account</a></p>
          </div>

        </form>
      </div>
    </div>
  </div>
  <div
    class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-primary">
    <!-- Copyright -->
    <div class="text-white mb-3 mb-md-0">
      Copyright © 2024. StudyPro. All rights reserved.
    </div>
    <!-- Copyright -->

    
  </div>
</section>



</body>
</html>