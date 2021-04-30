@extends('layouts.app')
@section("title","Home")
@section('content')
<!-- Hero Slides-->
<div class="owl-carousel-one owl-carousel">

  <div class="single-hero-slide bg-overlay" style="background-image: url('img/bg-img/31.jpg')">
    <div class="slide-content h-100 d-flex align-items-center text-center">
      <div class="container">
        <h4 class="text-white mb-1" data-animation="fadeInUp" data-delay="100ms" data-wow-duration="500ms">#IndiaFightsCorona</h4>
        <p class="text-white mb-4" data-animation="fadeInUp" data-delay="400ms" data-wow-duration="500ms">Find Reliable & Verified Resources.</p>
      </div>
    </div>
  </div>

  <div class="single-hero-slide bg-overlay" style="background-image: url('img/bg-img/32.jpg')">
    <div class="slide-content h-100 d-flex align-items-center text-center">
      <div class="container">
        <h4 class="text-white mb-1" data-animation="fadeInUp" data-delay="100ms" data-wow-duration="1000ms">{{config("app.name")}} on Mission</h4>
        <p class="text-white mb-4" data-animation="fadeInUp" data-delay="400ms" data-wow-duration="1000ms">Helping Millions of People get Health Care.</p>
      </div>
    </div>
  </div>
 

  
</div>
<!-- Welcome Toast-->
<div class="toast toast-autohide custom-toast-1 toast-success home-page-toast" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="10000" data-bs-autohide="true">
  <div class="toast-body">
    <svg class="bi bi-bookmark-check text-white" width="30" height="30" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
      <path fill-rule="evenodd" d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5V2zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1H4z"></path>
      <path fill-rule="evenodd" d="M10.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z"></path>
    </svg>
    <div class="toast-text ms-3 me-2">
      <p class="mb-1 text-white">Welcome to {{config("app.name")}}</p><small class="d-block"></small>
    </div>
    <button class="btn btn-close btn-close-white position-relative p-1 ms-auto" type="button" data-bs-dismiss="toast" aria-label="Close"></button>
  
  </div> 
</div>

<div class="container">
  <div class="row">
  <br> <br>
  </div>
</div>


<div class="container">
  <div class="row">
    <div class="col-6">
     
      <div class="card bg-danger mb-3 shadow-sm bg-gradient direction-rtl">
        <div class="card-body">
          <img class="card-bg-img center" width="128" height="128" src="{{asset("assets/icons/ambulance-large.png")}}" alt="">
          <h2 class="text-white">Ambulance Service</h2>
        <a class="btn btn-warning" href="{{route("resources.ambulance")}}">Find Availability</a>
        </div>
      </div>
    </div>
    <div class="col-6">
      <div class="card bg-primary mb-3 shadow-sm bg-gradient direction-rtl">
        <div class="card-body">
          <img class="card-bg-img center" width="128" height="128" src="{{asset("assets/icons/hospital-large.png")}}" alt="">
          <h2 class="text-white">Hospital Availability</h2>
        <a class="btn btn-warning" href="{{route("resources.hospital")}}">Find Availability</a>   
       </div>
      </div>
    </div>
    <div class="col-6">
      <div class="card bg-dark mb-3 shadow-sm bg-gradient direction-rtl">
        <div class="card-body">
          <img class="card-bg-img center" width="128" height="128" src="{{asset("assets/icons/test-tube.png")}}" alt="">
          <h2 class="text-white">Test Facilitator</h2>
        <a class="btn btn-warning" href="{{route("resources.testing")}}">Find Availability</a>   
       </div>
      </div>
    </div>
    <div class="col-6">
      <div class="card bg-danger mb-3 shadow-sm bg-gradient direction-rtl">
        <div class="card-body">
          <img class="card-bg-img center" width="128" height="128" src="{{asset("assets/icons/vaccine-large.png")}}" alt="">
          <h2 class="text-white">Vaccination Availability</h2>
        <a class="btn btn-warning" href="{{route("resources.vaccination")}}">Find Availability</a>   
       </div>
      </div>
    </div>
    <div class="col-6">
      <div class="card bg-primary mb-3 shadow-sm bg-gradient direction-rtl">
        <div class="card-body">
          <img class="card-bg-img center" width="128" height="128" src="{{asset("assets/icons/donor.png")}}" alt="">
          <h2 class="text-white">Plasma Donor</h2>
        <a class="btn btn-warning" href="{{route("resources.plasma")}}">Find Availability</a>   
       </div>
      </div>
    </div>
    <div class="col-6">
      <div class="card bg-info mb-3 shadow-sm bg-gradient direction-rtl">
        <div class="card-body">
          <img class="card-bg-img center" width="128" height="128" src="{{asset("assets/icons/oxygen-large.png")}}" alt="">
          <h2 class="text-white">Oxygen Cylinders</h2>
        <a class="btn btn-warning" href="{{route("resources.oxygen")}}">Find Availability</a>   
       </div>
      </div>
    </div>

    <div class="col-6">
      <div class="card bg-success mb-3 shadow-sm bg-gradient direction-rtl">
        <div class="card-body">
          <img class="card-bg-img center" width="128" height="128" src="{{asset("assets/icons/medicine-large.png")}}" alt="">
          <h2 class="text-white">Medicines Provider</h2>
        <a class="btn btn-warning" href="{{route("resources.medicines")}}">Find Availability</a>   
       </div>
      </div>
    </div>

    <div class="col-6">
      <div class="card bg-primary mb-3 shadow-sm bg-gradient direction-rtl">
        <div class="card-body">
          <img class="card-bg-img center" width="128" height="128" src="{{asset("assets/icons/diet-large.png")}}" alt="">
          <h2 class="text-white">Meals Provider</h2>
        <a class="btn btn-warning" href="{{route("resources.meals")}}">Find Availability</a>   
       </div>
      </div>
    </div>


  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-12">
      <br> <br>
      <div class="card bg-danger mb-3 shadow-sm bg-gradient direction-rtl">
        <div class="card-body">
          <h2 class="text-white">Become A Volunteer with {{config("app.name")}}</h2>
          <p class="text-white mb-4">Become a part of our Team & help people get verified & Reliable resources.</p><a class="btn btn-warning" href="{{route("apply-volunteer")}}">Join Now</a>
        </div>
      </div>
    </div>
    {{-- <div class="col-12">
      <div class="card bg-primary mb-3 shadow-sm bg-gradient direction-rtl">
        <div class="card-body">
          <h2 class="text-white">Are you a Charity or NGO?</h2>
          <p class="text-white mb-4">Let us collaborate & help people get unconditional support in Essential Resources & in Health Care.</p><a class="btn btn-info" href="pages.html">Join <i class="icon-node_link_weight"></i></a>
        </div>
      </div>
    </div> --}}
  </div>
</div>
<div class="container">
  <div class="row">
    <div class="col-12">
      <div class="card bg-dark mb-3 shadow-sm bg-gradient direction-rtl">
        <div class="card-body">
          <h2 class="text-white">{{config("app.name")}}, An Initiative by Stack Nation </h2>
          <p class="text-white mb-4">In Collaboration with Lo Rent Platform & TAM Enterprises.</p><a class="btn btn-success" href="https://stacknation.org/">Visit Now</a>
        </div>
      </div>
    </div>
    
  </div>
</div>
{{-- <div class="container">
  <div class="card">
    <div class="card-body">
      <h2>Post Feedback</h2>
      <div class="card bg-dark mb-3 shadow-sm bg-gradient direction-rtl">
        <!-- Single Testimonial Slide-->
        <div class="card-body">
              <h6 class="mb-2"> form - Review: [text field]</h6><span class="d-block">New Feature (you want to see): [text field] [submit] <!-- Review should appear in admin dashboard --></span>
           </div>
        
        <!-- Single Testimonial Slide-->
      
        <!-- Single Testimonial Slide-->
        
      </div>
    </div>
  </div>
</div> --}}
<div class="pb-3"></div>
@endsection