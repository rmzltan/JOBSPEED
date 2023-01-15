<!--php 
  include_once("data-connection.php");
  $createConnection = setUpConnection();
  $postsID = $_GET['id'];
  $displayContent = "select * from tblposting where id='$postsID'";

  $posts = $createConnection->query($displayContent) or die($createConnection->error);
  $row = $posts->fetch_assoc();

  if(isset($_POST['btnSubmit'])){
    $title=$_POST['txttitle'];
    $category=$_POST['categories'];
    $location=$_POST['txtlocation'];
    $description=$_POST['txtdescription'];
    $price=$_POST['txtprice'];

    $updateData = "UPDATE tblposting SET title = '$title', category='$category', location='$location', description='$description', minSalary='$price' WHERE id='$postsID'";

    $createConnection->query($updateData) or die($createConnection->error);
    echo header("Location: Main.php?id=".$postsID);
  }

-->
@extends('layouts.master')
@section('title', 'Edit-Service | JobSpeed')
@section('main-container')
<link rel="stylesheet" type="text/css" href="{{ url('css-js/edit-service.css') }}">
<body>
    <form action="{{ url('update-service/'.$serviceData->id) }}" method="post">
        @csrf
        @method('PUT')
        <br><br><br>
        

        <div class="container-grid">
           
            <div class="product-image">
                <img src="{{ asset('Images/uploaded-services') . '/' . $serviceData->service_image }}" alt="" class="product-pic">
                <div class="dots">
                <a href="#!" class="active"><i>1</i></a>
                <a href="#!"><i>2</i></a>
                <a href="#!"><i>3</i></a>
                <a href="#!"><i>4</i></a>
                </div>
            </div>
    
            <div class="box-1">
                @if (session('status'))
                    <h6 class="alert alert-success">{{ session('status') }}</h6>
                @endif
                
                <article>
                <h5>Title</h5>
                    <div class=" form mb-3 ">
                        <input type="text" name="title" id="search" placeholder="" class="inputsignup loc form-control" value="{{$serviceData->title}}">
                    </div>
                </article>
                <article>
                    <h5>Category</h5>
                    <div class=" form mb-3 ">
                        <div class="input-group mb-3">
                            <select name ="category" class="inputsignup form-select" id="inputGroupSelect01" value="{{$serviceData->category}}" >
                                <option selected>Choose...</option>
                                <option value="Carpenting">Carpenting</option>
                                <option value="Cleaning">Cleaning</option>
                                <option value="Decorating">Decorating</option>
                                <option value="Demolition">Demolition</option>
                                <option value="Education">Education</option>
                                <option value="Electrical">Electrical</option>
                                <option value="Installation">Installation</option>
                                <option value="Landscaping">Landscaping</option>
                                <option value="Painting">Painting</option>
                                <option value="Plumbing">Plumbing</option>
                                <option value="Repair">Repair</option>
                                <option value="Treatment">Treatment</option>
                                <option value="Wielding">Wielding</option>
                            </select>
                        </div>
                    </div>
                </article>
                <article>
                    <h5>Location</h5>
                    <div class=" form mb-3 ">
                        <input type="text" name="location" id="search" value="{{ $serviceData->location }}" class="inputsignup loc form-control">
                    </div>
                </article>
                <article>
                    <h5>Description</h5>
                    <div class=" form mb-3 ">
                        <textarea class="inputsignup form-control" name="description" id="exampleFormControlTextarea1" rows="3">{{ $serviceData->description }}</textarea>
                    </div>
                
                </article>
                <article>
                    <h5>Price</h5>
                    <div class=" input-group ">
                        <input type="text" name="minPricing" id="search" value="{{ $serviceData->minPricing }}" class="inputsignup loc form-control">
                        <div class="input-group-prepend" >
                            <span class="input-group-text" style="height:50px;">to</span>
                        </div>
                        <input type="text" name="maxPricing" id="search" value="{{ $serviceData->maxPricing }}" class="inputsignup loc form-control">
                    </div>
                </article>
                <br><br>
                <a class="btninservice btn btn-secondary" role="button" href="{{ url('service-details/'.$serviceData->id) }}">Back</a>
                <input type="submit" name="btnSubmit" value="Save" class="btninservice btn btn-secondary">
            </div>
        </div>
    </form>
    
<br><br><br><br><br><br><br><br><br><br><br><br>
</body>
@endsection
