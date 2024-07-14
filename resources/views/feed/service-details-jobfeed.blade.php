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
  <link
    href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@latest/css/all.min.css" rel="stylesheet">
    


<body>

    
    <form action="{{ url('save-appointment/' . $serviceData->id) }}" method="post">
        @csrf
        <br><br><br><br>
        <div class="container-box">
            <div class="product-image">
                <img src="{{ asset('Images/uploaded-services') . '/' . $serviceData->service_image }}" alt="" class="product-pic">

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
                            
                                <a href="#" class="btn btn-next btninservice">Avail</a>
                            
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
                                    <input type="text" class="form-control" name="FirstName" id="exampleInputPassword1" value="{{ Auth::user()->FirstName }}">
                                </div>
                                <div class="col">
                                    <label for="exampleInputPassword1" class="form-label">Last Name</label>
                                    <input type="text" class="form-control" name="LastName" id="exampleInputPassword1" value="{{ Auth::user()->LastName }}">
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
                                    <input type="email" class="form-control" name="email" id="exampleInputPassword1"  value="{{ Auth::user()->email }}">
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
                                        &#8369; {{ $serviceData->minPricing + 20 }}
                                    </div>
                                </div>
                                <br>
                                <div class="col">
                                        JOBSPEED recommend to pay depending on the negotiation of the users in-person. (Negotiations exceeding higher or lower than the expected amount is not allowed.)
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
                                                <p style="font-size:12; color:gray">Coming soon</p>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="payment" id="flexRadioDefault1" value="Cash-on-site">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                Cash-on-site
                                                <p style="font-size:12; color:gray">Cash-on-site is a feature wherein customers have the option to avail and pay on site</p>
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
                        @php
                $reviews = App\Models\Review::where('user_seller_id', $sellerData->id)->get();
              @endphp
               @php
                if (count($reviews) > 0) {
                    $sum = 0;
                
                    foreach ($reviews as $reviewdata) {
                        $sum += $reviewdata->rating;
                        $average2 = $sum / count($reviews);
                    }
                    $average2 = number_format($average2, 2);
                    $reviewCount = count($reviews);
                } else {
                    $average2 = 0;
                    $reviewCount = 0;
                }
              @endphp   
                <div class="d-flex">
                    <div style=" color:#4F2982; margin-right:5px;">
                        @for ($i = 0; $i < floor($average2); $i++)
                        <i class="fa fa-star"></i>
                      @endfor
          
                      @if ($average2 - floor($average2) >= 0.5)
                        <i class="fa fa-star-half-o"></i>
                      @endif
          
                      @for ($i = 0; $i < 5 - ceil($average2); $i++)
                        <i class="fa fa-star-o"></i>
                      @endfor
                    </div>
                  <div>({{ $reviewCount }})</div>
                    
                  </div>
                    <a href="{{url('seller', $sellerData->id)}}" class=" contactbtn btn btn-outline-success">View Profile</a>
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
                        <p style="text-transform: capitalize;">{{ \Carbon\Carbon::parse($data->created_at)->isoFormat('MMM  YYYY') }}</p>
                    </div>
                    <div>
                        <h5>Avg. Response Rate</h5>
                        <p>(Coming Soon)</p>
                    </div>
                    <div>
                        <h5>Last Service</h5>
                        <p>(Coming Soon)</p>
                    </div>
                    
                </div>
                <hr>
                    <p>{{ $sellerData->description }}</p>
                <hr>
                <h4>Skills</h4>
                @if (!$skills->isEmpty())
                    @foreach ($skills as $skill)
                        @foreach ($skill->name as $index => $name)
                                <div class="skill-box2">
                                    <span>{{ $name }}</span>
                                </div> @endforeach
                    @endforeach
@else
<p style="color:rgb(114,
    114, 114); font-size:15px; text-align:center;margin-top:20px;">This seller has not listed any skills. Please check back later for updates
  or contact the seller for more information.</p>
  @endif
  </div>
  <br>
  {{-- RATINGS --}}
  @php
    if (count($review) > 0) {
        $sum = 0;
    
        foreach ($review as $reviewdata) {
            $sum += $reviewdata->rating;
            $average = $sum / count($review);
        }
        $average = number_format($average, 2);
        $reviewCount = count($review);
    } else {
        $average = 0;
        $reviewCount = 0;
    }
  @endphp
  @php
    $ratingCount = [0, 0, 0, 0, 0];
    
    foreach ($review as $reviewdata) {
        $rating = floor($reviewdata->rating);
        if ($rating > 5) {
            $rating = 5;
        }
        $ratingCount[$rating - 1]++;
    }
    $count5 = $ratingCount[4];
    $count4 = $ratingCount[3];
    $count3 = $ratingCount[2];
    $count2 = $ratingCount[1];
    $count1 = $ratingCount[0];
    
    if ($reviewCount > 0) {
        $width5 = ($count5 / $reviewCount) * 100;
        $width4 = ($count4 / $reviewCount) * 100;
        $width3 = ($count3 / $reviewCount) * 100;
        $width2 = ($count2 / $reviewCount) * 100;
        $width1 = ($count1 / $reviewCount) * 100;
    } else {
        $width5 = 0;
        $width4 = 0;
        $width3 = 0;
        $width2 = 0;
        $width1 = 0;
    }
    
  @endphp




  <div class="details-box">
    <h4>Review and Ratings</h4>
    <br>
    <div class="row">
      <div class="col">
        <h1 style="margin-bottom: 6px;font-size:20px;text-align:center">Total Reviews</h1>
        <h1 style="text-align:center">{{ $reviewCount }}</h1>

      </div>
      <div class="col" style="border-left:1px solid rgb(179, 179, 179); border-right: 1px solid rgb(179, 179, 179);text-align:center;">
        <div style="margin-bottom: 6px; margin-right:50px;font-size:20px;">Average Rating</div>
        <div class="d-flex justify-content-center align-items-center">
          <h1>{{ $average }}</h1>
          <div style="margin-top:-10px; color:#4F2982; margin-left:10px;">
            @for ($i = 0; $i < floor($average); $i++)
              <i class="fa fa-star"></i>
            @endfor

            @if ($average - floor($average) >= 0.5)
              <i class="fa fa-star-half-o"></i>
            @endif

            @for ($i = 0; $i < 5 - ceil($average); $i++)
              <i class="fa fa-star-o"></i>
            @endfor
          </div>

        </div>


      </div>
      <div class="col">
        <div class="d-flex justify-content-center align-items-center">
          5
          <div class="rating-progress-bar" style="margin: 0 15px 0 15px; ">
            <div class="rating-progress-bar-fill" style="width: {{ $width5 }}%;background-color: #3DAB98;"></div>
          </div>
          {{ $count5 }}
        </div>
        <div class="d-flex justify-content-center align-items-center">
          4
          <div class="rating-progress-bar" style="margin: 0 15px 0 15px;">
            <div class="rating-progress-bar-fill" style="width: {{ $width4 }}%; background-color: #D188E9;"></div>
          </div>
          {{ $count4 }}
        </div>
        <div class="d-flex justify-content-center align-items-center">
          3
          <div class="rating-progress-bar" style="margin: 0 15px 0 15px;">
            <div class="rating-progress-bar-fill" style="width: {{ $width3 }}%; background-color: #EABE56;"></div>
          </div>
          {{ $count3 }}
        </div>
        <div class="d-flex justify-content-center align-items-center">
          2
          <div class="rating-progress-bar" style="margin: 0 15px 0 15px;">
            <div class="rating-progress-bar-fill" style="width: {{ $width2 }}%; background-color: #47B6DB;"></div>
          </div>
          {{ $count2 }}
        </div>
        <div class="d-flex justify-content-center align-items-center">
          1
          <div class="rating-progress-bar" style="margin: 0 15px 0 15px;">
            <div class="rating-progress-bar-fill" style="width: {{ $width1 }}%; background-color: #CD8149;"></div>
          </div>
          {{ $count1 }}
        </div>


      </div>
    </div>
    @foreach ($review as $reviewdata)
      @php
        $sellerData = App\Models\UserSeller::where('id', $reviewdata->user_seller_id)->first();
        $serviceData = App\Models\Service::where('id', $reviewdata->service_id)->first();
        $dataUser = App\Models\User::where('id', '=', $reviewdata->user_id)->first();
        
      @endphp
      <hr>
      <br>
      <div class="row">
        <div class="col-1">
          <img class="review_image" src="{{ asset('Images/uploaded-profile') . '/' . $dataUser->profile_image }}">
        </div>
        <div class="col">
          <div>{{ $dataUser->FirstName }} {{ $dataUser->LastName }}</div>
          <div style="font-size:14px; color:grey">Review Count: {{ $dataUser->reviews()->count() }}</div>
        </div>
        <div class="col-8">
          <div class="row row-cols-1">
            <div class="col d-flex">
              @for ($i = 0; $i < floor($reviewdata->rating); $i++)
                <i class="fa fa-star" style="color:#4F2982"></i>
              @endfor

              @if (ceil($reviewdata->rating) - $reviewdata->rating == 0.5)
                <i class="fa fa-star-half-o" style="color:#4F2982"></i>
              @endif

              @for ($i = 0; $i < 5 - ceil($reviewdata->rating); $i++)
                <i class="fa fa-star-o" style="color:#4F2982"></i>
              @endfor
              <div style="margin-left:6px;font-size:12px; color:grey">{{ $reviewdata->rating }} out of 5</div>
              <p style="text-transform: capitalize; margin-left:15px; margin-top:-3px;">
                {{ \Carbon\Carbon::parse($reviewdata->created_at)->format('F j Y') }}</p>
            </div>


          </div>


          <p>{{ $reviewdata->message }}</p>
        </div>
      </div>
      <br>



    @endforeach
  </div>
  </div>

  </form>

  <br><br><br><br><br><br><br><br><br><br><br><br>
  <script src="{{ asset('css-js/booking.js') }}"></script>
  </body>

@endsection
