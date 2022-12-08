<!--php 

include_once("data-connection.php");
$createConnection = setUpConnection();


$displayContent = "select * from tblposting";

$posts= $createConnection->query($displayContent) or die($createConnection->error);
$row = $posts->fetch_assoc();

-->
@extends('layouts.master')
@section('title', 'Service-Payment | JobSpeed')
@section('main-container')
<link rel="stylesheet" type="text/css" href="{{ asset('css-js/payment.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css-js/booking.css') }}">
    

<body>
    <div class="form-step">
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
                 
                <div style="padding: 0px 20px 0px 20px;margin-top:15px;">
                    <table class="table-2 table table-borderless">
                        <tbody>
                            <tr>
                                <th scope="col">
                                    <h5>Enter Promo Code </h5>
                                </th>
                              </tr>
                            <tr>
                                <th scope="col">
                                    <div class="row">
                                        <div class="col">
                                            <h5>Service Fee</h5>
                                        </div>
                                        <div class="col d-flex" style="justify-content:flex-end;">
                                            <h5>&#8369;20</h5>
                                        </div>
                                    </div>
                                </th>
                            </tr>
                            <tr>
                                <th scope="col">
                                    <div class="row">
                                        <div class="col">
                                            <h5>Subtotal</h5>
                                        </div>
                                        <div class="col d-flex" style="justify-content:flex-end;">
                                            <h5>&#8369; {{ $serviceData->minPricing }}</h5>
                                        </div>
                                    </div>
                                    <div class="row" style="color:green;">
                                        <div class="col">
                                            <h5>You will pay:</h5>
                                        </div>
                                        <div class="col d-flex" style="justify-content:flex-end;">
                                            <h5>&#8369; {{ $serviceData->minPricing +20 }}</h5>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <h5>Estimated Completion</h5>
                                        </div>
                                        <div class="col-md-auto d-flex" style="justify-content:flex-end;">
                                            <h5>2 days</h5>
                                        </div>
                                    </div>
                                </th>
                            </tr>
                        </tbody>
                      </table>
                </div>
                
            </div>
        
            <div class="product-details">
                <div>
                    <div style="background-color:#9F68E8;padding:10px 10px 5px 20px; color:white;border-radius: 15px 15px 0px 0px;"><h5>Payment Options</h5></div>
                    <div>
                        <div style="padding:10px 50px 10px 20px; background-color:rgb(252, 252, 252);border-radius: 0px 0px 15px 15px;">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                            <label class="form-check-label" for="exampleRadios1">
                              <h5>G-Cash</h5>
                              <p>Accesible 24/7. Top-up must be completed within 30 mins (min. P50)</p>
                            </label>
                        </div>   
                    </div>
                </div>

                <br><br><br><br><br><br><br><br><br><br><br><br><br>
                <a class="btn-prev btninservice btn btn-outline-success" type="submit" href="{{ url('Appointment/'.$serviceData->id) }}">Back</a>
                <a class="btn-next btninservice btn btn-outline-success" type="submit" href="">Pay</a>
            </div>  
             
        </div>
    </div>
    <script src="{{ asset('css-js/booking.js') }}"></script>
    <br><br><br><br><br><br>
</body>
@endsection
