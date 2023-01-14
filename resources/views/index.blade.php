@extends('layouts.master')
@section('title','Home | JobSpeed')
@section('main-container')
<style>
	body {
		background: white;
	}
</style>
<link rel="stylesheet" type="text/css" href="css-js/index.css">
<body>

<div class="box-index">
	<!--Content Landing page-->
	<div class="content container">
		<div class="row">
			<div class="info col-5">
				<h1 class="infoH1">Find a skilled</h1>
				<h1 class="infoH1"><span style="color: #9F68E8">individual</span> to</h1>
				<h1 class="infoH1">do the job.</h1>
				<p class="infoP">Creative people lets you find the right job for any<br>
					challenge from development to marketing</p>
				<a type="button" class="btngetstart btn btn-primary" href="/feed">Get Started</a>
			</div>
			<div class="col-size col col-2">
				<div class="vertical1"></div>
				<div class="vertical2"></div>
				<img class="apronimg" src="{{url('Images/photo1-land-page.png')}}" alt="Portrait">
			</div>
			<div class="col-size col col-2">
				<div class="vertical3"></div>
				<div class="vertical4"></div>
				<img class="redimg" src="{{url('Images/photo2-land-page.png')}}" alt="Portrait">
			</div>
			<div class="col-size col col-3">
				<div class="vertical5"></div>
				<div class="vertical6"></div>
				<div class="vertical7"></div>
				<img class="girlimg" src="{{url('Images/photo3-land-page.png')}}" alt="Portrait">
			</div>
			<div>
				<div class="hexagonindex1">
					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="260" height="200" viewBox="0 0 317 257">
						<defs>
							<linearGradient id="linear-gradient" x1="0.5" x2="0.5" y2="1" gradientUnits="objectBoundingBox">
								<stop offset="0" stop-color="#4f2982" />
								<stop offset="1" stop-color="#a45eff" />
							</linearGradient>
						</defs>
						<path id="Polygon_15" data-name="Polygon 15" d="M237.75,0,317,128.5,237.75,257H79.25L0,128.5,79.25,0Z" opacity="0.99" fill="url(#linear-gradient)" />
					</svg>
				</div>
				<div class="hexagonindex2">
					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="260" height="200" viewBox="0 0 317 257">
						<defs>
							<linearGradient id="linear-gradient" x1="0.5" x2="0.5" y2="1" gradientUnits="objectBoundingBox">
								<stop offset="0" stop-color="#4f2982" />
								<stop offset="1" stop-color="#a45eff" />
							</linearGradient>
						</defs>
						<path id="Polygon_15" data-name="Polygon 15" d="M237.75,0,317,128.5,237.75,257H79.25L0,128.5,79.25,0Z" opacity="0.99" fill="url(#linear-gradient)" />
					</svg>
				</div>
				<div class="hexagonindex3">
					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="260" height="200" viewBox="0 0 317 257">
						<defs>
							<linearGradient id="linear-gradient" x1="0.5" x2="0.5" y2="1" gradientUnits="objectBoundingBox">
								<stop offset="0" stop-color="#4f2982" />
								<stop offset="1" stop-color="#a45eff" />
							</linearGradient>
						</defs>
						<path id="Polygon_15" data-name="Polygon 15" d="M237.75,0,317,128.5,237.75,257H79.25L0,128.5,79.25,0Z" opacity="0.99" fill="url(#linear-gradient)" />
					</svg>
				</div>
				<div class="hexagonindex4">
					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="260" height="200" viewBox="0 0 317 257">
						<defs>
							<linearGradient id="linear-gradient" x1="0.5" x2="0.5" y2="1" gradientUnits="objectBoundingBox">
								<stop offset="0" stop-color="#4f2982" />
								<stop offset="1" stop-color="#a45eff" />
							</linearGradient>
						</defs>
						<path id="Polygon_15" data-name="Polygon 15" d="M237.75,0,317,128.5,237.75,257H79.25L0,128.5,79.25,0Z" opacity="0.99" fill="url(#linear-gradient)" />
					</svg>
				</div>
				<div class="hexagonindex5">
					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="260" height="200" viewBox="0 0 317 257">
						<defs>
							<linearGradient id="linear-gradient" x1="0.5" x2="0.5" y2="1" gradientUnits="objectBoundingBox">
								<stop offset="0" stop-color="#4f2982" />
								<stop offset="1" stop-color="#a45eff" />
							</linearGradient>
						</defs>
						<path id="Polygon_15" data-name="Polygon 15" d="M237.75,0,317,128.5,237.75,257H79.25L0,128.5,79.25,0Z" opacity="0.99" fill="url(#linear-gradient)" />
					</svg>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container-box1">
	<h1 style="position: relative;left:200px;font-size: 50px;">Most Demanded Home Services</h1>
	<div class="container-grid-demand">
		<div class="grid-demand-service-1st">
			<img src="{{url('Images/icon-plumbing')}}.png">
			<br><br><br><br>
			<h2>Plumber</h2>
			<p>243 Service Posted</p>
		</div>
		<div class="grid-demand-service-1">
			<img src="{{ url('Images/icon-carpenter.png') }}">
			<br><br><br><br>
			<h2>Carpenter</h2>
			<p>145 Service Posted</p>
		</div>
		<div class="grid-demand-service-1">
			<img src="{{ url('Images/icon-electrician.png') }}">
			<br><br><br><br>
			<h2>Electrician</h2>
			<p>120 Service Posted</p>
		</div>
		<div class="grid-demand-service-1">
			<img src="{{ url('Images/icon-painter.png') }}">
			<br><br><br><br>
			<h2>Painter</h2>
			<p>213 Service Posted</p>
		</div>
		<div class="grid-demand-service-1st">
			<img src="{{url('Images/pruning-shears')}}.png">
			<br><br><br><br>
			<h2>Gardener</h2>
			<p>143 Service Posted</p>
		</div>
	</div>
</div>
<div class="container-box2">
	<h1 style="font-size: 50px;">The Fast Track to Find Freelancer</h1>
	<p>we ensure your next step is a step forward.That's why we built a service marketplace <br>
		that cut-off the boring processes.</p>
	<div class="container-grid-steps">
		<div class="grid-steps">
			<img src="{{ url('Images/tutorial-1.png') }}">
			<br><br><br><br><br>
			<h4>Create Your Account</h4>
			<p>Build your reputation with a universal<br>
				profile that works across hundreds of<br>
				different customer and freelance worker .
			</p>
		</div>
		<div class="grid-steps">
			<img src="{{ url('Images/tutorial-2.png') }}">
			<br><br><br><br><br>
			<h4>Explore Your Options</h4>
			<p>Select your preferences(category,price,<br>
				location,etc.)and discover service most <br>
				relevant to you.
			</p>
		</div>
		<div class="grid-steps">
			<img src="{{ url('Images/tutorial-3.png') }}">
			<br><br><br><br><br>
			<h4>Talk On Your Terms</h4>
			<p>Message multiple freelancer while <br>
				keeping all communication in one, <br>
				convenient place.
			</p>
		</div>
	</div>
</div>
<div class="container-box3">
	<section id="testimonials">
		<div class="testimonial-heading">
			<h1>Testimonials</h1>
		</div>
		<div class="testimonial-box-container">
			<div class="testimonial-box">
				<div class="box-top">
					<div class="profile">
						<div class="profile-img">
							<img src="{{ url('Images/testimonials-james-reid.jpg') }}" />
						</div>
						<div class="name-user">
							<strong>James Reid</strong>
							<span>@Jeyms_R</span>
						</div>
					</div>
				</div>
				<div class="client-comment">
					<p>I have been working with JOBSPEED for year, and they provide the best services at the best prices. I highly recommend JOBSPEED!</p>
				</div>
			</div>
			<div class="testimonial-box">
				<div class="box-top">
					<div class="profile">
						<div class="profile-img">
							<img src="{{ url('Images/testimonials-daniel-padilla.png') }}" />
						</div>
						<div class="name-user">
							<strong>Daniel Paddila</strong>
							<span>@DJ__</span>
						</div>
					</div>
				</div>
				<div class="client-comment">
					<p>It was extremely satisfactory, The service here are very excellent professional who meets his clients, it will not be the last time I deal with him, I have already scheduled further tasks with him, I highly recommend JOBSPEED!</p>
				</div>
			</div>
			<div class="testimonial-box">
				<div class="box-top">
					<div class="profile">
						<div class="profile-img">
							<img src="{{ url('Images/testimonials-joshua-garcia.png') }}" />
						</div>
						<div class="name-user">
							<strong>Joshua Garcia</strong>
							<span>@Joshyyy</span>
						</div>
					</div>
				</div>
				<div class="client-comment">
					<p>I have used JOBSPEED for about six months now and I've got to say I am happy with the work they preform thus far! </p>
				</div>
			</div>
		</div>
	</section>
	<br><br>
</div>
<div class="container-box4">
	<div class="container-box4-heading">
		<h1>Newest Home Services</h1>
		<p>Narrow down your choice and let the most appealing <br>
			and matching freelancer show off</p>
		<a class="viewallbtn btn btn-outline-success" type="submit" href="/SignIn.blade.php">View All Listing</a>
	</div>
	<div class="index-grid-list">
		<div class="item-grid-list-index">
			<div class="thumb" style="background-image: url(Images/ac.jpg);"></div>
			<article>
				<h1>Aircon Repair</h1>
				<div style="display:inline-block;margin-bottom:10px;"><i class="fa-solid fa-location-dot"></i><span> Lucena City</span></div>
				<p>Are you looking for an aircon repairer, come and get it fixed by one of the best aircon repairers.</p>
				<div class="btngrp">
					<a class="btncontact btn btn-outline-success" type="submit" href="">Contact</a>
					<a class="btnavail btn btn-outline-success" type="submit" href="">Avail</a>
				</div>
			</article>
		</div>
		<div class="item-grid-list-index">
			<div class="thumb" style="background-image: url(Images/carpenter.jfif);"></div>
			<article>
				<h1>House Repair</h1>
				<div style="display:inline-block;margin-bottom:10px;"><i class="fa-solid fa-location-dot"></i><span> Sariaya</span></div>
				<p>Is it tough for you to repair the damage to your home? Come see our best carpenter, who I can highly suggest.</p>
				<div class="btngrp">
					<a class="btncontact btn btn-outline-success" type="submit" href="">Contact</a>
					<a class="btnavail btn btn-outline-success" type="submit" href="">Avail</a>
				</div>
			</article>
		</div>
		<div class="item-grid-list-index">
			<div class="thumb" style="background-image: url(Images/com.png);"></div>
			<article>
				<h1>Computer Fix</h1>
				<div style="display:inline-block;margin-bottom:10px;"><i class="fa-solid fa-location-dot"></i><span> Tayabas</span></div>
				<p>Do you know what to do if your computer shuts down? Do you have any idea where you can have it fixed? Allow one of our professional computer techs to complete the task wherever you are.</p>
				<div class="btngrp">
					<a class="btncontact btn btn-outline-success" type="submit" href="">Contact</a>
					<a class="btnavail btn btn-outline-success" type="submit" href="">Avail</a>
				</div>
			</article>
		</div>
		<div class="item-grid-list-index">
			<div class="thumb" style="background-image: url(Images/grass.png);"></div>
			<article>
				<h1>Grass Cleaner</h1>
				<div style="display:inline-block;margin-bottom:10px;"><i class="fa-solid fa-location-dot"></i><span> Lucban</span></div>
				<p>Isn't it annoying when the grass in your yard is long, come and have us cut the long grass in your yard</p>
				<div class="btngrp">
					<a class="btncontact btn btn-outline-success" type="submit" href="">Contact</a>
					<a class="btnavail btn btn-outline-success" type="submit" href="">Avail</a>
				</div>
			</article>
		</div>
		<div class="item-grid-list-index">
			<div class="thumb" style="background-image: url(Images/houseclean.jpeg);"></div>
			<article>
				<h1>House Maid</h1>
				<div style="display:inline-block;margin-bottom:10px;"><i class="fa-solid fa-location-dot"></i><span> Pagbilao</span></div>
				<p>You can't seem to locate a maid to work in your home? Come visit and hire as many maids as you like.</p>
				<div class="btngrp">
					<a class="btncontact btn btn-outline-success" type="submit" href="">Contact</a>
					<a class="btnavail btn btn-outline-success" type="submit" href="">Avail</a>
				</div>
			</article>
		</div>
		<div class="item-grid-list-index">
			<div class="thumb" style="background-image: url(Images/laba.jpg);"></div>
			<article>
				<h1>Laundering</h1>
				<div style="display:inline-block;margin-bottom:10px;"><i class="fa-solid fa-location-dot"></i><span> Candelaria</span></div>
				<p>Are you tired of doing your own laundry at home? Come here and hire someone to do it for you.</p>
				<div class="btngrp">
					<a class="btncontact btn btn-outline-success" type="submit" href="">Contact</a>
					<a class="btnavail btn btn-outline-success" type="submit" href="">Avail</a>
				</div>
			</article>
		</div>
		<div class="item-grid-list-index">
			<div class="thumb" style="background-image: url(Images/manicure.jpg);"></div>
			<article>
				<h1>Pedicure</h1>
				<div style="display:inline-block;margin-bottom:10px;"><i class="fa-solid fa-location-dot"></i><span> Gumaca</span></div>
				<p>If you can't locate a pedicurist in your region, come here and look for one.</p>
				<div class="btngrp">
					<a class="btncontact btn btn-outline-success" type="submit" href="">Contact</a>
					<a class="btnavail btn btn-outline-success" type="submit" href="">Avail</a>
				</div>
			</article>
		</div>
		<div class="item-grid-list-index">
			<div class="thumb" style="background-image: url(Images/plum.jpg);"></div>
			<article>
				<h1>Plumber</h1>
				<div style="display:inline-block;margin-bottom:10px;"><i class="fa-solid fa-location-dot"></i><span> Unisan</span></div>
				<p>If you're not sure where to look for someone to mend your water line, come to us to get someone to do it for you in your present location.</p>
				<div class="btngrp">
					<a class="btncontact btn btn-outline-success" type="submit" href="">Contact</a>
					<a class="btnavail btn btn-outline-success" type="submit" href="">Avail</a>
				</div>
			</article>
		</div>
	</div>
</div>

</body>

</html>
@endsection