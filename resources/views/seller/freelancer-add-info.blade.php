<!--php
    include_once("data-connection.php");
    $createConnection = setUpConnection();

    if(isset($_POST['btnSubmit'])){
        $fname=$_POST['txtfirstname'];
        $date=$_POST['txtdate'];
        $lname=$_POST['txtlastname'];
        $gender=$_POST['exampleRadios'];
        $email=$_POST['txtemail'];
        $contact=$_POST['txtcontact'];
        $address=$_POST['txtaddress'];

        $insertData="INSERT INTO `tbladditionalinfo`(`firstname`,`lastname`, `gender`, `bday`, `email`, `contact`, `address`) VALUES ('$fname', '$lname', '$gender','$date', '$email', '$contact', '$address')";

        $createConnection->query($insertData) or die($createConnection->error);
        echo header("Location: Main.php");
    }
    
endphp
-->
@extends('layouts.master')
@section('title', 'Add Information | JobSpeed')
@section('main-container')
<style>
    .text-error{
        font-size:16px; 
        
        
    }
    input[type="file"] {
  display: none;
}

.custom-file-upload {
  position: relative;
  top:-45px;
  left:30px;
  width: 290px;
  padding: 6px 12px;
  cursor: pointer;
  color: white;
  background:#4F2982;
  border: none;
  border-radius: 4px;
  font-size: 16px;
  text-align: center;
}

.custom-file-upload:hover {
  color: rgb(255, 255, 255);
  background-color: #9F68E8;
  
}
</style>
<link rel="stylesheet" type="text/css" href="{{ asset('css-js/freelancer-info.css') }}">
<body>
<form action="{{ 'add-desc' }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="grid-freelancer-add-info">
        <div class="box-1 grid-row-span">
            <div class="main-profile">
                <div class="cover-image">
                    <img src="{{ asset('Images/city1.jpg') }}">
                </div>
                <div class="profile-image">
                    <img src="{{ asset('/Images/uploaded-profile') . '/' . $data->profile_image }}">
                </div>
                <label for="profile-image-input" class="custom-file-upload previewprofile">
                    Add photo
                </label>
                <input type="file" name="profile_image" id="profile-image-input" accept="image/*" onchange="previewImage()">
                
                
                <hr class="hr-profile">
                
            </div>
            <div class="mb-3 box-description">
                <label for="description" class="form-label">Description</label>
                <textarea placeholder="Input your details about your profile etc.." class="form-control" name='description' id="description" rows="6" >{{ old('description') }}</textarea>
                <span class="text-error text-danger ms-1">@error ('description'){{ $message }} @enderror</span>
            </div>

        
        </div>
        <div class="box-2">
            <h3>Details</h3>
            
                @if (Session::has('success'))
                    <div div class="alert alert-success" style="width:572px;">{{ Session::get('success') }}</div>
                @endif
                @if (Session::has('error'))
                    <div class="alert alert-danger" style="width:572px;">{{ Session::get('error') }}</div>
                @endif
                
                

                <div class="row">
                    <div class="col">
                        <div class=" form-floating mb-3 ">  
                            <input type="text" readonly  placeholder="FirstName" class="inputsignup form-control" value="{{ $data->FirstName }}">
                            <label for="FirstName">First Name<i style="margin-left:177px;" class="fa-solid fa-address-card"></i></label>
                            
                        </div>
                    </div>
                    <div class="col">
                        <div class=" form-floating mb-3 ">
                            <input type="date" name="birthday" id="birthday" placeholder="Date" value="{{ old('birthday') }}" class="inputsignup form-control">
                            <label for="bday">Birthdate</label>
                            <span class="text-error text-danger ms-1">@error ('birthday'){{ $message }} @enderror</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class=" form-floating mb-3 ">
                            <input type="text"  readonly  placeholder="LastName" class="inputsignup form-control" value="{{ $data->LastName }}">
                            <label for="LastName">Last Name<i style="margin-left:174px;" class="fa-solid fa-address-card"></i></label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="gender" value="Male" >
                            <label class="form-check-label" for="exampleRadios1">Male</label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="gender" value="Female" >
                            <label class="form-check-label" for="exampleRadios1">Female</label>
                          </div>
                          <span class="text-error text-danger ms-1">@error ('gender'){{ $message }} @enderror</span>
                    </div>
                    
                </div>
                <br><br>
                <div class="box-4">
                    <div class="group">
                        <a class="btncancel btn btn-outline-success" type="submit" href="feed">Cancel</a>
                        <input type="submit" name="btnSubmit" value="Save" class="btncancel btn btn-secondary" href="">
                        <br><br>
                        <p><span style="font-weight:bold">NOTE:</span> Once you click save you will become a freelancer for home services.</p>
                         <div class="form-check">
                            <input class="form-check-input" type="radio" name="checkTerms" id="checkTerms" value="checkTerms" >
                            <label class="form-check-label" for="exampleRadios1">By ticking this you are agreeing to the <span style="color:#4f2982;font-weight:bold"><a href="terms.blade.php" target="_blank">TERMS</a></span> and <span style="color:#4f2982;font-weight:bolder"><a href="privacy.blade.php" target="_blank">PRIVACY POLICY</a></span>.</label>
                          </div>
                    </div>
                    
                </div>    
                </div>
                <div class="box-3">
                    <h3>Contacts</h3>
                    <div class=" form-floating mb-3 ">
                        <input type="email" readonly id="email" placeholder="Email" class="inputsignup form-control" value="{{ $data->email }}">
                        <label for="email">Email<i style="margin-left:314px;" class="fa-solid fa-envelope"></i></label>
                    </div>
                    <div class=" form-floating mb-3 ">
                        <input type="text" name="contact_number" id="contact_number" placeholder="Contact Number" value="{{ old('contact_number') }}" class="inputsignup form-control">
                        <label for="contact_number">Contact Number<i style="margin-left:230px;" class="fa-solid fa-phone"></i></label>
                        <span class="text-error text-danger ms-1">@error ('contact_number'){{ $message }} @enderror</span>
                    </div>
                    <div class=" form-floating mb-3 ">
                        <input type="text" name="address" id="address" placeholder="Address" value="{{ old('address') }}" class="inputsignup form-control">
                        <label for="address">Address <i style="margin-left:290px;" class="fa-solid fa-location-dot"></i></label>
                        <span class="text-error text-danger ms-1">@error ('address'){{ $message }} @enderror</span>
                    </div>
                </div>
            
    </div>
</form>
    <br>
    <br><br><br><br><br><br><br><br><br><br>
</body>
@endsection