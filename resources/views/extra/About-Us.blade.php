@extends('layouts.master')
@section('title', 'About Us | JobSpeed')
@section('main-container')
<link rel="stylesheet" type="text/css" href="{{ url('css-js/About.css') }}">

<body>
	<div class="about-container-fluid">
		<div class="row">
			<div class="col">
				<h1 class="moto">We build bridges<br>
					between<span style="color: #4F2982"> service workers <br>
						and customers</span> </h1>
			</div>
			<div class="col">
				<p class="moto-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. <br>
					Reiciendis nulla, corporis ut quibusdam nihil rem, eaque, <br>
					repellendus ducimus tempora in explicabo repudiandae. </p>
			</div>
			
		</div>
		
	</div>
	<img class="image1" src="{{ url('Images/about-jobspeed-image1.png') }}">
	
	
	<div class="container-fluid" style="background-color:#f9fafb; padding-top:80px;	">
		<h1 style="text-align: center;font-size:64px;margin-bottom:80px;">Fast, Reliable, Secure, and Scalable</h1>
		<div class="row">
			<div class="col">
				<img class="image2" src="{{ url('Images/about-jobspeed-image2.jpeg') }}">
			</div>
			<div class="job col">
				<p style="text-align: justify;font-size:24px;color:black; ">JOBSPEED is a company that provide worldwide 
					digital and cost-effective solution that increases
					hiring quality while also giving a better applicant
					experience.
					<br><br>
					Our ground-breaking approach to background checking
					and screening assures accuracy and efficiency at every step,
					while addressing the problems and hazards prevalent in all
					industries and sectors throughout the contemporary
					global service is based.</p>
			</div>
		</div>
	</div>
	<!--meet our amazing team-->
	<div class="container-box">
    <section>
      <section class="team-page-section">
        <div class="container">
          <!-- Sec Title -->
          <div class="sec-title centered">
            <div class="title">Meet Our Amazing Team</div>
            <div class="separator"><span></span></div>
            <h2>The Survivors</h2>
          </div>

          <div class="row clearfix">

            <!-- Team Block -->
            <div class="team-block col-lg-4 col-md-6 col-sm-12">
              <div class="inner-box wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                <ul class="social-icons">
                  <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                  <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                  <li><a href="#"><i class="fa-brands fa-instagram-square"></i></a></li>
                  <li><a href="#"><i class="fa-brands fa-steam"></i></a></li>
                </ul>
                <div class="image">
                  <a href="#"><img src="{{ url('Images/about-us-prane.jpg') }}" alt="" /></a>
                </div>
                <div class="lower-content">
                  <h3><a href="#">John Orland Prane </a></h3>
                  <div class="designation">Bachelor of Science in Information Technology</div>
                </div>
              </div>
            </div>
            <!-- Team Block -->
            <div class="team-block col-lg-4 col-md-6 col-sm-12">
              <div class="inner-box wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                <ul class="social-icons">
                  <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                  <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                  <li><a href="#"><i class="fa-brands fa-instagram-square"></i></a></li>
                  <li><a href="#"><i class="fa-brands fa-steam"></i></a></li>
                </ul>
                <div class="image">
                  <a href="#"><img src="{{ url('Images/about-us-tan.jpg') }}" alt="" /></a>
                </div>
                <div class="lower-content">
                  <h3><a href="#">Ramzel Robinson Tan</a></h3>
                  <div class="designation">Bachelor of Science in Information Technology</div>
                </div>
              </div>
            </div>
            <!-- Team Block -->
            <div class="team-block col-lg-4 col-md-6 col-sm-12">
              <div class="inner-box wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                <ul class="social-icons">
                  <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                  <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                  <li><a href="#"><i class="fa-brands fa-instagram-square"></i></a></li>
                  <li><a href="#"><i class="fa-brands fa-steam"></i></a></li>
                </ul>
                <div class="image">
                  <a href="#"><img src="{{ url('Images/about-us-onan.jpg') }}" alt="" /></a>
                </div>
                <div class="lower-content">
                  <h3><a href="#">Aeron Angel Onan </a></h3>
                  <div class="designation">Bachelor of Science in Information Technology</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </section>
  </div>
	<hr class="horizontal">
	<!--Join the team section-->
	<div class="container-fluid" style="margin-bottom:100px;">
		<div class="row">
			<div class="col">
				<h1 style="font-size: 50px;font-weight:bold;margin-left:300px;">Join Our Team</h1>
			</div>
			<div class="col">
				<p style="font-size:20px;">We believe it takes great people to make a great product. That's why <br>
					we hire not only the perfect professional fits, but people who embody <br>
					 our company values.</p>
				<a href="" style="color:black; font-size:20px">See open position</a>
			</div>
		</div>
	</div>
<!--contact us -->
	<div class="container-fluid" style="background-color:#4F2982; padding:150px 240px 0px 240px; ">
		<div class="row">
			<div class="col">
				<h1 style="font-size:80px;font-weight:bold; color:white">
					Have a question? <br>
					Our team is happy <br>
					to assist you
				</h1>
				<br>
				<p style="font-size:20px;color:rgb(238, 238, 238);">Ask about JobSpeed service, pricing, implementation, <br>
					 or anything else. Our highly trained reps are <br>
					standing by, ready to help.</p>
				<br>
				<hr style="border-top:0.5px solid white">
				<br>
				<div style="display:flex;">
					<button type="button" class="contact-button btn btn-primary">Contact Us &emsp; <i class="bi bi-arrow-right"></i></button>
					<p style="font-size:18; margin-left:40px; color:white; margin-top:10px">Or call +63&nbsp; (995)&nbsp; 879&nbsp; 5666</p>
				</div>
				
			</div>
			<div class="col">
				<img class="image3" src="{{ url('Images/about-us-image3.jpg') }}">
			</div>
		</div>
	</div>
<br><br><br><br><br><br><br><br><br><br>
</body>
@endsection
