<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ARTAku | Register</title>
    <link rel="stylesheet" href="{{'/assets/styles/register.css'}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body class="d-flex justify-content-center align-items-center flex-column">
    <div class="container d-flex flex-column align-items-center text-center" id="register_container">
        <img src="{{'/assets/images/ARTAku_ic2.png'}}" alt="" class="mt-4" id="register_icon">
        <p id="form_subtitle">Register to manage and plan your expenses.</p>
        <div class="container" id="register_form_container">
            <form class="d-flex align-items-center flex-column justify-content-center" 
              method="POST" action="/register" id="register_form">
              @csrf
                <div class=" d-flex flex-column justify-content-end" id="register_form_content">
                    <input type="email" placeholder="Email" class="form-control" id="email_input" name="email">
                  </div>
                  <div class=" d-flex flex-column justify-content-end mt-1" id="register_form_content">
                    <input type="text" placeholder="Full Name" class="form-control" id="name_input" name="name">
                  </div>
                <div class=" d-flex flex-column justify-content-end mt-1" id="register_form_content">
                  <input type="text" placeholder="Username" class="form-control" id="username_input" name="username">
                </div>
                <div class=" d-flex flex-column justify-content-end mt-1" id="register_form_content">
                  <input type="password" placeholder="Password" class="form-control" id="password_input" name="password">
                </div>
                <div class=" d-flex flex-column justify-content-start text-center mt-1" id="register_form_terms">
                    <p id="policy">By Registering, you agree to our <a href="/register" id="terms">Terms</a>, <a href="/register" id="privacy">Privacy Policy</a>, and <a href="/register" id="cookies">Cookies Policy</a>.</p>
                    
                    
                </div>
                <div class=" d-flex flex-column justify-content-start text-center mb-2" id="register_form_content">
                    <button type="submit" class="btn" id="register_button">Register</button>
                    
                </div>
                
              </form>
        </div>
    </div>
    <div class="container mt-3 text-center d-flex flex-row justify-content-center align-items-center" id="login_link_container">
        <p class="mb-0 fw-semibold">Have an account?</p>
                <a class="ms-1 fw-semibold" href="/login" id="login_register_button">Login</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>