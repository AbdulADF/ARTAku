<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ARTAku | Login</title>
    <link rel="stylesheet" href="{{'/assets/styles/styles.css'}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body class="d-flex justify-content-center align-items-center">
    <div class="row" id="login_row">
        <div class="col d-flex flex-column justify-content-center align-items-center"> 
            <img src="{{'/assets/images/Login_Illust.png'}}" alt="" id="login_image">
        </div>
        <div class="col d-flex flex-column justify-content-center align-items-center me-5"> 
            <div class="container d-flex align-items-center flex-column" id="login_container">
                <div class="row" id="login_container_row">
                    <div class="col-4 d-flex justify-content-center align-items-end ms-3">
                        <img src="{{'/assets/images/ARTAku_ic.png'}}" alt="" id="artaku_login_icon">
                    </div>
                    <div class="col d-flex justify-content-end align-items-center flex-column">
                        <p class="fw-bold" id="login_subtitle">Welcome back to </p>
                        
                        <p class="fs-3 mb-0" id="login_title">A R T A k u</p>

                    </div>
                </div>
                <div class="row d-flex justify-content-center align-items-center" id="login_form_row">
                    <form class="d-flex align-items-center flex-column justify-content-center"
                    method="POST" action="/login" id="login_form">
                        @csrf
                        <div class=" d-flex flex-column justify-content-end mt-3" id="login_form_content">
                          <input type="text" placeholder="Username" class="form-control" id="username_input" name="username">
                        </div>
                        <div class=" d-flex flex-column justify-content-start mt-3" id="login_form_content">
                          <input type="password" placeholder="Password" class="form-control" id="password_input" name="password">
                        </div>
                        <div class=" d-flex flex-column justify-content-start text-center" id="login_form_content">
                            <button type="submit" class="btn" id="login_button">Log in</button>
                            <a class="mt-1" href="" id="login_forgot_password">Forgot Password?</a>
                        </div>
                        
                      </form>
                </div>
            </div>
            <div class="container mt-5 text-center d-flex flex-row justify-content-center align-items-center" id="login_register_link">
                <p class="mb-0 fw-semibold">Don't have an account?</p>
                <a class="ms-1 fw-semibold" href="/register" id="login_register_button">Register</a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>