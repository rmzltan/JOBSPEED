<!--
php

include_once("data-connection.php");
$createConnection = setUpConnection();


$displayContent = "select * from tblposting";

$posts= $createConnection->query($displayContent) or die($createConnection->error);
$row = $posts->fetch_assoc();


if(isset($_POST['txtall'])){
    $query="select * from tblposting";
    $posts= $createConnection->query($query) or die($createConnection->error);
    $row = $posts->fetch_assoc();
}

if(isset($_POST['txtpaint'])){
    $query="select * from tblposting where category='Painting'";
    $posts= $createConnection->query($query) or die($createConnection->error);
    $row = $posts->fetch_assoc();
}
if(isset($_POST['txtplumb'])){
    $query="select * from tblposting where category='Plumbing'";
    $posts= $createConnection->query($query) or die($createConnection->error);
    $row = $posts->fetch_assoc();
}
if(isset($_POST['txtcarp'])){
    $query="select * from tblposting where category='Carpenting'";
    $posts= $createConnection->query($query) or die($createConnection->error);
    $row = $posts->fetch_assoc();
}
if(isset($_POST['txtelec'])){
    $query="select * from tblposting where category='Electronics'";
    $posts= $createConnection->query($query) or die($createConnection->error);
    $row = $posts->fetch_assoc();
}


endphp
-->
@extends('layouts.master')
@section('title', 'Feed | JobSpeed')
@section('main-container')

<link rel="stylesheet" type="text/css" href="css-js/feed1.css">
<body>
    <div class="container-inline-grid">
        
        <div class="container-grid">
            @foreach ($serviceData as $service )
            <div id="left" class="item">
                <a href="{{ url('service-details-jobfeed/'.$service->id) }}" class="card">
                    <img src="{{ asset('Images/uploaded-services') . '/' . $service->service_image }}" alt="" class="thumb">
                    <article>
                        <h1>{{ $service->title }}</h1>
                        <div style="display:inline-block;margin-bottom:5px; margin-top:5px"><i class="fa-solid fa-location-dot"></i><span> {{$service->location}}</span></div>
                        <p>{{ $service->description }}</p>
                        <p>Starting at <span style="color:green;">&#8369; {{ $service->minPricing }}</span></p>
                        <div class="btngrp">
                            <button type="submit" name="btncontact" class="btncontact btn btn-secondary" >Contact</button>
                            <button type="submit" name="btnavail" class="btnavail btn btn-secondary" >Avail</button>
                        </div>
                    </article> 
                </a>
            </div>
            @endforeach
        </div>
        <div class="container-grid-category">
            <div class="itemCategory">
                <h2>Category</h2>   
                <hr>
                    <a href ="" class="category-link">Plumbing</a>
                    <a class="category-link">Painting</a>
                    <a class="category-link">Carpenting</a>
                    <a class="category-link">Electronics</a>
            </div>
            
        </div>
    </div>
    
    
	<br><br><br><br><br><br><br><br><br><br><br><br>
    
</body>
@endsection