@extends('layouts.master')
@section('title', 'Profile | JobSpeed')
@section('main-container')
  <link rel="stylesheet" type="text/css" href="css-js/user-profile.css">

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



  <div class="container-grid">
    <div class="item grid-row-span">
      <div class="main-profile">
        <div class="cover-image">
          <img src="{{ asset('Images/city1.jpg') }}">
        </div>
        <div class="row">
          <div class="col col-lg-4">
            <div class="profile-image">

              <img src="{{ asset('Images/uploaded-profile') . '/' . $data->profile_image }}">

            </div>
          </div>
          <div class="col" style="margin-left:14px;margin-top:5px;">
            <p style="color:black;">{{ $data->FirstName }} {{ $data->LastName }}</p>
          </div>
        </div>


        <a class="previewprofile btn btn-outline-success" type="submit" href="/edit-profile">Edit Profile</a>





      </div>


    </div>
    <div class="grid-col-span-3 appointment2">
      <div class="tabs">
        <button class="tab" id="tab1">All</button>
        <button class="tab" id="tab2" style="border-left:none; border-right:none">Pending</button>
        <button class="tab" id="tab3" style="border-right:none">Ongoing</button>
        <button class="tab" id="tab4">Completed</button>
      </div>

    </div>
    <div class="grid-col-span-3">
      @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
      @endif

      @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
      @endif
    </div>
    {{-- all of the appointments --}}
    <div class="grid-col-span-3 appointment" id="content1">
      @if (count($appointments) > 0)
        @foreach ($appointments as $appointment)
          <div class="divinside">
            @php
              $sellerData = App\Models\UserSeller::where('id', $appointment->user_seller_id)->first();
              $serviceData = App\Models\Service::where('id', $appointment->service_id)->first();
              $dataSellerUSer = App\Models\User::where('id', '=', $sellerData->user_id)->first();
              
            @endphp
            <div class="row d-flex align-items-center">
              <div class="col-8 col d-inline-flex flex-grow-1 align-items-center w-auto">
                <div style="font-weight: bold; margin-right:10px;">{{ $dataSellerUSer->FirstName }} {{ $dataSellerUSer->LastName }}</div>
                <a href="{{url('seller', $sellerData->id)}}" class="btn btn-light" style="font-size: 14px;"><i class="bi bi-person-circle"></i> View
                  Profile</a>
              </div>
              <div class="col">

              </div>
              <div class="col d-flex justify-content-end">
                @if ($appointment->status == 'waiting for payment release')
                  <div style="text-transform: capitalize;color:#4F2982;font-size:18px;font-weight:medium">Ongoing</div>
                @else
                  <div style="text-transform: capitalize;color:#4F2982;font-size:18px;font-weight:medium">{{ $appointment->status }}</div>
                @endif
              </div>
            </div>

            <hr>
            <div class="row">
              <div class="col">
                <img src="{{ asset('Images/uploaded-services') . '/' . $serviceData->service_image }}" alt="" class="product-pic">
              </div>
              <div class="col-9">
                <p style="font-size:18px;font-weight:bold;">{{ $serviceData->title }}</p>
                <div><i class="bi bi-calendar-week-fill" style="color:#4F2982"></i>
                  {{ \Carbon\Carbon::parse($appointment->date)->format('l, F j,  Y') }}
                </div>
                <div><i class="bi bi-clock-fill" style="color:#4F2982"></i>
                  {{ \Carbon\Carbon::parse($appointment->time)->format('h:i:s a') }}
                </div>

              </div>
              <div class="col d-flex align-items-center">
                <div style="font-size:18px;font-weight:bold;color:#4F2982">&#8369; {{ $serviceData->minPricing }}</div>
              </div>
            </div>
            <hr>
            @if ($appointment->status == 'pending')
              <div class="row">
                <div class="col d-flex align-items-center">
                  <div style="font-size:14px;color:rgb(163, 163, 163)">The appointment confirmation time is 1-2 days.</div>
                </div>
                <div class="col d-flex justify-content-end">
                  <button type="button" class="pend btn btn-secondary" disabled>Pending Confirmation</button>
                </div>
              </div>
            @elseif ($appointment->status == 'ongoing')
              <div class="row">
                <div class="col d-flex align-items-center">
                  <div style="font-size:14px;color:rgb(163, 163, 163)">Please await the seller's completion of their services.</div>
                </div>
                <div class="col d-flex justify-content-end">
                  <a type="button" class="pend2 btn btn-secondary" data-bs-toggle="modal" data-bs-target="#waitingfortheseller">Mark
                    Finished</a>
                </div>
                {{-- modal --}}
                <div class="modal fade" id="waitingfortheseller" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                  aria-labelledby="staticBackdropLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Confirmation</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <p>The seller must confirm that the service is complete before the appointment can be marked as finished.</p>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="pend btn btn-secondary" data-bs-dismiss="modal">Ok</button>

                      </div>
                    </div>
                  </div>
                </div>
              </div>
            @elseif ($appointment->status == 'waiting for payment release')
              <div class="row">
                <div class="col d-flex align-items-center">
                  <div style="font-size:14px;color:rgb(163, 163, 163)">Confirm after you've received the services.</div>
                </div>
                <div class="col d-flex justify-content-end">
                  <a type="button" class="pend btn btn-secondary" data-bs-toggle="modal" data-bs-target="#staticBackdrop2">Mark
                    Finished</a>
                </div>
              </div>
              {{-- modal to confirm  --}}
              <form action="/appointments/{{ $appointment->id }}/update-status-complete" method="POST">
                @csrf
                @method('PUT')
                <div class="modal fade" id="staticBackdrop2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                  aria-labelledby="staticBackdropLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Confirmation</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <p>"By clicking 'Confirm', you are confirming that you have received the services and are satisfied
                          with their condition. Please note that this action will also release your payment to the seller
                          and will end the ability to return or request a refund for the services."</p>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="pend btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="pend btn btn-primary">Confirm</button>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
              {{-- end of modal to confirm --}}
            @else
              <div class="row">
                <div class="col d-flex align-items-center">

                </div>
                <div class="col d-flex justify-content-end">
                  <a type="button" class="pend btn btn-secondary" data-bs-toggle="modal" data-bs-target="#reviewModal-{{ $serviceData->id }}">Leave Rating</a>
                </div>
              </div>
              {{-- modal to confirm  --}}
              <form method="POST" action="/services/{{ $serviceData->id }}/reviews">
                @csrf
                <input type="hidden" name="service_id" value="{{ $serviceData->id }}">
                <div class="modal fade" id="reviewModal-{{ $serviceData->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                  aria-labelledby="staticBackdropLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Rate</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <div>Rate 1 to 5: </div>
                        <fieldset class="rating">
                          <input type="radio" id="star5-{{ $serviceData->id }}" name="rating" value="5" /><label class="full"
                            for="star5-{{ $serviceData->id }}"></label>
                          <input type="radio" id="star4half-{{ $serviceData->id }}" name="rating" value="4.5" /><label class="half"
                            for="star4half-{{ $serviceData->id }}"></label>
                          <input type="radio" id="star4-{{ $serviceData->id }}" name="rating" value="4" /><label class="full"
                            for="star4-{{ $serviceData->id }}"></label>
                          <input type="radio" id="star3half-{{ $serviceData->id }}" name="rating" value="3.5" /><label class="half"
                            for="star3half-{{ $serviceData->id }}"></label>
                          <input type="radio" id="star3-{{ $serviceData->id }}" name="rating" value="3" /><label class="full"
                            for="star3-{{ $serviceData->id }}"></label>
                          <input type="radio" id="star2half-{{ $serviceData->id }}" name="rating" value="2.5" /><label class="half"
                            for="star2half-{{ $serviceData->id }}"></label>
                          <input type="radio" id="star2-{{ $serviceData->id }}" name="rating" value="2" /><label class="full"
                            for="star2-{{ $serviceData->id }}"></label>
                          <input type="radio" id="star1half-{{ $serviceData->id }}" name="rating" value="1.5" /><label class="half"
                            for="star1half-{{ $serviceData->id }}"></label>
                          <input type="radio" id="star1-{{ $serviceData->id }}" name="rating" value="1" /><label class="full"
                            for="star1-{{ $serviceData->id }}"></label>
                          <input type="radio" id="starhalf-{{ $serviceData->id }}" name="rating" value="0.5" /><label class="half"
                            for="starhalf-{{ $serviceData->id }}"></label>
                        </fieldset>
                        <br>
                        <br>
                        <div class="mb-3">
                          <label for="exampleFormControlTextarea1" class="form-label">Leave a Comment</label>
                          <textarea class="form-control" id="exampleFormControlTextarea1" rows="4" name="message"></textarea>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="pend btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="pend btn btn-primary">Confirm</button>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            @endif
          </div>
        @endforeach
      @else
        <div class="noAppointment">
          <br><br><br><br><br>
          <img class="image3" src="{{ url('Images/no.png') }}">
          <div class="message">No Appointment Yet</div>
          <br><br><br><br><br>
        </div>
      @endif
    </div>

    {{-- end of all the appointments --}}

    {{-- pending appointments --}}
    <div class="grid-col-span-3 appointment" id="content2">
      @php
        $hasOngoingAppointments = false;
      @endphp
      @foreach ($appointments as $appointment)
        @if ($appointment->status == 'pending')
          <div class="divinside">
            @php
              $sellerData = App\Models\UserSeller::where('id', $appointment->user_seller_id)->first();
              $serviceData = App\Models\Service::where('id', $appointment->service_id)->first();
              $dataSellerUSer = App\Models\User::where('id', '=', $sellerData->user_id)->first();
            @endphp
            <div class="row d-flex align-items-center">
              <div class="col-8 col d-inline-flex flex-grow-1 align-items-center w-auto">
                <div style="font-weight: bold; margin-right:10px;">{{ $dataSellerUSer->FirstName }} {{ $dataSellerUSer->LastName }}</div>
                <button type="button" class="btn btn-light" style="font-size: 14px;"><i class="bi bi-person-circle"></i> View
                  Profile</button>
              </div>
              <div class="col">

              </div>
              <div class="col d-flex justify-content-end">

                <div style="text-transform: capitalize;color:#4F2982;font-size:18px;font-weight:medium">{{ $appointment->status }}</div>

              </div>
            </div>

            <hr>
            <div class="row">
              <div class="col">
                <img src="{{ asset('Images/uploaded-services') . '/' . $serviceData->service_image }}" alt="" class="product-pic">
              </div>
              <div class="col-9">
                <p style="font-size:18px;font-weight:bold;">{{ $serviceData->title }}</p>
                <p>
                <div><i class="bi bi-calendar-week-fill" style="color:#4F2982"></i>
                  {{ \Carbon\Carbon::parse($appointment->date)->format('l, F j,  Y') }}
                </div>
                <div><i class="bi bi-clock-fill" style="color:#4F2982"></i>
                  {{ \Carbon\Carbon::parse($appointment->time)->format('h:i:s a') }}
                </div>
              </div>
              <div class="col d-flex align-items-center">
                <div style="font-size:18px;font-weight:bold;color:#4F2982">&#8369; {{ $serviceData->minPricing }}</div>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col d-flex align-items-center">
                <div style="font-size:14px;color:rgb(163, 163, 163)">The appointment confirmation time is 1-2 days.</div>
              </div>
              <div class="col d-flex justify-content-end">
                <button type="button" class="pend btn btn-secondary" disabled>Pending Confirmation</button>
              </div>
            </div>
          </div>
          @php
            $hasOngoingAppointments = true;
          @endphp
        @endif
      @endforeach
      @if (!$hasOngoingAppointments)
        <div class="noAppointment">
          <br><br><br><br><br>
          <img class="image3" src="{{ url('Images/no.png') }}">
          <div class="message">No Appointment Yet</div>
          <br><br><br><br><br>
        </div>
      @endif
    </div>

    {{-- end of pending appointments --}}

    {{-- start of ongoing appointments --}}
    <div class="grid-col-span-3 appointment" id="content3">
      @php
        $hasOngoingAppointments = false;
      @endphp
      @foreach ($appointments as $appointment)
        @if ($appointment->status == 'ongoing' || $appointment->status == 'waiting for payment release')
          <div class="divinside">
            @php
              $sellerData = App\Models\UserSeller::where('id', $appointment->user_seller_id)->first();
              $serviceData = App\Models\Service::where('id', $appointment->service_id)->first();
              $dataSellerUSer = App\Models\User::where('id', '=', $sellerData->user_id)->first();
            @endphp
            <div class="row d-flex align-items-center">
              <div class="col-8 col d-inline-flex flex-grow-1 align-items-center w-auto">
                <div style="font-weight: bold; margin-right:10px;">{{ $dataSellerUSer->FirstName }} {{ $dataSellerUSer->LastName }}</div>
                <button type="button" class="btn btn-light" style="font-size: 14px;"><i class="bi bi-person-circle"></i> View
                  Profile</button>
              </div>
              <div class="col">

              </div>
              <div class="col d-flex justify-content-end">

                @if ($appointment->status == 'waiting for payment release')
                  <div style="text-transform: capitalize;color:#4F2982;font-size:18px;font-weight:medium">Ongoing</div>
                @else
                  <div style="text-transform: capitalize;color:#4F2982;font-size:18px;font-weight:medium">{{ $appointment->status }}</div>
                @endif

              </div>
            </div>

            <hr>
            <div class="row">
              <div class="col">
                <img src="{{ asset('Images/uploaded-services') . '/' . $serviceData->service_image }}" alt="" class="product-pic">
              </div>
              <div class="col-9">
                <p style="font-size:18px;font-weight:bold;">{{ $serviceData->title }}</p>
                <p>
                <div><i class="bi bi-calendar-week-fill" style="color:#4F2982"></i>
                  {{ \Carbon\Carbon::parse($appointment->date)->format('l, F j,  Y') }}
                </div>
                <div><i class="bi bi-clock-fill" style="color:#4F2982"></i>
                  {{ \Carbon\Carbon::parse($appointment->time)->format('h:i:s a') }}
                </div>
              </div>
              <div class="col d-flex align-items-center">
                <div style="font-size:18px;font-weight:bold;color:#4F2982">&#8369; {{ $serviceData->minPricing }}</div>
              </div>
            </div>
            <hr>
            @if ($appointment->status == 'ongoing')
              <div class="row">
                <div class="col d-flex align-items-center">
                  <div style="font-size:14px;color:rgb(163, 163, 163)">Please await the seller's completion of their services.</div>
                </div>
                <div class="col d-flex justify-content-end">
                  <a type="button" class="pend2 btn btn-secondary" data-bs-toggle="modal" data-bs-target="#waitingfortheseller2">Mark
                    Finished</a>
                </div>
                {{-- modal --}}
                <div class="modal fade" id="waitingfortheseller2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                  aria-labelledby="staticBackdropLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Confirmation</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <p>The seller must confirm that the service is complete before the appointment can be marked as finished.</p>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="pend btn btn-secondary" data-bs-dismiss="modal">Ok</button>

                      </div>
                    </div>
                  </div>
                </div>
              </div>
            @elseif ($appointment->status == 'waiting for payment release')
              <div class="row">
                <div class="col d-flex align-items-center">
                  <div style="font-size:14px;color:rgb(163, 163, 163)">Confirm after you've received the services.</div>
                </div>
                <div class="col d-flex justify-content-end">
                  <a type="button" class="pend btn btn-secondary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Mark
                    Finished</a>
                </div>
              </div>
            @endif
          </div>
          @php
            $hasOngoingAppointments = true;
          @endphp
        @endif
        {{-- modal to confirm  --}}
        <form action="/appointments/{{ $appointment->id }}/update-status-complete" method="POST">
          @csrf
          @method('PUT')
          <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="staticBackdropLabel">Confirmation</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <p>"By clicking 'Confirm', you are confirming that you have received the services and are satisfied
                    with their condition. Please note that this action will also release your payment to the seller
                    and will end the ability to return or request a refund for the services."</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="pend btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                  <button type="submit" class="pend btn btn-primary">Confirm</button>
                </div>
              </div>
            </div>
          </div>
        </form>
        {{-- end of modal to confirm --}}
      @endforeach
      @if (!$hasOngoingAppointments)
        <div class="noAppointment">
          <br><br><br><br><br>
          <img class="image3" src="{{ url('Images/no.png') }}">
          <div class="message">No Appointment Yet</div>
          <br><br><br><br><br>
        </div>
      @endif
    </div>
    {{-- end of ongoing appointments --}}

    {{-- start of completed appointments --}}
    <div class="grid-col-span-3 appointment" id="content4">
      @php
        $hasOngoingAppointments = false;
      @endphp
      @foreach ($appointments as $appointment)
        @if ($appointment->status == 'completed')
          <div class="divinside">
            @php
              $sellerData = App\Models\UserSeller::where('id', $appointment->user_seller_id)->first();
              $serviceData = App\Models\Service::where('id', $appointment->service_id)->first();
              $dataSellerUSer = App\Models\User::where('id', '=', $sellerData->user_id)->first();
            @endphp
            <div class="row d-flex align-items-center">
              <div class="col-8 col d-inline-flex flex-grow-1 align-items-center w-auto">
                <div style="font-weight: bold; margin-right:10px;">{{ $dataSellerUSer->FirstName }} {{ $dataSellerUSer->LastName }}</div>
                <button type="button" class="btn btn-light" style="font-size: 14px;"><i class="bi bi-person-circle"></i> View
                  Profile</button>
              </div>
              <div class="col">

              </div>
              <div class="col d-flex justify-content-end">

                <div style="text-transform: capitalize;color:#4F2982;font-size:18px;font-weight:medium">{{ $appointment->status }}</div>

              </div>
            </div>

            <hr>
            <div class="row">
              <div class="col">
                <img src="{{ asset('Images/uploaded-services') . '/' . $serviceData->service_image }}" alt="" class="product-pic">
              </div>
              <div class="col-9">
                <p style="font-size:18px;font-weight:bold;">{{ $serviceData->title }}</p>
                <p>
                <div><i class="bi bi-calendar-week-fill" style="color:#4F2982"></i>
                  {{ \Carbon\Carbon::parse($appointment->date)->format('l, F j,  Y') }}
                </div>
                <div><i class="bi bi-clock-fill" style="color:#4F2982"></i>
                  {{ \Carbon\Carbon::parse($appointment->time)->format('h:i:s a') }}
                </div>
              </div>
              <div class="col d-flex align-items-center">
                <div style="font-size:18px;font-weight:bold;color:#4F2982">&#8369; {{ $serviceData->minPricing }}</div>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col d-flex align-items-center">

              </div>
              <div class="col d-flex justify-content-end">
                <button type="button" class="pend btn btn-secondary" style="width:150px;">Rate</button>
              </div>
            </div>
          </div>
          @php
            $hasOngoingAppointments = true;
          @endphp
        @endif
      @endforeach
      @if (!$hasOngoingAppointments)
        <div class="noAppointment">
          <br><br><br><br><br>
          <img class="image3" src="{{ url('Images/no.png') }}">
          <div class="message">No Appointment Yet</div>
          <br><br><br><br><br>
        </div>
      @endif
    </div>
    {{-- end of completed appointments --}}
  </div>
  <br><br><br><br><br>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <!-- JavaScript to select the first tab and hide the other content elements when the page loads, and to toggle the visibility of the content elements and add the active class to the active tab -->
  <script>
    // Get references to the tabs and the content elements
    const tab1 = document.getElementById('tab1');
    const tab2 = document.getElementById('tab2');
    const tab3 = document.getElementById('tab3');
    const tab4 = document.getElementById('tab4');
    const content1 = document.getElementById('content1');
    const content2 = document.getElementById('content2');
    const content3 = document.getElementById('content3');
    const content4 = document.getElementById('content4');

    // When the page loads, select the first tab and hide the other content elements
    tab1.classList.add('active');
    content1.style.display = 'block';
    content2.style.display = 'none';
    content3.style.display = 'none';
    content4.style.display = 'none';

    // Add event listeners to the tabs that toggle the visibility of the content elements and add the active class to the active tab
    tab1.addEventListener('click', () => {
      tab1.classList.add('active');
      tab2.classList.remove('active');
      tab3.classList.remove('active');
      tab4.classList.remove('active');
      content1.style.display = 'block';
      content2.style.display = 'none';
      content3.style.display = 'none';
      content4.style.display = 'none';
    });
    tab2.addEventListener('click', () => {
      tab1.classList.remove('active');
      tab2.classList.add('active');
      tab3.classList.remove('active');
      tab4.classList.remove('active');
      content1.style.display = 'none';
      content2.style.display = 'block';
      content3.style.display = 'none';
      content4.style.display = 'none';
    });
    tab3.addEventListener('click', () => {
      tab1.classList.remove('active');
      tab2.classList.remove('active');
      tab3.classList.add('active');
      tab4.classList.remove('active');
      content1.style.display = 'none';
      content2.style.display = 'none';
      content3.style.display = 'block';
      content4.style.display = 'none';
    });
    tab4.addEventListener('click', () => {
      tab1.classList.remove('active');
      tab2.classList.remove('active');
      tab3.classList.remove('active');
      tab4.classList.add('active');
      content1.style.display = 'none';
      content2.style.display = 'none';
      content3.style.display = 'none';
      content4.style.display = 'block';
    });
  </script>
@endsection
