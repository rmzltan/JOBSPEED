<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="{{ asset('css-js/custom.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('css-js/index.css') }}">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
  <script src="https://kit.fontawesome.com/6ddf20ea5f.js" crossorigin="anonymous"></script>

  <title>@yield('title')</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light p-md-1 sticky-top bgcolor">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <svg class="logo" id="Component_1_1" data-name="Component 1 – 1" xmlns="http://www.w3.org/2000/svg" width="131" height="80"
          viewBox="0 0 131 80">
          <path id="Exclusion_1" data-name="Exclusion 1"
            d="M-2100.456-34a42.275,42.275,0,0,1-18.362-4.128,41.769,41.769,0,0,1-7.735-4.791,41.027,41.027,0,0,1-6.431-6.282h39.307a4,4,0,0,0,4-4,4,4,0,0,0-4-4h-44.411a39.036,39.036,0,0,1-1.655-4h35.288a4,4,0,0,0,4-4,4,4,0,0,0-4-4h-37.16a39.157,39.157,0,0,1-.287-4H-2186a4,4,0,0,1-4-4,4,4,0,0,1,4-4h44.759a38.988,38.988,0,0,0-.67,7.2c0,.268,0,.536.008.8h23.352a4,4,0,0,0,4-4,4,4,0,0,0-4-4h-22.691a38.745,38.745,0,0,1,.977-4h32.492a4,4,0,0,0,4-4,4,4,0,0,0-4-4h-29.06a40.86,40.86,0,0,1,14.947-15.049A42.526,42.526,0,0,1-2100.456-114a42.494,42.494,0,0,1,16.137,3.143,41.433,41.433,0,0,1,13.177,8.573,39.823,39.823,0,0,1,8.884,12.715A38.548,38.548,0,0,1-2059-74a38.547,38.547,0,0,1-3.258,15.57,39.822,39.822,0,0,1-8.884,12.714,41.433,41.433,0,0,1-13.177,8.572A42.5,42.5,0,0,1-2100.456-34Zm-32.528-15.2h-19.022a4,4,0,0,1-4-4,4.005,4.005,0,0,1,4-4h13.918a39.845,39.845,0,0,0,5.1,8Zm-6.759-12h-27.187a4.005,4.005,0,0,1-4-4,4,4,0,0,1,4-4h25.314a38.7,38.7,0,0,0,1.872,8Zm-.521-24h-34.958a4,4,0,0,1-4-4,4,4,0,0,1,4-4h38.39a39.09,39.09,0,0,0-3.432,8Z"
            transform="translate(2190 114)" fill="#4f2982" />
        </svg>
      </a>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-lg-0 mb-2">
          @if (Session()->has('signInId'))
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="/feed">Feed</a>
            </li>
                @if ($data->role=='user')
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="{{ url('/add-info')}}">Freelancer</a>
                </li>
                @elseif ($data->role=='seller')
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="{{ url('/Dashboard')}}">Freelancer</a>
                </li>
                @endif
            
          @else
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="/index.blade.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="/SignIn.blade.php">Freelancer</a>
            </li>
          @endif
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/About-Us.blade.php">About Us</a>
          </li>
        </ul>
        @if (Session()->has('signInId'))
          <form class="d-flex">
            <ul class="navbar-nav me-auto mb-lg-0 mb-2">
              <li class="nav-item">
                <i style="margin-top:20px;" class="fa-solid fa-bell"></i>
              </li> 
              <li class="nav-item dropdown">
                <a class="nav-link text-dark" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  <img class="nav-default-img"src="{{ asset('/Images/uploaded-profile') . '/' . $data->profile_image }}">
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="">Profile</a></li>
                  <li>
                    <hr class="dropdown-divider">
                  </li>
                  <li><a class="dropdown-item" href="/logout">Log Out</a></li>
                </ul>
              </li>
            </ul>
          </form>
        @else
          <form class="d-flex">
            <ul class="navbar-nav me-auto mb-lg-0 mb-2">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/SignIn.blade.php">Sign In</a>
              </li>
            </ul>
            <a class="sinupbtn btn btn-outline-success" type="submit" href="/SignUp.blade.php">Sign Up</a>
          </form>
        @endif
      </div>
    </div>
  </nav>
</body>

</html>
