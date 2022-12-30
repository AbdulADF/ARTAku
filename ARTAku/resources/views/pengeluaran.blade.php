<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ARTAku | Home</title>
    <link rel="stylesheet" href="{{'/assets/styles/pengeluaran.css'}}">
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
            <img src="{{'/assets/images/Home.png'}}" alt="" id="home_img">
            Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="pengeluaran_link" href="/pengeluaran">
            <img src="{{'/assets/images/Pengeluaran_WhiteFill.png'}}" alt="" id="pengeluaran_img">
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
                Expenses
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
      <div>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
      </div>
        <div class="container d-flex justify-content-center align-items-center" id="main_container">
          <div class="container rounded-4 d-flex flex-column align-items-end" id="expense_container">
            <div class="container d-flex justify-content-center align-items-center" id="navbar_container">
              <ul class="nav" id="inner_nav">
                <li class="nav-item">
                  <a class="nav-link" id="container_title">Expenses History</a>
                </li>
              
              </ul>
            </div>
            
            <div class="container mt-4 position-relative d-flex flex-column align-items-end" id="expense_item_container">
              {{-- Loop Item Disini --}}
              @foreach ($expenses as $expense)
                <div class="container" id="expense_items">
                  <div class="row" id="item_row">
                    <div class="col-7 d-flex flex-column align-items-start justify-content-center" id="expense_info">
                      <p class="mb-0" id="expense_name">{{$expense->description}}</p>
                      <p class="mb-0" id="expense_price">- {{number_format($expense->amount, 0, ',', '.')}}</p>
                      <p class="mb-0"id="expense_type">{{$expense->category->name}}</p>
                    </div>
                    <div class="col d-flex align-items-center justify-content-center">
                      <a href="/pengeluaran/{{ $expense->id }}/edit" class="btn d-flex justify-content-center align-items-center me-4 shadow" id="edit_button">Edit</a>
                      <form action="/pengeluaran/{{ $expense->id }}" method="post">
                        @method('delete')
                        @csrf
                        <button class="me-4 border-0" onclick="return confirm('Are you sure ?')">
                          <img src="{{'/assets/images/mdi_trash.png'}}" alt="">
                        </button>
                      </form>
                      <a class=" d-flex justify-content-center align-items-center" id="tanggal_expense">{{$expense->date}}</a>
                    </div>
                  </div>
                </div>
              @endforeach
              {{-- End Loop Item Disini --}}
              
            </div>
            <a href="/create_expense" class="btn rounded-circle d-flex justify-content-center align-items-center me-5 mb-4 shadow" id="create_button"><img src="{{'assets/images/PlusSign_WhiteFill.png'}}" alt="" id="plussign">
            </a>
          </div>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>