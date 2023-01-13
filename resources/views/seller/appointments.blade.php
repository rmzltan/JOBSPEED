@extends('layouts.master')
@section('title', 'Appointments | JobSpeed')
@section('main-container')
  <link rel="stylesheet" type="text/css" href="{{ asset('css-js/showAllappointments.css') }}">

  <body>
    <br><br><br><br>
    <div class="container">
      <div class="">
        <ul class="ul-tab">
          <li class="tab-item active" target-wrapper="first-dynamic-table" target-tab="home">All</li>
          <li class="tab-item" target-wrapper="first-dynamic-table" target-tab="about">Pending</li>
          <li class="tab-item" target-wrapper="first-dynamic-table" target-tab="faqs">Ongoing</li>
          <li class="tab-item" target-wrapper="first-dynamic-table" target-tab="contact">Completed</li>
        </ul>
        <div id="first-dynamic-table">
          {{-- first tab All Appointment --}}
          <div class="tab-content active" id="home">
            <div class="grid-col-span-3" id="content1">
              @if (count($appointments) > 0)
                @foreach ($appointments as $appointmentData)
                  <div class="divinside">
                    @php
                      $sellerData = App\Models\UserSeller::where('id', $appointmentData->user_seller_id)->first();
                      $serviceData = App\Models\Service::where('id', $appointmentData->service_id)->first();
                      $dataSellerUSer = App\Models\User::where('id', '=', $appointmentData->user_id)->first();
                    @endphp
                    <div class="row d-flex align-items-center">
                      <div class="col-8 col d-inline-flex flex-grow-1 align-items-center w-auto">
                        <img class="nav-default-img2"src="{{ asset('/Images/uploaded-profile') . '/' . $dataSellerUSer->profile_image }}">
                        <div style="font-weight: bold; margin-right:10px;">{{ $dataSellerUSer->FirstName }} {{ $dataSellerUSer->LastName }}
                        </div>
                      </div>
                      <div class="col">
                      </div>
                      <div class="col-4 d-flex justify-content-end">
                        @if ($appointmentData->status == 'waiting for payment release')
                          <div style="text-transform: capitalize;color:#4F2982;font-size:18px;font-weight:medium">Ongoing</div>
                        @else
                          <div style="text-transform: capitalize;color:#4F2982;font-size:18px;font-weight:medium">
                            {{ $appointmentData->status }}
                          </div>
                        @endif
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col">
                        <img src="{{ asset('Images/uploaded-services') . '/' . $serviceData->service_image }}" alt=""
                          class="product-pic2">
                      </div>
                      {{-- start of details with icon --}}
                      <div class="col-9">
                        <p style="font-size:18px;font-weight:bold;margin-bottom:10px">{{ $serviceData->title }}</p>
                        <div class="row row-cols-2">
                          <div class="col" style="margin-bottom:5px;">
                            <div style="text-transform: capitalize;"><i class="bi bi-geo-fill"
                                style="color:#4F2982"></i>{{ $appointmentData->street }}, {{ $appointmentData->city }}</div>
                          </div>
                          <div class="col">
                            <div><i class="bi bi-telephone-fill" style="color:#4F2982"></i> {{ $appointmentData->contact }}</div>
                          </div>
                          <div class="col" style="margin-bottom:5px;">
                            <div><i class="bi bi-calendar-week-fill" style="color:#4F2982"></i>
                              {{ \Carbon\Carbon::parse($appointmentData->date)->format('l, F j,  Y') }}
                            </div>
                          </div>
                          <div class="col">
                            <div><i class="bi bi-envelope-fill" style="color:#4F2982"></i> {{ $appointmentData->email }}</div>
                          </div>
                          <div class="col" style="margin-bottom:10px;">
                            <div><i class="bi bi-clock-fill" style="color:#4F2982"></i>
                              {{ \Carbon\Carbon::parse($appointmentData->time)->format('h:i:s a') }} </div>
                          </div>
                          <div class="col">
                            <div><i class="bi bi-credit-card-2-front-fill" style="color:#4F2982"></i> {{ $appointmentData->payment }}</div>
                          </div>
                        </div>
                        <p class="addReadMore showlesscontent">{{ $appointmentData->message }}</p>
                      </div>
                      {{-- end of details with icon --}}

                      <div class="col d-flex align-items-center">
                        <div style="font-size:18px;font-weight:bold;color:#4F2982">&#8369; {{ $serviceData->minPricing }}</div>
                      </div>
                    </div>
                    <hr>
                    @if ($appointmentData->status == 'pending')
                      <form action="/appointments/{{ $appointmentData->id }}/update-status-approve" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                          <div class="col-7 d-flex align-items-center">
                            <div style="font-size:14px;color:rgb(163, 163, 163)">As the seller, you need to confirm the appointment within 1-2
                              days.
                            </div>
                          </div>
                          <div class="col d-flex justify-content-end">
                            <button type="submit" class="pend btn btn-secondary" style="width:160px">Confirm</button>
                          </div>
                        </div>
                      </form>
                    @elseif ($appointmentData->status == 'ongoing')
                      <form action="/appointments/{{ $appointmentData->id }}/update-status-mark-finished" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                          <div class="col d-flex align-items-center">
                            <div style="font-size:14px;color:rgb(163, 163, 163)">If you have completed the service for the customer, you can
                              mark it as completed.</div>
                          </div>
                          <div class="col d-flex justify-content-end">
                            <button type="submit" class="pend btn btn-secondary">Mark Finished</button>
                          </div>
                        </div>
                      </form>
                    @elseif ($appointmentData->status == 'waiting for payment release')
                      <div class="row">
                        <div class="col d-flex align-items-center">
                          <div style="font-size:14px;color:rgb(163, 163, 163)">The payment can only be released after the customer has
                            confirmed that they have received the service.</div>
                        </div>
                        <div class="col d-flex justify-content-end">
                          <button type="button" class="pend btn btn-secondary" style="width:150px;" disabled>Claim Payment</button>
                        </div>
                      </div>
                    @else
                      <div class="row">
                        <div class="col d-flex align-items-center">

                        </div>
                        <div class="col d-flex justify-content-end">
                          <button type="button" class="pend btn btn-secondary" style="width:150px;">Claim Payment</button>
                        </div>
                      </div>
                    @endif

                    <br>

                  </div>
                 
                @endforeach
              @else
                <div class="noAppointment">
                  <br><br><br><br><br>
                  <img class="image3" src="{{ url('Images/NoAppointment.png') }}">
                  <div class="message">No Appointment Yet</div>
                  <br><br><br><br><br>
                </div>
              @endif
              
            </div>
          </div>
          {{-- end of first tab All Appointment --}}

          {{-- start of pending appointments --}}
          <div class="tab-content" id="about">
            <div class="grid-col-span-3 appointment" id="content2">
              @php
                $hasOngoingAppointments = false;
              @endphp
              @foreach ($appointments as $appointmentData)
                @if ($appointmentData->status == 'pending')
                  <div class="divinside">
                    @php
                      $sellerData = App\Models\UserSeller::where('id', $appointmentData->user_seller_id)->first();
                      $serviceData = App\Models\Service::where('id', $appointmentData->service_id)->first();
                      $dataSellerUSer = App\Models\User::where('id', '=', $appointmentData->user_id)->first();
                    @endphp
                    <div class="row d-flex align-items-center">
                      <div class="col-8 col d-inline-flex flex-grow-1 align-items-center w-auto">
                        <img class="nav-default-img2"src="{{ asset('/Images/uploaded-profile') . '/' . $dataSellerUSer->profile_image }}">
                        <div style="font-weight: bold; margin-right:10px;">{{ $dataSellerUSer->FirstName }} {{ $dataSellerUSer->LastName }}
                        </div>
                      </div>
                      <div class="col">
                      </div>
                      <div class="col-4 d-flex justify-content-end">
                        <div style="text-transform: capitalize;color:#4F2982;font-size:18px;font-weight:medium">
                          {{ $appointmentData->status }}
                        </div>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col">
                        <img src="{{ asset('Images/uploaded-services') . '/' . $serviceData->service_image }}" alt=""
                          class="product-pic2">
                      </div>
                      {{-- start of details with icon --}}
                      <div class="col-9">
                        <p style="font-size:18px;font-weight:bold;margin-bottom:10px">{{ $serviceData->title }}</p>
                        <div class="row row-cols-2">
                          <div class="col" style="margin-bottom:5px;">
                            <div style="text-transform: capitalize;"><i class="bi bi-geo-fill"
                                style="color:#4F2982"></i>{{ $appointmentData->street }}, {{ $appointmentData->city }}</div>
                          </div>
                          <div class="col">
                            <div><i class="bi bi-telephone-fill" style="color:#4F2982"></i> {{ $appointmentData->contact }}</div>
                          </div>
                          <div class="col" style="margin-bottom:5px;">
                            <div><i class="bi bi-calendar-week-fill" style="color:#4F2982"></i>
                              {{ \Carbon\Carbon::parse($appointmentData->date)->format('l, F j,  Y') }}
                            </div>
                          </div>
                          <div class="col">
                            <div><i class="bi bi-envelope-fill" style="color:#4F2982"></i> {{ $appointmentData->email }}</div>
                          </div>
                          <div class="col" style="margin-bottom:10px;">
                            <div><i class="bi bi-clock-fill" style="color:#4F2982"></i>
                              {{ \Carbon\Carbon::parse($appointmentData->time)->format('h:i:s a') }} </div>
                          </div>
                          <div class="col">
                            <div><i class="bi bi-credit-card-2-front-fill" style="color:#4F2982"></i> {{ $appointmentData->payment }}</div>
                          </div>
                        </div>
                        <p class="addReadMore showlesscontent">{{ $appointmentData->message }}</p>
                      </div>
                      {{-- end of details with icon --}}

                      <div class="col d-flex align-items-center">
                        <div style="font-size:18px;font-weight:bold;color:#4F2982">&#8369; {{ $serviceData->minPricing }}</div>
                      </div>
                    </div>
                    <hr>
                    <form action="/appointments/{{ $appointmentData->id }}/update-status-approve" method="POST">
                      @csrf
                      @method('PUT')
                      <div class="row">
                        <div class="col-7 d-flex align-items-center">
                          <div style="font-size:14px;color:rgb(163, 163, 163)">As the seller, you need to confirm the appointment within
                            1-2
                            days.
                          </div>
                        </div>
                        <div class="col d-flex justify-content-end">
                          <button type="submit" class="pend btn btn-secondary" style="width:160px">Confirm</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  @php
                    $hasOngoingAppointments = true;
                  @endphp
                @endif
              @endforeach
              @if (!$hasOngoingAppointments)
                <div class="noAppointment">
                  <br><br><br><br><br>
                  <img class="image3" src="{{ url('Images/NoAppointment.png') }}">
                  <div class="message">No Appointment Yet</div>
                  <br><br><br><br><br>
                </div>
              @endif
            </div>
          </div>
          {{-- end of pending appointments --}}

          {{-- START OF ONGOING APPOINMENTS --}}
          <div class="tab-content" id="faqs">
            <div class="grid-col-span-3 appointment" id="content2">
              @php
                $hasOngoingAppointments = false;
              @endphp
              @foreach ($appointments as $appointmentData)
                @if ($appointmentData->status == 'ongoing' || $appointmentData->status == 'waiting for payment release')
                  <div class="divinside">
                    @php
                      $sellerData = App\Models\UserSeller::where('id', $appointmentData->user_seller_id)->first();
                      $serviceData = App\Models\Service::where('id', $appointmentData->service_id)->first();
                      $dataSellerUSer = App\Models\User::where('id', '=', $appointmentData->user_id)->first();
                    @endphp
                    <div class="row d-flex align-items-center">
                      <div class="col-8 col d-inline-flex flex-grow-1 align-items-center w-auto">
                        <img class="nav-default-img2"src="{{ asset('/Images/uploaded-profile') . '/' . $dataSellerUSer->profile_image }}">
                        <div style="font-weight: bold; margin-right:10px;">{{ $dataSellerUSer->FirstName }} {{ $dataSellerUSer->LastName }}
                        </div>
                      </div>
                      <div class="col">
                      </div>
                      <div class="col-4 d-flex justify-content-end">
                        @if ($appointmentData->status == 'waiting for payment release')
                          <div style="text-transform: capitalize;color:#4F2982;font-size:18px;font-weight:medium">Ongoing</div>
                        @else
                          <div style="text-transform: capitalize;color:#4F2982;font-size:18px;font-weight:medium">
                            {{ $appointmentData->status }}
                          </div>
                        @endif
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col">
                        <img src="{{ asset('Images/uploaded-services') . '/' . $serviceData->service_image }}" alt=""
                          class="product-pic2">
                      </div>
                      {{-- start of details with icon --}}
                      <div class="col-9">
                        <p style="font-size:18px;font-weight:bold;margin-bottom:10px">{{ $serviceData->title }}</p>
                        <div class="row row-cols-2">
                          <div class="col" style="margin-bottom:5px;">
                            <div style="text-transform: capitalize;"><i class="bi bi-geo-fill"
                                style="color:#4F2982"></i>{{ $appointmentData->street }}, {{ $appointmentData->city }}</div>
                          </div>
                          <div class="col">
                            <div><i class="bi bi-telephone-fill" style="color:#4F2982"></i> {{ $appointmentData->contact }}</div>
                          </div>
                          <div class="col" style="margin-bottom:5px;">
                            <div><i class="bi bi-calendar-week-fill" style="color:#4F2982"></i>
                              {{ \Carbon\Carbon::parse($appointmentData->date)->format('l, F j,  Y') }}
                            </div>
                          </div>
                          <div class="col">
                            <div><i class="bi bi-envelope-fill" style="color:#4F2982"></i> {{ $appointmentData->email }}</div>
                          </div>
                          <div class="col" style="margin-bottom:10px;">
                            <div><i class="bi bi-clock-fill" style="color:#4F2982"></i>
                              {{ \Carbon\Carbon::parse($appointmentData->time)->format('h:i:s a') }} </div>
                          </div>
                          <div class="col">
                            <div><i class="bi bi-credit-card-2-front-fill" style="color:#4F2982"></i> {{ $appointmentData->payment }}</div>
                          </div>
                        </div>
                        <p class="addReadMore showlesscontent">{{ $appointmentData->message }}</p>
                      </div>
                      {{-- end of details with icon --}}

                      <div class="col d-flex align-items-center">
                        <div style="font-size:18px;font-weight:bold;color:#4F2982">&#8369; {{ $serviceData->minPricing }}</div>
                      </div>
                    </div>
                    <hr>
                    @if ($appointmentData->status == 'ongoing')
                      <form action="/appointments/{{ $appointmentData->id }}/update-status-mark-finished" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                          <div class="col d-flex align-items-center">
                            <div style="font-size:14px;color:rgb(163, 163, 163)">If you have completed the service for the customer, you can
                              mark it as completed.</div>
                          </div>
                          <div class="col d-flex justify-content-end">
                            <button type="submit" class="pend btn btn-secondary">Mark Finished</button>
                          </div>
                        </div>
                      </form>
                    @elseif ($appointmentData->status == 'waiting for payment release')
                      <div class="row">
                        <div class="col d-flex align-items-center">
                          <div style="font-size:14px;color:rgb(163, 163, 163)">The payment can only be released after the customer has
                            confirmed that they have received the service.</div>
                        </div>
                        <div class="col d-flex justify-content-end">
                          <button type="button" class="pend btn btn-secondary" style="width:150px;" disabled>Claim Payment</button>
                        </div>
                      </div>
                    @endif
                  </div>
                  @php
                    $hasOngoingAppointments = true;
                  @endphp
                @endif
              @endforeach
              @if (!$hasOngoingAppointments)
                <div class="noAppointment">
                  <br><br><br><br><br>
                  <img class="image3" src="{{ url('Images/NoAppointment.png') }}">
                  <div class="message">No Appointment Yet</div>
                  <br><br><br><br><br>
                </div>
              @endif
            </div>
          </div>
          {{-- END OF ONGOING APPOINMENTS --}}

          {{-- sTART OF COMPLETED APPOINTMENTS --}}
          <div class="tab-content" id="contact">
            <div class="grid-col-span-3 appointment" id="content2">
              @php
                $hasOngoingAppointments = false;
              @endphp
              @foreach ($appointments as $appointmentData)
                @if ($appointmentData->status == 'completed')
                  <div class="divinside">
                    @php
                      $sellerData = App\Models\UserSeller::where('id', $appointmentData->user_seller_id)->first();
                      $serviceData = App\Models\Service::where('id', $appointmentData->service_id)->first();
                      $dataSellerUSer = App\Models\User::where('id', '=', $appointmentData->user_id)->first();
                    @endphp
                    <div class="row d-flex align-items-center">
                      <div class="col-8 col d-inline-flex flex-grow-1 align-items-center w-auto">
                        <img class="nav-default-img2"src="{{ asset('/Images/uploaded-profile') . '/' . $dataSellerUSer->profile_image }}">
                        <div style="font-weight: bold; margin-right:10px;">{{ $dataSellerUSer->FirstName }} {{ $dataSellerUSer->LastName }}
                        </div>
                      </div>
                      <div class="col">
                      </div>
                      <div class="col-4 d-flex justify-content-end">

                        <div style="text-transform: capitalize;color:#4F2982;font-size:18px;font-weight:medium">
                          {{ $appointmentData->status }}
                        </div>

                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col">
                        <img src="{{ asset('Images/uploaded-services') . '/' . $serviceData->service_image }}" alt=""
                          class="product-pic2">
                      </div>
                      {{-- start of details with icon --}}
                      <div class="col-9">
                        <p style="font-size:18px;font-weight:bold;margin-bottom:10px">{{ $serviceData->title }}</p>
                        <div class="row row-cols-2">
                          <div class="col" style="margin-bottom:5px;">
                            <div style="text-transform: capitalize;"><i class="bi bi-geo-fill"
                                style="color:#4F2982"></i>{{ $appointmentData->street }}, {{ $appointmentData->city }}</div>
                          </div>
                          <div class="col">
                            <div><i class="bi bi-telephone-fill" style="color:#4F2982"></i> {{ $appointmentData->contact }}</div>
                          </div>
                          <div class="col" style="margin-bottom:5px;">
                            <div><i class="bi bi-calendar-week-fill" style="color:#4F2982"></i>
                              {{ \Carbon\Carbon::parse($appointmentData->date)->format('l, F j,  Y') }}
                            </div>
                          </div>
                          <div class="col">
                            <div><i class="bi bi-envelope-fill" style="color:#4F2982"></i> {{ $appointmentData->email }}</div>
                          </div>
                          <div class="col" style="margin-bottom:10px;">
                            <div><i class="bi bi-clock-fill" style="color:#4F2982"></i>
                              {{ \Carbon\Carbon::parse($appointmentData->time)->format('h:i:s a') }} </div>
                          </div>
                          <div class="col">
                            <div><i class="bi bi-credit-card-2-front-fill" style="color:#4F2982"></i> {{ $appointmentData->payment }}</div>
                          </div>
                        </div>
                        <p class="addReadMore showlesscontent">{{ $appointmentData->message }}</p>
                      </div>
                      {{-- end of details with icon --}}

                      <div class="col d-flex align-items-center">
                        <div style="font-size:18px;font-weight:bold;color:#4F2982">&#8369; {{ $serviceData->minPricing }}</div>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col d-flex align-items-center">

                      </div>
                      <div class="col d-flex justify-content-end">
                        <button type="button" class="pend btn btn-secondary" style="width:150px;">Claim Payment</button>
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
                  <img class="image3" src="{{ url('Images/NoAppointment.png') }}">
                  <div class="message">No Appointment Yet</div>
                  <br><br><br><br><br>
                </div>
              @endif
            </div>
          </div>
          {{-- END OF COMPLETED APPOINTMENTS --}}


        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <script>
          let tabSwitchers = document.querySelectorAll('[target-wrapper]')
          tabSwitchers.forEach(item => {
            item.addEventListener('click', (e) => {
              let currentWrapperId = item.getAttribute('target-wrapper')
              let currentWrapperTargetId = item.getAttribute('target-tab')

              let currentWrapper = document.querySelector(`#${currentWrapperId}`)
              let currentWrappersTarget = document.querySelector(`#${currentWrapperTargetId}`)

              let allCurrentTabItem = document.querySelectorAll(`[target-wrapper='${currentWrapperId}']`)
              let allCurrentWrappersTarget = document.querySelectorAll(`#${currentWrapperId} .tab-content`)

              if (currentWrappersTarget) {
                if (!currentWrappersTarget.classList.contains('active')) {
                  allCurrentWrappersTarget.forEach(tabItem => {
                    tabItem.classList.remove('active')
                  })
                  allCurrentTabItem.forEach(item => {
                    item.classList.remove('active')
                  })
                  item.classList.add('active')
                  currentWrappersTarget.classList.add('active')
                }
              }
            })
          });

          function AddReadMore() {
            //This limit you can set after how much characters you want to show Read More.
            var carLmt = 400;
            // Text to show when text is collapsed
            var readMoreTxt = " ... Read More";
            // Text to show when text is expanded
            var readLessTxt = " Read Less";


            //Traverse all selectors with this class and manupulate HTML part to show Read More
            $(".addReadMore").each(function() {
              if ($(this).find(".firstSec").length)
                return;

              var allstr = $(this).text();
              if (allstr.length > carLmt) {
                var firstSet = allstr.substring(0, carLmt);
                var secdHalf = allstr.substring(carLmt, allstr.length);
                var strtoadd = firstSet + "<span class='SecSec'>" + secdHalf + "</span><span class='readMore'  title='Click to Show More'>" +
                  readMoreTxt + "</span><span class='readLess' title='Click to Show Less'>" + readLessTxt + "</span>";
                $(this).html(strtoadd);
              }

            });
            //Read More and Read Less Click Event binding
            $(document).on("click", ".readMore,.readLess", function() {
              $(this).closest(".addReadMore").toggleClass("showlesscontent showmorecontent");
            });
          }
          $(function() {
            //Calling function after Page Load
            AddReadMore();
          });
        </script>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
  </body>
@endsection
