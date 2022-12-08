<!--?php 

  include_once("data-connection.php");
    require_once("service-details-user-details.php");
  $createConnection=setUpConnection();

  $postsID=$_GET['id'];

  $displayContent = "select * from tblposting where id='$postsID'";
  $posts = $createConnection->query($displayContent) or die($createConnection->error);
  $row = $posts->fetch_assoc();

  if(isset($_POST['btndelete'])){
    $postsID=$_POST['id'];
    $deleteData="DELETE FROM tblposting WHERE id='$postsID'";

    $createConnection->query($deleteData) or die($createConnection->error);
    echo $postsID."deleted";
    echo header("Location: Main.php");
    }

?>
php
  include_once("data-connection.php");

  $createConnection=setUpConnection();
  $displayContent = "SELECT * FROM tbladditionalinfo ";
  $info= $createConnection->query($displayContent) or die($createConnection->error);
  $row = $info->fetch_assoc();

  $displayContent2 = "select * from tblposting where id='$postsID'";
  $posts= $createConnection->query($displayContent2) or die($createConnection->error);
  $row2 = $posts->fetch_assoc();
-->



@extends('layouts.master')
@section('title', 'Service-Detail | JobSpeed')
@section('main-container')

<link rel="stylesheet" type="text/css" href="{{ asset('css-js/service-details-jobfeed.css') }}">


<body>

    
    <form action="{{ url('save-appointment/'.$serviceData->id) }}" method="post">
        @csrf
        <br><br><br><br>
        <div class="container-box">
            <div class="product-image">
                <img src="{{ asset('Images/uploaded-services') . '/' . $serviceData->service_image }}" alt="" class="product-pic">
                    
                <div class="dots">
                <a href="#!" class="active"><i>1</i></a>
                <a href="#!"><i>2</i></a>
                <a href="#!"><i>3</i></a>
                <a href="#!"><i>4</i></a>
                </div>
            </div>
                <div class="product-details">
                    {{-- progress --}}
                    <div class="progressContainer">
                        <div class="progressbar">
                            <div class="progress" id="progress"></div>
                            <div class="progress-step active" data-title="View"></div>
                            <div class="progress-step" data-title="Appointment"></div>
                            <div class="progress-step" data-title="Pay"></div>
                            <div class="progress-step" data-title="Confirmation"></div>
                        </div>
                    </div>
                    
                    <div class="form-step active">
                        <header>
                            <h1 class="title">{{ $serviceData->title }}</h1>
                        </header>
                        <article>
                            <h5>Category</h5>
                            <p>{{ $serviceData->category }}</p>
                        </article>
                        <article>
                            <h5>Location</h5>
                            <p>{{ $serviceData->location }}</p>
                        </article>
                        <article>
                            <h5>Description</h5>
                            <p>{{ $serviceData->description }}</p>
                        </article>
                        <article>
                            <h5>Price</h5>
                            <p>{{ $serviceData->minPricing }} to {{ $serviceData->maxPricing }} </p>
                            </article>
                        <br><br>
                        
                        
                        <div class="btn-group">
                            <a class="btn-prev btninservice btn btn-outline-success" type="submit" href="/feed">Back</a>
                            @if (Session()->has('UserID'))
                                <a href="#" class="btn btn-next btninservice">Avail</a>
                            @else
                                <a href="{{ url('/add-info')}}" class="btn btn-next btninservice">Avail</a>
                            @endif
                        </div>
                        
                        
                    </div>
                    <div class="form-step">
                        <header>
                            <h2 class="title">Book an appointment online!</h2>
                            <p style="color:lightslategray">We have the best specialists in your region. Quality, guarantee <br>
                                and professionalism are our slogan!</p>
                        </header>
                        <br>
                        <article>
                            <div class="row">
                                <div class="col">
                                    <label for="exampleInputPassword1" class="form-label">First Name</label>
                                    <input type="text" class="form-control" name="FirstName" id="exampleInputPassword1">
                                </div>
                                <div class="col">
                                    <label for="exampleInputPassword1" class="form-label">Last Name</label>
                                    <input type="text" class="form-control" name="LastName" id="exampleInputPassword1">
                                </div>
                                </div>
                        </article>
                        <br>
                        <article>
                            <div class="row">
                                <div class="col">
                                    <label for="exampleInputPassword1" class="form-label">Appointment Date</label>
                                    <input type="date" class="form-control" name="date"  id="exampleInputPassword1">
                                </div>
                                <div class="col">
                                    <label for="exampleInputPassword1" class="form-label">Preferred Time</label>
                                    <input type="time" class="form-control" name="time"  id="exampleInputPassword1">
                                </div>
                                </div>
                        </article>
                        <br>
                        <article>
                            <div class="row">
                                <div class="col">
                                    <label for="exampleInputPassword1" class="form-label">Email Address</label>
                                    <input type="email" class="form-control" name="email" id="exampleInputPassword1">
                                </div>
                                <div class="col">
                                    <label for="exampleInputPassword1" class="form-label">Phone Number</label>
                                    <input type="text" class="form-control" name="contact" id="exampleInputPassword1">
                                </div>
                                </div>
                        </article>
                        <br>
                        <article>
                            <div class="row">
                                <div class="col">
                                    <label for="exampleInputPassword1" class="form-label">City</label>
                                    <input type="text" class="form-control" name="city" id="exampleInputPassword1">
                                </div>
                                <div class="col">
                                    <label for="exampleInputPassword1" class="form-label">Street Address</label>
                                    <input type="text" class="form-control" name="street" id="exampleInputPassword1">
                                </div>
                                </div>
                        </article>
                        <br>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Your Message</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" name="message" rows="5" placeholder="Please,describe your problem"></textarea>
                            </div>
                        
                        
                            <div class="btn-group">
                            <a href="#" class="btn btn-prev btninservice">Back</a>
                            <a href="#" class="btn btn-next btninservice">Avail</a>
                        </div>
                    </div>
                    <div class="form-step">
                        <div class="row gap-4">
                            <div class="col price-details">
                                <h4>Details</h4>
                                <div class="container-fluid price">
                                <div class="row">
                                    <div class="col d-flex align-items-center">
                                        Enter Promo Code:
                                    </div>  
                                    <div class="col">
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col">
                                        Service Fee
                                    </div>
                                    <div class="col d-flex" style="justify-content:flex-end;">
                                        &#8369; 20
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        Subtotal
                                    </div>
                                    <div class="col d-flex" style="justify-content:flex-end;">
                                        &#8369; {{ $serviceData->minPricing }}
                                    </div>
                                </div>
                                <div class="row" style="color:green;">
                                    <div class="col">
                                        You will pay:
                                    </div>
                                    <div class="col d-flex" style="justify-content:flex-end;">
                                        &#8369; {{ $serviceData->minPricing +20 }}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col">
                                        Estimated Completion
                                    </div>
                                    <div class="col-md-auto d-flex" style="justify-content:flex-end;">
                                        2 days
                                    </div>
                                </div>
                                </div>
                                
                            </div>
                            <div class="col price-payment">
                                <div>
                                    <h4>Payment Options</h4>
                                    <div class="container-fluid price">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="payment" id="flexRadioDefault1" value="G-Cash">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                G-Cash
                                                <p style="font-size:12; color:gray">Accesible 24/7. Top-up must be completed within 30 mins (min. P50)</p>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="payment" id="flexRadioDefault1" value="Cash-on-site">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                Cash-on-site
                                                <p style="font-size:12; color:gray">Cash-on-site is a feature wherein customers have the option to avail now and pay on site</p>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
        
                        <br><br><br>
                        <div class="btn-group">
                            <a href="#" class="btn btn-prev btninservice">Back</a>
                            <button type="submit" class="btn btn-next btninservice">Pay</button>
                            
                        </div>
                    </div>

                </div>  
        </div>
    </form>
    
         
    
    <form action="" method="post">
        <div class="container">
            <br><br><br><br><br>
            <h4>About this freelancer</h4>
                <div class="profile-card">
                   
                        <img class="profile-image" src="{{ asset('Images/uploaded-profile') . '/' . $data->profile_image }}">
                   
                    
                    <div class="extra-details">
                        <p style="font-size:20px">{{ $data->FirstName }} {{ $data->LastName }}</p>      
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="reviews fa fa-star"></span>
                        <span>4 (23)</span><br>
                        
                        <a href="" class=" contactbtn btn btn-outline-success">Contact Me</a>
                    </div>
                    
                </div>
            <div class="details-box">
                <div class="addtional-details">
                    <div>
                        <h5>From</h5>
                        <p style="text-transform: capitalize;">{{ $sellerData->address }}</p>
                    </div>
                    <div>
                        <h5>Member Since</h5>
                        <p style="text-transform: capitalize;">{{ \Carbon\Carbon::parse($data->created_at)->isoFormat('MMM  YYYY')}}</p>
                    </div>
                    <div>
                        <h5>Avg. Response Rate</h5>
                        <p>1 hour</p>
                    </div>
                    <div>
                        <h5>Last Service</h5>
                        <p>About 1 hour</p>
                    </div>
                    
                </div>
                <hr>
                    <p>{{ $sellerData->description }}</p>
                <div>

                </div>
            </div>
        </div>
    
    
       
            
                
        </div>
         
    </form>
    
    <br><br><br><br><br><br><br><br><br><br><br><br>
    <script src="{{ asset('css-js/booking.js') }}"></script>
</body>

@endsection