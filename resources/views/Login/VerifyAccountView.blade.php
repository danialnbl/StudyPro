<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StudyPro | Forget Password</title>
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
p{
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
      <img src="{{ url('assets/StudyProDark.png') }}" alt="">
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
      <form action="{{ route('verify') }}" method="post">
         @csrf

          <div data-mdb-input-init class="form-outline mb-4">
            <h1>Verify your account</h1>
            <p>Enter your associated email, username, and password. We will send verification notification thorugh your email.Please check your inbox or spam.</p>
          </div>

          <!-- Email input -->
          <div data-mdb-input-init class="form-outline mb-3">
          <label class="form-label" for="form3Example4">Email</label>
            <input type="email" id="form3Example4" class="form-control form-control-lg"
              placeholder="Enter email" required/>
          </div>
          <!--Username Input-->
          <div data-mdb-input-init class="form-outline mb-4">
          <label class="form-label" for="form3Example3">Username</label>
            <input type="username" id="form3Example3" class="form-control form-control-lg"
              placeholder="Enter username" required/>
          </div>
          <!-- Password input -->
          <div data-mdb-input-init class="form-outline mb-3">
          <label class="form-label" for="form3Example4">Password</label>
            <input type="password" id="form3Example4" class="form-control form-control-lg"
              placeholder="Enter password" required/>
          </div>

          <!--Button-->
          <div class="text-center text-lg-start mt-4 pt-2">
            <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg"
              style="padding-left: 2.5rem; padding-right: 2.5rem;">Verify</button>
            <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg"
              style="padding-left: 2.5rem; padding-right: 2.5rem;">Resend Verification</button>
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