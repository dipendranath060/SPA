@extends('layouts.front-master')
@section('title', 'Golden Door Soft SPA')
@section('image', asset('assets/images/logo.png'))
@section('content')
<!-- Home -->

<div class="home_main">
    <!-- Home Slider -->
    <div class="home_slider_container">
      <div class="owl-carousel owl-theme home_slider">
        <!-- Slide -->
        @foreach ($banners as $banner)
        <div class="owl-item">
          <div
            class="background_image"
            style="background-image: url({{ asset('uploads/banners/'.$banner->image) }})"
          ></div>
          <div class="home_maincontainer z-2">
            <div class="container">
              <div class="row">
                <div class="col">
                  <div class="home_content">
                    <div class="home_maintitle">{{$banner->title}}</div>
                    <div class="home_maintext mb-3">
                      <p class="text-white">
                        {{$banner->description}}
                      </p>
                    </div>
                    <button class="button button_1 trans_200">
                      <a href="{{route('contact')}}">make an appointment</a>
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>

      <!-- Home Slider Dots -->

      <div class="home_slider_dots">
        <ul id="home_slider_custom_dots" class="home_slider_custom_dots">
          <li class="home_slider_custom_dot trans_200 active"></li>
          <li class="home_slider_custom_dot trans_200"></li>
          <li class="home_slider_custom_dot trans_200"></li>
        </ul>
      </div>
    </div>
  </div>

  <!-- Intro -->

  <div class="intro">
    <div class="container">
      <div class="row justify-content-end">
        <!-- Intro Content -->
        <div class="col-lg-6 intro_col">
          <div class="intro_content position-relative z-1">
            <div class="section_title_container">
              <div class="section_subtitle">Get to know us</div>
              <div class="section_title">
                <h2>Welcome to our Spa</h2>
              </div>
            </div>
            <div class="intro_text">
              <p>          
                Welcome to our serene sanctuary! At our spa, indulge in a blissful escape where tranquility meets rejuvenation. Step into a world of relaxation and self-care, where every treatment is tailored to restore your mind, body, and spirit. Our skilled therapists curate personalized experiences, from soothing massages to revitalizing facials and luxurious body treatments. Immerse yourself in a calming ambiance adorned with aromatic scents, gentle melodies, and a haven of comfort. 
              </p>
            </div>
            <div class="milestones">
              <div class="row milestones_row">
                <!-- Milestone -->
                @foreach ($milestones as $milestone)
                <div class="col-md-4 milestone_col">    
                  <div class="milestone">
                    <span class="counter-stat">{{$milestone->achievement}}</span>
                    <div class="milestone_text">{{$milestone->title}}</div>
                  </div>
                </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Why Choose Us -->

  <div class="why">
    <div class="container">
      <div class="row align-items-center">
        <!-- Why Choose Us Content -->
        <div class="col-lg-6">
          <div class="why_content">
            <div class="section_title_container">
              <div class="section_subtitle">Our Benefits</div>
              <div class="section_title">
                <h2>Why choose us?</h2>
              </div>
            </div>
            <div class="why_text">
              <p>
                Choose our spa for unmatched expertise, personalized care, and a sanctuary dedicated to crafting a unique relaxation and wellness experience just for you.
              </p>
            </div>
            <div class="why_list">
              <ul>
                <!-- Why List Item -->
                <li
                  class="d-flex flex-row align-items-center justify-content-start"
                >
                  <div
                    class="icon_container d-flex flex-column align-items-center justify-content-center"
                  >
                    <div class="icon">
                      <img
                        src="{{ asset('assets/images/services.svg') }}"
                        alt="https://www.flaticon.com/authors/prosymbols"
                      />
                    </div>
                  </div>
                  <div class="why_list_content">
                    <div class="why_list_title">Excellent Service</div>
                    <p class="why_list_text">
                      Ensuring your complete relaxation and rejuvenation.
                    </p>
                  </div>
                </li>

                <!-- Why List Item -->
                <li
                  class="d-flex flex-row align-items-center justify-content-start"
                >
                  <div
                    class="icon_container d-flex flex-column align-items-center justify-content-center"
                  >
                    <div class="icon">
                      <img
                        src="{{ asset('/assets/images/staff.svg') }}"
                        alt="https://www.flaticon.com/authors/prosymbols"
                      />
                    </div>
                  </div>
                  <div class="why_list_content">
                    <div class="why_list_title">The Best Staff</div>
                    <p class="why_list_text">
                      Our spa boasts an unparalleled team.
                    </p>
                  </div>
                </li>

                <!-- Why List Item -->
                <li
                  class="d-flex flex-row align-items-center justify-content-start"
                >
                  <div
                    class="icon_container d-flex flex-column align-items-center justify-content-center"
                  >
                    <div class="icon">
                      <img
                        src="{{ asset('assets/images/icon_3.svg') }}"
                        alt="https://www.flaticon.com/authors/prosymbols"
                      />
                    </div>
                  </div>
                  <div class="why_list_content">
                    <div class="why_list_title">Great Feedback</div>
                    <p class="why_list_text">
                      Your feedback powers our exceptional service.
                    </p>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>

        <!-- Why Choose Us Image -->
        <div class="col-lg-6">
          <div class="why_image_container">
            <div class="why_image">
              <img src="{{ asset('assets/images/why_bg.jpg') }}" alt="" class="w-100" />
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Services -->

  <div class="services mb-5">
    <div class="container">
      <div class="row">
        <div class="col text-center">
          <div class="section_title_container">
            <div class="section_subtitle">Get Best Treatment</div>
            <div class="section_title">
              <h2>Our Services</h2>
            </div>
          </div>
        </div>
      </div>
      <div class="row services_row justify-content-center">
        <!-- Service -->
        @foreach ($services as $service)
        @if ($loop->index < 3)
        <div class="col-lg-4 col-md-6 service_col">
          <div class="service rounded-1">
            <div class="service_img rounded-1">
              <a href="#">
                <img src="{{ asset('uploads/services/'.$service->image) }}" class="w-100" alt="" />
              </a>
            </div>
            <div class="service_body px-4 pb-3">
              <h4>
                <a href="#" class="service_title">{{$service->title}}</a>
              </h4>
              <div class="service_text">
                <p>
                  {{Str::limit($service->description,50)}}
                </p>
              </div>
              <button class="button button_1">
                <a href="#">Read More</a>
              </button>
            </div>
            <div class="service_bg">
              <img src="{{ asset('assets/images/servicebg.png') }}" alt="" />
            </div>
          </div>
        </div>
        @endif
        @endforeach
      </div>
      <div class="text-center">
        <button class="button button_2 trans_400">
          <a href="{{route('service')}}"> View More </a>
        </button>
      </div>
    </div>
  </div>

  <!-- Call to action -->

  <div class="cta">
    <div class="container">
      <div class="row">
        <div class="col">
          <div
            class="cta_container d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-center"
          >
            <div class="cta_content me-4">
              <div class="cta_title text-uppercase">
                Make your appointment today!
              </div>
            </div>
            <div class="cta_phone ml-lg-auto">
              <a href="tel:+977 9843684582" class="text-white"
                >+977 9843684582</a
              >
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>       
@endsection
@section('scripts')

    <!-- for home page only -->
    <script src="{{ asset('plugins/OwlCarousel2-2.2.1/owl.carousel.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <script src="{{ asset('plugins/counterup/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('plugins/counterup/jquery.waypoints.min.js') }}"></script>
@endsection
