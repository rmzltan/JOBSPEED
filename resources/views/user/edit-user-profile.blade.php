@extends('layouts.master')
@section('Edit-Profile', 'Dashboard | JobSpeed')
@section('main-container')
  <link rel="stylesheet" type="text/css" href="css-js/user-profile.css">
  <form id="myForm" action="" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="form_action" value="">
    <div class="container-grid">

      <div class="item grid-row-span">
        <div class="main-profile">
          <div class="cover-image">
            <img src="{{ asset('Images/city1.jpg') }}">
          </div>
          <div class="row">
            <div class="col col-lg-4">
              <div class="profile-image">
                <img src="{{ asset('Images/uploaded-profile') . '/' . $data->profile_image }}" id="preview-image">
              </div>
            </div>
          </div>
          <label for="profile-image-input" class="custom-file-upload">
            Add photo
          </label>
          <input type="file" name="profile_image" id="profile-image-input" accept="image/*" onchange="previewImage()">

        </div>
      </div>
      <div class="grid-col-span-3 appointmentbox">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item" role="presentation">
            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab"
              aria-controls="home" aria-selected="true">Profile</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab"
              aria-controls="profile" aria-selected="false">Password</button>
          </li>
          
        </ul>
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <div class="form" style="padding:10px;">
              <div class="row">
                <div class="col">
                  <div class="mb-3">
                    <label for="firstnamd1" class="form-label">First Name</label>
                    <input type="text" class="form-control" name="FirstName" id="firstnamd1" value="{{ $data->FirstName }}"
                      autocomplete="off">
                  </div>
                </div>
                <div class="col">
                  <div class="mb-3">
                    <label for="LastName" class="form-label">Last Name</label>
                    <input type="text" class="form-control" name="LastName" id="LastName" value="{{ $data->LastName }}">
                  </div>
                </div>
              </div>
              <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" name="email" id="email" value="{{ $data->email }}">
              </div>
              <div class="container">
                <div class="row justify-content-end">
                  <div class="col-auto">
                    <!-- Element to be aligned to the end of the grid -->
                    <button type="submit" class="saveCancel btn btn-outline-success float-right mr-1"onclick="submitForm('/update-profile')">Save</button>
                    <a type="button" class="saveCancel btn btn-outline-secondary float-right" href="{{ route('profile_user') }}">Cancel</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <div class="form" style="padding:10px;">
              <div class="row">
                <div class="col">
                  <div class="mb-3">
                    <label for="current_password">Current Password</label>
                    <input type="password" name="current_password" class="form-control" id="current_password" value=""
                      autocomplete="new-password">
                  </div>
                </div>
                <div class="col">
                  <div class="mb-3">
                    <label for="new_password">New Password</label>
                    <input type="password" name="new_password" class="form-control" id="new_password">
                  </div>
                </div>
              </div>
              <div class="container">
                <div class="row justify-content-end">
                  <div class="col-auto">
                    <!-- Element to be aligned to the end of the grid -->
                    <button type="submit" class="saveCancel btn btn-outline-success float-right mr-1"onclick="submitForm('/change-password')">Save</button>
                    <a type="button" class="saveCancel btn btn-outline-secondary float-right"
                      href="{{ route('profile_user') }}">Cancel</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
      </div>
    </div>


    </div>
  </form>
  <script>
    document.getElementById('profile-image-input').addEventListener('change', function() {
      const fileName = this.value.split('\\').pop();
      document.querySelector('.custom-file-upload').innerHTML = 'Add photo';
    });

    function previewImage() {
      // Get the input element and the selected file
      const inputElement = document.getElementById('profile-image-input');
      const file = inputElement.files[0];

      // Create a file reader object
      const reader = new FileReader();

      // Set the file reader object's onload event listener
      reader.onload = function() {
        // Get the preview image element and update its src attribute with the file reader's result
        const previewImageElement = document.getElementById('preview-image');
        previewImageElement.src = reader.result;
      }

      // Read the file as data URL
      reader.readAsDataURL(file);
    }

    function submitForm(action) {
  document.getElementById('myForm').action = action;
  document.getElementById('myForm').submit();
}
  </script>
@endsection
