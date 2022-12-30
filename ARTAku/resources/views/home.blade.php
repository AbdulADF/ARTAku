<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ARTAku | Home</title>
    <link rel="stylesheet" href="{{'/assets/styles/home.css'}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body class="d-flex">
    <ul class="nav flex-column" id="navbar">
        <div class="container-fluid" id="navbar_icon">
            <img src="{{'/assets/images/ARTAku_ic3.png'}}" alt="">
        </div>
        <li class="nav-item">
            <p class="nav-link" id="menu_title">Menu</p>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="home_link" href="/home">
            <img src="{{'/assets/images/Home_WhiteFill.png'}}" alt="" id="home_img">
            Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="pengeluaran_link" href="/pengeluaran">
            <img src="{{'/assets/images/Pengeluaran.png'}}" alt="" id="pengeluaran_img">
            Pengeluaran</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="pemasukan_link" href="/pemasukan">
            <img src="{{'/assets/images/Pemasukan.png'}}" alt="" id="pemasukan_img">
            Pemasukan</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="budget_link" href="/budget">
            <img src="{{'/assets/images/Budget.png'}}" alt="" id="budget_img">
            Budget</a>
        </li>
      </ul>
    <div class="d-flex flex-column align-items-center" id="home">
        <div class="row" id="main_navbar">
            <div class="col d-flex align-items-center ms-3" id="page_title">
                Dashboard
            </div>
            <div class="col d-flex align-items-center justify-content-end" id="dropdown_container">
                <div class="dropdown pe-5" id="dropdown_pill">
                    <a class="btn dropdown-toggle rounded-3 d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" id="dropdown">
                      <div class="d-flex justify-content-center align-items-center">
                        <p id="dropdown_text" class="mt-3">
                            <img src="{{'/assets/images/Profile.png'}}" alt="" id="profile_img" class="pe-2">
                              {{Str::limit(Auth::user()->name, 15)}}</p>
                      </div>
                      <div class="col"></div>
                    </a>
                  
                    <ul class="dropdown-menu" id="dropdown_menu">
                      <li><a class="dropdown-item" href="/logout" id="logout_button">
                        <img src="{{'/assets/images/Logout.png'}}" alt="" id="logout_img" class="pe-2">
                        Log Out</a></li>
                      
                    </ul>
                  </div>
            </div>
        </div>
        <div class="row" id="home_container">
          <div class="col-7 d-flex flex-column align-items-end justify-content-end ms-5">
            <div class="container rounded-4" id="intro_container">
              <h1 class="mt-3 ms-2" id="home_name">Hiii, {{strtok(Auth::user()->name, ' ')}}!</h1>
              <p class="ms-2" id="total_pengeluaran_caption">Total Pengeluaran Bulan Ini</p>
              <h2 class="ms-2" id="total_pengeluaran_sum">Rp. {{ number_format($expenseTotal, 0, ',', '.') }}</h2>
              <div class="ms-2 d-flex">
                <div class="d-flex justify-content-center align-items-center rounded-3 px-1" id="percentage_container">{{number_format($usedPercentage , 0 , '.' , ',') ."%"}}</div>
                <div class="d-flex justify-content-center align-items-center ms-1" id="anggaran_caption">Dari Anggaran Kamu</div>
              </div>
            </div>
          </div>
          <div class="col d-flex flex-column align-items-start justify-content-end me-5">
            <div class="container rounded-4 d-flex flex-column align-items-center" id="budget_container">
              <h5 class="mt-3" id="budget_plan_text">Your Budgeting Plan</h5>
              @if ($User->budgeting_plan_id == 1)
                <img src="{{'/assets/images/Strict.png'}}" alt="">
              @elseif ($User->budgeting_plan_id == 2)
                <img src="{{'/assets/images/Moderate.png'}}" alt="">
              @elseif ($User->budgeting_plan_id == 3)
                <img src="{{'/assets/images/Lavish.png'}}" alt="">
              @endif
              <h5 class="mt-1" id="budget_plan_text">{{$User->budgeting_plan->name}}</h5>
              <a href="/budget" id="change_button" class="mb-1 rounded-3 d-flex justify-content-center align-items-center shadow">
                Change
              </a>
            </div>
          </div>
        </div>
        <div class="row" id="home_container2">
          <div class="col d-flex flex-column align-items-center justify-content-center ms-5 me-5">
            <div class="container rounded-4 d-flex flex-column align-items-center " id="latest_container">
              <h5 class="text-center d-flex flex-column align-items-center justify-content-center" id="expense_caption">Your Latest Expenses</h5>
              
              <div class="container" id="expense_container">

                @foreach ($expenses as $expense)
                  <div class="container d-flex justify-content-center flex-column" id="expense_row">
                    <p>
                      <h5 id="expense_item" class="mt-2">{{$expense->description}}</h5>
                      <h5 id="expense_price">- {{number_format($expense->amount, 0, ',', '.') }}</h5>
                      <h5 id="expense_category">{{$expense->category->name}}</h5>
                    </p>
                  </div>
                @endforeach
              </div>
              
              
            </div>
          </div>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>