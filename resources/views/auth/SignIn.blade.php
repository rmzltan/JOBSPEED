<!--
php
   if(!isset($_SESSION))
   {
    session_start();
   }


   include_once("data-connection.blade.php");

    if (isset($_GET["btnlogin"])) {
        $searchUsername = $_GET['txtusername'];
        $searchPassword = $_GET['txtpassword'];
    
        $createConnection = setUpConnection();
        $user = $createConnection->query("SELECT * FROM tbluser WHERE username='$searchUsername'") or die($createConnection->error);
        $usercred = $user->fetch_assoc();

        if ($usercred>0) {
            $_SESSION[ 'UserLogin']=$usercred['username' ];
                echo header("Location:Feed.php");
            
        } else {}
        echo "<script>
          alert('INVALID USERNAME OR PASSWORD')
        </script>";
    }
        
endphp
-->
@extends('layouts.master')
@section('title', 'Sign In | JobSpeed')
@section('main-container')
  <link rel="stylesheet" type="text/css" href="{{ url('css-js/signin-signup.css') }}">

  <body>
    <div class="box">
      <!--Design to sa tabi yung bilog bilog and hexagon na background-->
      <div class="container-fluid">
        <div class="row">
          <div class="CHECK col">
            <div class="compass">
              <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="573.075"
                height="563.151" viewBox="0 0 573.075 563.151">
                <defs>
                  <linearGradient id="linear-gradient" x1="0.518" y1="0.382" x2="0.928" y2="0.96"
                    gradientUnits="objectBoundingBox">
                    <stop offset="0" stop-color="#4f2982" />
                    <stop offset="1" stop-color="#281541" />
                  </linearGradient>
                  <linearGradient id="linear-gradient-2" x1="0.537" y1="0.545" x2="0.918" y2="0.987"
                    xlink:href="#linear-gradient" />
                  <linearGradient id="linear-gradient-3" x1="0.6" y1="0.615" x2="0.986" y2="0.973"
                    xlink:href="#linear-gradient" />
                  <linearGradient id="linear-gradient-4" x1="0.486" y1="0.543" x2="0.5" y2="1"
                    xlink:href="#linear-gradient" />
                  <linearGradient id="linear-gradient-5" x1="0.465" y1="0.407" x2="0.968" y2="0.938"
                    xlink:href="#linear-gradient" />
                  <linearGradient id="linear-gradient-6" x1="0.515" y1="0.46" x2="0.5" y2="1"
                    xlink:href="#linear-gradient" />
                  <linearGradient id="linear-gradient-7" x1="0.533" y1="0.435" x2="0.5" y2="1"
                    xlink:href="#linear-gradient" />
                </defs>
                <g id="Group_131" data-name="Group 131" transform="translate(-314.913 -227.422)">
                  <g id="Path_37" data-name="Path 37" transform="translate(597.407 227.92) rotate(3)" fill="none">
                    <path d="M4.973.007,19.809,283.089-9.642,232.426Z" stroke="none" />
                    <path
                      d="M 4.882341861724854 17.38418579101562 L -8.62486743927002 232.1857604980469 L 18.59346961975098 279.0082702636719 L 4.882341861724854 17.38418579101562 M 4.973050117492676 0.007415771484375 L 19.80869293212891 283.0885620117188 L -9.641949653625488 232.4259185791016 L 4.973050117492676 0.007415771484375 Z"
                      stroke="none" fill="#4f2982" />
                  </g>
                  <path id="Path_38" data-name="Path 38" d="M32.443,282.689,13.6.027-9.069,54.421Z"
                    transform="matrix(-0.998, -0.07, 0.07, -0.998, 614.952, 512.15)" fill="url(#linear-gradient)" />
                  <path id="Path_37-2" data-name="Path 37" d="M10.455,185.716,20.229-.35-.727,55.833Z"
                    transform="translate(588.409 492.749) rotate(42)" fill="#4f2982" />
                  <g id="Path_38-2" data-name="Path 38"
                    transform="matrix(-0.755, -0.656, 0.656, -0.755, 490.076, 653.186)" fill="none">
                    <path d="M23.85-.546,10.9,185.7l-13.13-56.66Z" stroke="none" />
                    <path
                      d="M 21.78028869628906 14.80769348144531 L -1.20490837097168 129.0226287841797 L 10.36814975738525 178.9631195068359 L 21.78028869628906 14.80769348144531 M 23.85009574890137 -0.545928955078125 L 10.90235710144043 185.6979827880859 L -2.22795295715332 129.0375671386719 L 23.85009574890137 -0.545928955078125 Z"
                      stroke="none" fill="#4f2982" />
                  </g>
                  <g id="Path_37-3" data-name="Path 37" transform="translate(461.343 389.168) rotate(-43)" fill="none">
                    <path d="M12.875.216l9.7,184.72L1.644,129.167Z" stroke="none" />
                    <path
                      d="M 12.62806415557861 14.57745361328125 L 2.660032272338867 129.0282135009766 L 21.24025535583496 178.5264129638672 L 12.62806415557861 14.57745361328125 M 12.87504959106445 0.2162628173828125 L 22.57835960388184 184.9366912841797 L 1.644121170043945 129.1673278808594 L 12.87504959106445 0.2162628173828125 Z"
                      stroke="none" fill="#4f2982" />
                  </g>
                  <path id="Path_38-3" data-name="Path 38" d="M26.967,185.216,14.114.314.955,56.575Z"
                    transform="matrix(-0.743, 0.669, -0.669, -0.743, 614.69, 499.959)" fill="url(#linear-gradient-2)" />
                  <g id="Path_37-4" data-name="Path 37"
                    transform="matrix(-0.755, 0.656, -0.656, -0.755, 737.382, 628.466)" fill="none">
                    <path d="M12.874.2,22.4,181.446l-20.878-54.7Z" stroke="none" />
                    <path
                      d="M 12.61309909820557 14.29420471191406 L 2.533714294433594 126.6021881103516 L 21.06340408325195 175.1511840820312 L 12.61309909820557 14.29420471191406 M 12.87403964996338 0.1995697021484375 L 22.39544486999512 181.4456024169922 L 1.517063140869141 126.7428970336914 L 12.87403964996338 0.1995697021484375 Z"
                      stroke="none" fill="#4f2982" />
                  </g>
                  <path id="Path_38-4" data-name="Path 38" d="M26.724,181.729,14.112.289.881,55.519Z"
                    transform="translate(590.423 514.906) rotate(-40)" fill="url(#linear-gradient-3)" />
                  <path id="Path_37-5" data-name="Path 37" d="M10.735,180.379,20.227-.309-.642,54.222Z"
                    transform="translate(617.421 520.951) rotate(-139)" fill="url(#linear-gradient-4)" />
                  <g id="Path_38-5" data-name="Path 38"
                    transform="matrix(0.766, 0.643, -0.643, 0.766, 709.251, 362.641)" fill="none">
                    <path d="M23.846-.483,11.273,180.4-1.969,125.337Z" stroke="none" />
                    <path
                      d="M 21.80660820007324 14.43096923828125 L -0.9448051452636719 125.3194732666016 L 10.72572708129883 173.8487548828125 L 21.80660820007324 14.43096923828125 M 23.84563636779785 -0.4825286865234375 L 11.27275562286377 180.4002838134766 L -1.969173431396484 125.3367156982422 L 23.84563636779785 -0.4825286865234375 Z"
                      stroke="none" fill="#4f2982" />
                  </g>
                  <g id="Path_37-6" data-name="Path 37" transform="translate(886.145 496.549) rotate(92)"
                    fill="none">
                    <path d="M10.736-1.557l9.98,285.788L-8.209,233.719Z" stroke="none" />
                    <path
                      d="M 10.34199142456055 15.80056762695312 L -7.18706226348877 233.4906005859375 L 19.57595252990723 280.2264099121094 L 10.34199142456055 15.80056762695312 M 10.73645210266113 -1.55731201171875 L 20.71638107299805 284.230224609375 L -8.208691596984863 233.7188720703125 L 10.73645210266113 -1.55731201171875 Z"
                      stroke="none" fill="#4f2982" />
                  </g>
                  <path id="Path_38-6" data-name="Path 38" d="M30.5,284.72,15.58,0-9.025,52.52Z"
                    transform="translate(601.042 522.785) rotate(-87)" fill="url(#linear-gradient-5)" />
                  <path id="Path_37-7" data-name="Path 37" d="M10.723,285.788,20.7,0-6.186,49.013Z"
                    transform="translate(600.743 486.642) rotate(88)" fill="url(#linear-gradient-6)" />
                  <g id="Path_38-7" data-name="Path 38" transform="translate(318.458 537.681) rotate(-93)"
                    fill="#fff">
                    <path
                      d="M 15.17987060546875 282.7045288085938 L -8.539438247680664 232.2925415039062 L 29.54753875732422 8.554170608520508 L 15.17987060546875 282.7045288085938 Z"
                      stroke="none" />
                    <path
                      d="M 28.5985221862793 17.108642578125 L -8.020168304443359 232.2217254638672 L 14.78474044799805 280.6902465820312 L 28.5985221862793 17.108642578125 M 30.49653625488281 -3.0517578125e-05 L 15.57500076293945 284.7187194824219 L -9.058677673339844 232.3634033203125 L 30.49653625488281 -3.0517578125e-05 Z"
                      stroke="none" fill="#4f2982" />
                  </g>
                  <path id="Path_37-8" data-name="Path 37" d="M4.645,283.081,19.481,0-9.867,48.605Z"
                    transform="translate(583.448 507.364) rotate(-3)" fill="url(#linear-gradient-7)" />
                  <g id="Path_38-8" data-name="Path 38"
                    transform="matrix(-0.998, 0.07, -0.07, -0.998, 635.086, 787.86)" fill="none">
                    <path d="M32.328,0,13.487,282.662l-21.656-50.9Z" stroke="none" />
                    <path
                      d="M 30.08177185058594 18.665283203125 L -7.133333206176758 231.6431121826172 L 12.76785278320312 278.4172058105469 L 30.08177185058594 18.665283203125 M 32.32813262939453 0 L 13.48713397979736 282.6619873046875 L -8.169330596923828 231.7624053955078 L 32.32813262939453 0 Z"
                      stroke="none" fill="#4f2982" />
                  </g>
                </g>
              </svg>
            </div>
            <div class="circleimg1"></div>
            <div class="circleimg2"></div>
            <div class="circleimg3"></div>
            <div class="circleimg4"></div>
            <div class="circleimg5"></div>
            <div class="circleimg6"></div>
            <div class="circleimg7"></div>
            <div class="circleimg8"></div>
            <div class="circleimg9"></div>
            <div class="circle2"></div>
            <div class="circle3"></div>
            <div class="circle4"></div>
            <div>
              <div class="hexagon1">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="390"
                  height="315" viewBox="0 0 390 315">
                  <defs>
                    <linearGradient id="linear-gradient" x1="0.5" x2="0.5" y2="1"
                      gradientUnits="objectBoundingBox">
                      <stop offset="0" stop-color="#4f2982" />
                      <stop offset="1" stop-color="#a45eff" />
                    </linearGradient>
                  </defs>
                  <path id="Polygon_19" data-name="Polygon 19" d="M292.5,0,390,157.5,292.5,315H97.5L0,157.5,97.5,0Z"
                    opacity="0.99" fill="url(#linear-gradient)" />
                </svg>
              </div>
              <div class="hexagon2">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="390"
                  height="315" viewBox="0 0 390 315">
                  <defs>
                    <linearGradient id="linear-gradient" x1="0.5" x2="0.5" y2="1"
                      gradientUnits="objectBoundingBox">
                      <stop offset="0" stop-color="#4f2982" />
                      <stop offset="1" stop-color="#a45eff" />
                    </linearGradient>
                  </defs>
                  <path id="Polygon_19" data-name="Polygon 19" d="M292.5,0,390,157.5,292.5,315H97.5L0,157.5,97.5,0Z"
                    opacity="0.99" fill="url(#linear-gradient)" />
                </svg>
              </div>
              <div class="hexagon3">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="390"
                  height="315" viewBox="0 0 390 315">
                  <defs>
                    <linearGradient id="linear-gradient" x1="0.5" x2="0.5" y2="1"
                      gradientUnits="objectBoundingBox">
                      <stop offset="0" stop-color="#4f2982" />
                      <stop offset="1" stop-color="#a45eff" />
                    </linearGradient>
                  </defs>
                  <path id="Polygon_19" data-name="Polygon 19" d="M292.5,0,390,157.5,292.5,315H97.5L0,157.5,97.5,0Z"
                    opacity="0.99" fill="url(#linear-gradient)" />
                </svg>
              </div>
              <div class="hexagon4">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="390"
                  height="315" viewBox="0 0 390 315">
                  <defs>
                    <linearGradient id="linear-gradient" x1="0.5" x2="0.5" y2="1"
                      gradientUnits="objectBoundingBox">
                      <stop offset="0" stop-color="#4f2982" />
                      <stop offset="1" stop-color="#a45eff" />
                    </linearGradient>
                  </defs>
                  <path id="Polygon_19" data-name="Polygon 19" d="M292.5,0,390,157.5,292.5,315H97.5L0,157.5,97.5,0Z"
                    opacity="0.99" fill="url(#linear-gradient)" />
                </svg>
              </div>
              <div class="hexagon5">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="390"
                  height="315" viewBox="0 0 390 315">
                  <defs>
                    <linearGradient id="linear-gradient" x1="0.5" x2="0.5" y2="1"
                      gradientUnits="objectBoundingBox">
                      <stop offset="0" stop-color="#4f2982" />
                      <stop offset="1" stop-color="#a45eff" />
                    </linearGradient>
                  </defs>
                  <path id="Polygon_19" data-name="Polygon 19" d="M292.5,0,390,157.5,292.5,315H97.5L0,157.5,97.5,0Z"
                    opacity="0.99" fill="url(#linear-gradient)" />
                </svg>
              </div>
            </div>

          </div>
          <!--Sign Up-->
          <div class="CHECK signup col">
            <h1>Welcome Back</h1>
            <p>Welcome back! Please enter your details.</a></p>
            <form action="{{ route('signIn-user') }}" method="post">
              <div class="alert alert-danger" role="alert" 
                @if ($errors->has('error'))
                    style="display:block;font-size:16px;width:572px;"
                @else
                    style="display:none"
                @endif>
                  <span class="text-danger">@error('error') {{$message}} @enderror </span>
              </div>
              
              @csrf
              <div class="form-floating ">
                <input type="text" name="email"  placeholder="Email"
                  class="inputsignup form-control" value="{{ old('email') }}">
                <label for="email">Email</label>
                <span class="text-danger ms-2">@error ('email'){{ $message }} @enderror</span>
              </div>
              <div class="form-floating">
                <input type="password" name="password" placeholder="Password"
                  class="inputsignup form-control" value="{{ old('password') }}">
                <label for="password">Password</label>
                <span class="text-danger ms-2">@error ('password'){{ $message }} @enderror</span>
              </div>
              
              <input style="cursor: pointer;"type="checkbox" id="remember" name="remember" value="rememberme">
              <label for="vehicle1" style="color:#848484; font-weight:300;"> Remember me</label>
              <a class="hrefForgotpass" href="url">Forgot Password</a>

              <hr class="hrunderpassword">
              
              <br>
              <button type="submit" class="btnsignup btn btn-secondary" name="btnlogin">Sign In</button>

              <p style="position: relative;margin-top:15px;margin-left:115px;">Don't have an Account? <a
                  class="hrefsignup" href="SignUp.blade.php">Sign Up</a></p>
            </form>
          </div>
        </div>
      </div>
    </div>

  </body>
@endsection
