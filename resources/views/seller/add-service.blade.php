<!--php 
    include_once("data-connection.php");
    $createConnection = setUpConnection();

    if(isset($_POST['btnSubmit'])){
        $Stitle=$_POST['txttitle'];
        $category=$_POST['categories'];
        $Slocation=$_POST['txtlocation'];
        $minSalary=$_POST['txtminsalary'];
        $maxSalary=$_POST['txtmaxsalary'];
        $postDescription=$_POST['txtdescription'];

        $insertData="INSERT INTO `tblposting`(`title`, `category`, `location`, `minSalary`, `maxSalary`, `description`) VALUES ('$Stitle', '$category', '$Slocation', '$minSalary', '$maxSalary', '$postDescription')";

        $createConnection->query($insertData) or die($createConnection->error);
        echo header("Location: Main.php");
    }
    
?>-->
@extends('layouts.master')
@section('title', 'Add-Service | JobSpeed')
@section('main-container')
<link rel="stylesheet" type="text/css" href="css-js/add-service.css">
<style>
    .text-error{
        font-size:15px; 
        
    }
</style>
<body>
    <br><br><br><br>
    <div class="container">
        <div class="grid-freelancer-add-info">
            <div class="box-1 ">
                <form action="{{ url('save-service') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <h3 style="font-weight:bold;">Post Service</h3>
                        <br><br>
                        <div class="col">
                            Service Title
                            <div class=" form mb-3 ">
                                <input type="text" name="title" id="search" placeholder="Title" class="inputsignup form-control">
                                <span class="text-error text-danger ms-1">@error ('title'){{ $message }} @enderror</span>
                            </div>
                        </div>
                        <div class="col">
                            Categories
                            <div class="input-group mb-3">
                                <select name ="category" class="inputsignup form-select" id="inputGroupSelect01">
                                  <option selected>Choose...</option>
                                  <option value="Painting">Painting</option>
                                  <option value="Plumbing">Plumbing</option>
                                  <option value="Carpenting">Carpenting</option>
                                  <option value="Electronics">Electronics</option>
                                </select>
                                
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            Service Location
                            <div class=" form mb-3 ">
                                <input type="text" name="location" id="search" placeholder="Location" class="inputsignup loc form-control">
                                <span class="text-error text-danger ms-1">@error ('location'){{ $message }} @enderror</span>
                            </div>
                        </div>
                        <div class="col">
                            Minimum Pricing
                            <div class=" form mb-3 ">
                                <input type="text" name="minPricing" id="search" placeholder="₱" class="inputsignup min form-control">
                                <span class="text-error text-danger ms-1">@error ('minPricing'){{ $message }} @enderror</span>
                            </div>
                        </div>
                        <div class="col">
                            Maximum Pricing
                            <div class=" form mb-3 ">
                                <input type="text" name="maxPricing" id="search" placeholder="₱" class="inputsignup max form-control"> 
                                <span class="text-error text-danger ms-1">@error ('maxPricing'){{ $message }} @enderror</span>
                            </div>
                        </div>
                    </div>
                    Description
                    <div class=" form mb-3 ">
                        <textarea class="inputsignup form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
                        <span class="text-error text-danger ms-1">@error ('maxPricing'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Insert Image</label>
                        <input type="file" name="service_image" class="form-control">
                    </div>
                    <br>
                    <div class="group">
                        <a class="btncancel btn btn-outline-success" type="submit" href="feed">Cancel</a>
                        <button type="submit" class="btncancel btn btn-secondary" >Save</button>
                        
                    </div>
                </form>
            </div>  
    
        </div>
    </div>
    
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><<br>
</body>
</html>
@endsection
