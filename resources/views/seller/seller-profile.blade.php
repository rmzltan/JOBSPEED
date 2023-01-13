
@extends('layouts.master')
@section('title', 'Seller-Profile | JobSpeed')
@section('main-container')
<link rel="stylesheet" type="text/css" href="{{ asset('css-js/seller-profile.css') }}">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />

  <body>
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
            <div class="col" style="margin-left:20px;margin-top:5px;">
              <p style="color:black;">{{ $data->FirstName }} {{ $data->LastName }}</p>
            </div>
            <div style="padding:40px;margin-top:-40px;">
              <hr style="color:black;">
              <div class="row row-cols-2 style-desc" style="color:black; font-size:16px; text-transform:capitalize;">
                <div class="col">
                  <div><i class="bi bi-geo-alt"></i> From </div>
                </div>
                <div class="col d-flex justify-content-end">
                  <div style="font-weight:bold;"> {{ $sellerData->address }}</div> 
                </div>
                <div class="col">
                  <div><i class="bi bi-person"></i> Member Since </div>
                </div>
                <div class="col d-flex justify-content-end">
                  <div style="font-weight:bold;">{{ \Carbon\Carbon::parse($data->created_at)->isoFormat('MMM  YYYY') }}</div>
                </div>
              </div>
            </div>
            
          </div>
         
        </div>

        {{-- Start of skills --}}
        <div class="box-skill">
          <div class="row">
            <div class="col">
              <h5 style="color:black">Skills</h5>
            </div>
          </div>
          @if (!$skills->isEmpty())
            @foreach ($skills as $skill)
              @foreach ($skill->name as $index => $name)
                  <div class="skill-box2">
                    <span>{{ $name }}</span>
                    
                  </div>
                
              @endforeach
            @endforeach
          @else
            <p style="color:rgb(114, 114, 114); font-size:15px; text-align:center;margin-top:20px;">This seller has not listed any skills. Please check back later for updates or contact the seller for more information.</p>
          @endif
        </div>
        {{-- end of skills --}}

        <div class="box-description">
          <p style="color:black">Description</p>
          <p style="color:black; font-size:16px; position:relative;margin-top:-10px;word-break: break-all;">{{ $sellerData->description }}</p>
        </div>

      </div>


      {{-- service start --}}
      @if (session('message'))
        <h6 class="alert alert-success">{{ session('message') }}</h6>
      @endif
      <div class="grid-col-span-3 item item-activeservice">{{ $data->FirstName }} Services</div>
      @foreach ($services as $service12)
        <div class="item">
          <a href="{{ url('service-details-jobfeed/'.$service12->id) }}" class="card">
            <img src="{{ asset('Images/uploaded-services') . '/' . $service12->service_image }}" alt="" class="thumb">
            <article>
              <h1>{{ $service12->title }}</h1>
              <span>{{ $service12->description }}</span>
            </article>
          </a>

        </div>
      @endforeach
      
      {{-- service end --}}

      

      {{-- Rating --}}
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
      <div class="grid-col-span-3">
        <div class="details-box">
          <h4>Review and Ratings</h4>
          <br>
          <div class="row">
            <div class="col">
              <h1 style="margin-bottom: 6px;font-size:20px;text-align:center">Total Reviews</h1>
              <h1 style="text-align:center">{{ $reviewCount }}</h1>

            </div>
            <div class="col"
              style="border-left:1px solid rgb(179, 179, 179); border-right: 1px solid rgb(179, 179, 179);text-align:center;">
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
              <div class="col" style="margin-left:25px;">
                <div>{{ $dataUser->FirstName }} {{ $dataUser->LastName }}</div>
                <div style="font-size:14px; color:grey">Review Count: {{ $dataUser->reviews()->count() }}</div>
              </div>
              <div class="col-7">
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


                <p style="text-align:justify;">{{ $reviewdata->message }}</p>
              </div>
            </div>
            <br>
          @endforeach
        </div>
      </div>

    </div>
    {{-- end of rating --}}
    <br><br><br><br><br><br><br>

    {{-- modal to add skill  --}}
    <form method="POST" action="/update-skills">
      @csrf
      <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">Add Skill</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="form-floating">
                <textarea class="form-control" placeholder="Enter your skills, separated by a comma" name="name" id="floatingTextarea2"
                  style="height: 100px"></textarea>
                <label for="floatingTextarea2">Enter your skills, separated by a comma</label>
              </div>
            </div>
            <input type="hidden" name="user_seller_id" value="{{ $sellerData->id }}">
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save</button>
            </div>
          </div>
        </div>
      </div>
    </form>
    {{-- end of modal to add skill --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>


    <script>
      var swiper = new Swiper(".mySwiper", {
        slidesPerView: 1,
        spaceBetween: 30,
        loop: true,
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
      });

      function AddReadMore() {
        //This limit you can set after how much characters you want to show Read More.
        var carLmt = 200;
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
  </body>

@endsection
