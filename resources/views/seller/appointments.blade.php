@extends('layouts.master')
@section('title', 'Appointments | JobSpeed')
@section('main-container')
<link rel="stylesheet" type="text/css" href="{{ asset('css-js/showAllappointments.css') }}">
<body>
  <br><br><br><br>
  <div class="container">
    <div class="">
      <ul class="ul-tab">
        <li class="tab-item active" target-wrapper="first-dynamic-table" target-tab="home">Home</li>
        <li class="tab-item" target-wrapper="first-dynamic-table" target-tab="about">Pending</li>
        <li class="tab-item" target-wrapper="first-dynamic-table" target-tab="faqs">Ongoing</li>
        <li class="tab-item" target-wrapper="first-dynamic-table" target-tab="contact">Completed</li>
      </ul>
      <div id="first-dynamic-table">
        <div class="tab-content active" id="home">
          <div class="col d-flex" style="justify-content:flex-end;">
            <a class="btn-prev btninservice btn btn-outline-success" type="submit" href="{{ url('/Dashboard')}}">Back</a>
          </div>
          <table class="table" style="margin-top:10px;">
            <thead>
              <tr>
                <th scope="col">No.</th>
                <th scope="col">Name</th>
                <th scope="col">Phone Number</th>
                <th scope="col">Preffered Time</th>
                <th scope="col">Date</th>
                <th scope="col">Location</th>
                <th scope="col">Status</th>
                <th scope="col">Actions</th>
                
              </tr>
            </thead>
            <tbody>
                @foreach ($appointment as $appointmentData)
              <tr style="text-transform: capitalize; ">
                
                <th scope="row">{{ $appointmentData->id }}</th>
                <td>{{ $appointmentData->FirstName }} {{ $appointmentData->LastName }}</td>
                <td>{{ $appointmentData ->contact }}</td>
                <td>{{ $appointmentData ->time }}</td>
                <td>{{ \Carbon\Carbon::parse($appointmentData->date)->isoFormat('MMM D YYYY')}}</td>
                <td>{{ $appointmentData ->city }}, {{ $appointmentData ->street }}</td>
                <td><p style="background-color:aqua;text-align:center">{{ $appointmentData ->status }}</p></td>
                <td>
                  <form action="{{ url('edit-appointment/'.$appointmentData->id) }}" method="post">
                    <button class="btnaction btn btn-secondary" type="submit">Approve</button>
                  </form>
                  
                  
                </td>
              </tr>
              @endforeach
              
              
            </tbody>
          </table>
        </div>
        <div class="tab-content" id="about">
          <div class="col d-flex" style="justify-content:flex-end;">
            <a class="btn-prev btninservice btn btn-outline-success" type="submit" href="{{ url('/Dashboard')}}">Back</a>
          </div>
          <table class="table" style="margin-top:10px;">
            <thead>
              <tr>
                <th scope="col">No.</th>
                <th scope="col">Name</th>
                <th scope="col">Phone Number</th>
                <th scope="col">Preffered Time</th>
                <th scope="col">Date</th>
                <th scope="col">Location</th>
                <th scope="col">Status</th>
                <th scope="col">Actions</th>
                
              </tr>
            </thead>
            <tbody>
              @foreach ($appointment as $appointmentData)
                @if ($appointmentData->status == 'pending')
                  <tr style="text-transform: capitalize; ">
                    <th scope="row">{{ $appointmentData->id }}</th>
                    <td>{{ $appointmentData->FirstName }} {{ $appointmentData->LastName }}</td>
                    <td>{{ $appointmentData ->contact }}</td>
                    <td>{{ $appointmentData ->time }}</td>
                    <td>{{ \Carbon\Carbon::parse($appointmentData->date)->isoFormat('MMM D YYYY')}}</td>
                    <td>{{ $appointmentData ->city }}, {{ $appointmentData ->street }}</td>
                    <td><p style="background-color:aqua;text-align:center">{{ $appointmentData ->status }}</p></td>
                    <td>
                      <form action="{{ url('edit-appointment/'.$appointmentData->id) }}" method="post">
                        <button class="btnaction btn btn-secondary" type="submit">Approve</button>
                      </form>         
                    </td>
                  </tr>
                @endif
              @endforeach
            </tbody>
          </table>
        </div>
        <div class="tab-content" id="faqs">
          <div class="col d-flex" style="justify-content:flex-end;">
            <a class="btn-prev btninservice btn btn-outline-success" type="submit" href="{{ url('/Dashboard')}}">Back</a>
          </div>
          <table class="table" style="margin-top:10px;">
            <thead>
              <tr>
                <th scope="col">No.</th>
                <th scope="col">Name</th>
                <th scope="col">Phone Number</th>
                <th scope="col">Preffered Time</th>
                <th scope="col">Date</th>
                <th scope="col">Location</th>
                <th scope="col">Status</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($appointment as $appointmentData)
                @if ($appointmentData->status == 'ongoing')
                  <tr style="text-transform: capitalize; ">
                    <th scope="row">{{ $appointmentData->id }}</th>
                    <td>{{ $appointmentData->FirstName }} {{ $appointmentData->LastName }}</td>
                    <td>{{ $appointmentData ->contact }}</td>
                    <td>{{ $appointmentData ->time }}</td>
                    <td>{{ \Carbon\Carbon::parse($appointmentData->date)->isoFormat('MMM D YYYY')}}</td>
                    <td>{{ $appointmentData ->city }}, {{ $appointmentData ->street }}</td>
                    <td><p style="background-color:aqua;text-align:center">{{ $appointmentData ->status }}</p></td>
                    <td>
                      <form action="{{ url('edit-appointment/'.$appointmentData->id) }}" method="post">
                        <button class="btnaction btn btn-secondary" type="submit">Approve</button>
                      </form>         
                    </td>
                  </tr>
                @endif
              @endforeach
            </tbody>
          </table>
        </div>
        <div class="tab-content" id="contact">
          <div class="col d-flex" style="justify-content:flex-end;">
            <a class="btn-prev btninservice btn btn-outline-success" type="submit" href="{{ url('/Dashboard')}}">Back</a>
          </div>
          <table class="table" style="margin-top:10px;">
            <thead>
              <tr>
                <th scope="col">No.</th>
                <th scope="col">Name</th>
                <th scope="col">Phone Number</th>
                <th scope="col">Preffered Time</th>
                <th scope="col">Date</th>
                <th scope="col">Location</th>
                <th scope="col">Status</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($appointment as $appointmentData)
                @if ($appointmentData->status == 'completed')
                  <tr style="text-transform: capitalize; ">
                    <th scope="row">{{ $appointmentData->id }}</th>
                    <td>{{ $appointmentData->FirstName }} {{ $appointmentData->LastName }}</td>
                    <td>{{ $appointmentData ->contact }}</td>
                    <td>{{ $appointmentData ->time }}</td>
                    <td>{{ \Carbon\Carbon::parse($appointmentData->date)->isoFormat('MMM D YYYY')}}</td>
                    <td>{{ $appointmentData ->city }}, {{ $appointmentData ->street }}</td>
                    <td><p style="background-color:aqua;text-align:center">{{ $appointmentData ->status }}</p></td>
                    <td>
                      <form action="{{ url('edit-appointment/'.$appointmentData->id) }}" method="post">
                        <button class="btnaction btn btn-secondary" type="submit">Approve</button>
                      </form>         
                    </td>
                  </tr>
                @endif
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
    
    
    
  </div>
  <script>
    let tabSwitchers = document.querySelectorAll('[target-wrapper]')
        tabSwitchers.forEach(item => {
            item.addEventListener('click', (e)=> {
                let currentWrapperId = item.getAttribute('target-wrapper')
                let currentWrapperTargetId = item.getAttribute('target-tab')
                
                let currentWrapper =  document.querySelector(`#${currentWrapperId}`)
                let currentWrappersTarget = document.querySelector(`#${currentWrapperTargetId}`)

                let allCurrentTabItem = document.querySelectorAll(`[target-wrapper='${currentWrapperId}']`)
                let allCurrentWrappersTarget = document.querySelectorAll(`#${currentWrapperId} .tab-content`)
              
                if(currentWrappersTarget) {
                    if(!currentWrappersTarget.classList.contains('active')) {
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
        })
  </script>
  <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</body>
@endsection