<!--php 

  include_once("data-connection.php");

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

-->


@extends('layouts.master')
@section('title', 'Service-Detail | JobSpeed')
@section('main-container')
<link rel="stylesheet" type="text/css" href="{{ asset('css-js/service-details.css') }}">
<body>
<br><br><br><br><br><br><br><br>
   
<form action="" method="post">
  <div class="container">
    <!--   https://www.jerecho.com/codepen/nike-product-page/ -->
    
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
        <p>{{ $serviceData->minPricing }} to {{ $serviceData->maxPricing }}</p>
      </article>
      <br><br>
      <a class="btninservice btn btn-secondary" role="button" href="{{ url('edit-service/'.$serviceData->id)}}">Edit Record</a>
      <form action="" method="post">
        @csrf
        @method('DELETE')
        <button type="submit" name="btndelete" class="btninservice btn btn-secondary" >Delete</button>
      </form>
      
      <input type="hidden" name="id" >
  
    </div>
  
  </div>
  
</form>
<br><br><br><br><br><br><br><br><br><br><br><br>
    
</body>

@endsection