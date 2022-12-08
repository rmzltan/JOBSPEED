@extends('layouts.master')
@section('title', 'Appointment | JobSpeed')
@section('main-container')
<link rel="stylesheet" type="text/css" href="{{ asset('css-js/appointment.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css-js/booking.css') }}">
<body>
    <form action="{{ url('save-appointment/') }}" method="post">
        @csrf
        <div class="progress-step-container">
            <div class="main">
            <ul>
                <li>
                    <i class="icon uil uil-capture"></i>
                    <div class="progress-step one" data-title="Details">
                        <p class="progress-step-number">1</p>
                        <i class="uil uil-check"></i> 
                    </div>
                    <p class="text">View</p>
                </li>
                <li>
                    <i class="icon uil uil-clipboard-notes"></i>
                    <div class="progress-step two">
                        <p class="progress-step-number" data-title="Appointment">2</p>
                        <i class="uil uil-check"></i>
                    </div>
                    <p class="text">Appointment</p>
                </li>
                <li>
                    <i class="icon uil uil-credit-card"></i>
                    <div class="progress-step three">
                        <p class="progress-step-number" data-title="Payment">3</p>
                        <i class="uil uil-check"></i>
                    </div>
                    <p class="text">Payment</p>
                </li>
                <li>
                    <i class="icon uil uil-map-marker"></i>
                    <div class="progress-step four">
                        <p class="progress-step-number" data-title="Confirmation">4</p>
                        <i class="uil uil-check"></i>
                    </div>
                    <p class="text">Confirmation</p>
                </li>
            </ul>
        
            </div>
        </div>
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
                
                
                <a class="btn-prev btninservice btn btn-outline-success" type="submit" href="{{ url('service-details-jobfeed/'.$serviceData->id) }}">Back</a>
                <button type="submit" class="btn-next btninservice btn btn-secondary" >Pay</button>
                
                <!--<input type="hidden" name="id" value="<php echo $row2['id'];?>">-->
            </div>  
        </div>
    </form>
    <br><br><br>
    <script src="{{ asset('css-js/booking.js') }}"></script>
</body>
@endsection