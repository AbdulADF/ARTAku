<!doctype html>
<html lang="en">
  <head>
    <script src="https://kit.fontawesome.com/f0d1171b0d.js" crossorigin="anonymous"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ARTAku | Home</title>
    <link rel="stylesheet" href="{{'/assets/styles/edit_expense.css'}}">
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
        <div class="container d-flex justify-content-center align-items-center" id="main_container">
          <div class="container rounded-4 d-flex flex-column align-items-center" id="create_container">
            <h1 class="mt-3" id="create_title">Edit Your Expense.</h1>
            <form action="/pengeluaran/{{ $expense->id }}" method="post" id="expense_form">
              @method('put')
              @csrf
                <div class="mb-3">
                    <label for="expense_description" class="form-label fw-bold">Description</label>
                    <input type="text" name="description" class="form-control" id="expense_description" placeholder="Enter a brief description" value="{{ old('description', $expense->description) }}">
                  </div>
                  <div class="mb-3">
                    <label for="expense_price" class="form-label fw-bold">Amount</label>
                    <br>
                    <div class="row" id="price_row">
                        <div class="col d-flex justify-content-center align-items-center" id="price_complementer">Rp.
                         </div>
                         <div class="col-9 px-0 mx-0">
                            <input type="number" name="amount" id="expense_price" class="form-control" placeholder="Enter amount" value="{{ old('amount', $expense->amount) }}">
                        </div>
                    </div>
                  </div>
                  <div class="mb-3">
                    <label for="category_dropdown" class="form-label fw-bold">Choose Category</label>
                    <select class="form-select" name="category_id" id="category_dropdown">
                        <option selected id="dropdown_placeholder">Category</option>
                        {{-- loop ini atau tambah option manual--}}
                        
                        @foreach ($categories as $category)
                          @if ( old('category_id', $expense->category_id) == $category->id )
                            <option value={{ $category->id }} selected>{{$category->name}}</option>
                          @else
                            <option value={{ $category->id }}>{{$category->name}}</option>
                          @endif
                        @endforeach
                        {{-- loop ini atau tambah option manual--}}
                      </select>
                  </div>
                  <div class="mb-3" id="date_picker">
                    <label for="date_input" id="date_caption" class="fw-bold">Date</label>
                    <input type="date" id="date_input" name="date" class="form-control" value="{{ old('date', $expense->date) }}" placeholder="01/01/2022">
                  </div>
                  
                  <div class="container d-flex justify-content-end align-items-end" id="create_button_container">
                    <button type="submit" class="btn me-0 mb-3 shadow rounded-3" id="create_button">Save</button>
                  </div>
            </form>
            
          </div>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>