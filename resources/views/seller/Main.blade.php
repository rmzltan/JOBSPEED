<!--php 

include_once("data-connection.php");

$createConnection=setUpConnection();

$displayContent = "select * from tblposting";
$posts= $createConnection->query($displayContent) or die($createConnection->error);
$row = $posts->fetch_assoc();


-->
@extends('layouts.master')
@section('title', 'Dashboard | JobSpeed')
@section('main-container')
<link rel="stylesheet" type="text/css" href="css-js/main.css">
<body>
    
    <div class="container-grid">
        <div class="item grid-row-span">
            <div class="main-profile">
                <div class="cover-image">
                    <img src="{{ asset('Images/city1.jpg') }}">
                </div>
                <div class="profile-image">
                    
                    <img src="{{ asset('Images/uploaded-profile') . '/' . $data->profile_image }}">
                </div>
                <a class="previewprofile btn btn-outline-success" type="submit" href="">Preview Profile</a>
                <hr class="hr-profile">
                <h5>Skills</h5><p class="add-skill-p">Add</p>
                <div class="skills">
                    <div class="_2Ru_P">
                        <div class="_3b4NQ">
                            <div class="skill-list">
                                <div class="skill-size skill-box">HTML5</div>
                                <div class="skill-size skill-box">CSS3</div>
                                <div class="skill-size skill-box">JavaScript</div>
                                <div class="skill-size skill-box">SVG</div>
                                <div class="skill-size skill-box">C++</div>
                                <div class="skill-size skill-box">Python</div>
                                <div class="skill-size skill-box">Rust</div>
                                <div class="skill-size skill-box">Gravit</div>
                                <div class="skill-size skill-box">UI/UX</div>
                                <div class="skill-size skill-box">Github</div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="box-description">
                <p style="color:black">Description<a class="see-all-description" href="">Edit</a></p>
                
            
            <p style="color:black; font-size:16px; position:relative;margin-top:-10px;word-break: break-all;" >{{ $sellerData->description }}</p> 
            
            
            
            
           
                
                
                <hr style="background: black;">
                <p style="color:black">Credit Score</p>
                <br><br>
            </div>
            <div class="box-inbox">
                <p style="color:black">Inbox<a class="see-all-inbox" href="">See all</a></p>
            </div>
        </div>
        <div class="grid-col-span-3 appointment">
            <div class="row">
                <div class="col">
                    <h4 style="color:black;">Appointments</h4>
                </div>
                <div class="col d-flex" style="justify-content:flex-end;">
                    <a class="btn-prev btninservice btn btn-outline-success" type="submit" href="appointments">Show All</a>
                </div>
              </div>
            
            <table class="table" style="margin-top:10px;">
                <thead>
                  <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Name</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Preffered Time</th>
                    <th scope="col">Date</th>
                    <th scope="col">Location</th>
                    <th scope="col">Status</th>
                    
                  </tr>
                </thead>
                <tbody>
                    @foreach ($appointment as $appointmentData)
                    
                  <tr>
                    <th scope="row">{{ $appointmentData->id }}</th>
                    <td>{{ $appointmentData->FirstName }} {{ $appointmentData->LastName }}</td>
                    <td>{{ $appointmentData ->contact }}</td>
                    <td>{{ $appointmentData ->time }}</td>
                    <td>{{ \Carbon\Carbon::parse($appointmentData->date)->isoFormat('MMM D YYYY')}}</td>
                    <td>{{ $appointmentData ->city }}, {{ $appointmentData ->street }}</td>
                    <td>{{ $appointmentData ->status }}</td>
                  </tr>
                  @endforeach
                  
                  
                </tbody>
              </table>
        </div>
        @if (session('message'))
        <h6 class="alert alert-success">{{ session('message') }}</h6>
        @endif
        <div class=" grid-col-span-3  item item-activeservice">Active Services</div>
        @foreach ($services as $service12 )
            <div class="item">
                    <a href="{{ url('service-details/'.$service12->id) }}" class="card">
                        <img src="{{ asset('Images/uploaded-services') . '/' . $service12->service_image }}" alt="" class="thumb">
                        <article>
                            <h1>{{ $service12->title }}</h1>
                            <span>{{ $service12->description }}</span>
                        </article>
                    </a>

            </div>
        @endforeach
        <div class="item">
            <a href="Add-Service" class="card">
                <button type="button" class="btn btn-primary btn-circle btn-xl"><i class="fa fa-plus"></i></button><br><br><br><br>
                <p style="position:relative; left:80px;">Add Services</p>
                <br><br><br>
            </a>
        </div>
        <div class="grid-col-span-3 item item-user">
            
            <span class="heading">User Rating</span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="reviews fa fa-star"></span>
            <p>4.1 average based on 254 reviews.</p>
            <hr style="border:3px solid #cecdcd">
            <div class="row">
                <div class="side">
                    <div>5 star</div>
                </div>
                <div class="middle">
                    <div class="bar-container">
                    <div class="bar-5"></div>
                    </div>
                </div>
                <div class="side right">
                    <div>150</div>
                </div>
                <div class="side">
                    <div>4 star</div>
                </div>
                <div class="middle">
                    <div class="bar-container">
                    <div class="bar-4"></div>
                    </div>
                </div>
                <div class="side right">
                    <div>63</div>
                </div>
                <div class="side">
                    <div>3 star</div>
                </div>
                <div class="middle">
                    <div class="bar-container">
                    <div class="bar-3"></div>
                    </div>
                </div>
                <div class="side right">
                    <div>15</div>
                </div>
                <div class="side">
                    <div>2 star</div>
                </div>
                <div class="middle">
                    <div class="bar-container">
                    <div class="bar-2"></div>
                    </div>
                </div>
                <div class="side right">
                    <div>6</div>
                </div>
                <div class="side">
                    <div>1 star</div>
                </div>
                <div class="middle">
                    <div class="bar-container">
                    <div class="bar-1"></div>
                    </div>
                </div>
                <div class="side right">
                    <div>20</div>
                </div>
            </div>
        </div>
    </div>
    <br><br><br><br><br><br><br>
</body>

@endsection