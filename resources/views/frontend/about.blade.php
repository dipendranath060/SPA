@extends('layouts.front-master')
@section('title', 'Golden Door Soft SPA | About')
@section('image', asset('assets/images/logo.png'))
@section('content')
    
<div
class="home d-flex flex-column align-items-start justify-content-end"
>
<div
  class="parallax_background parallax-window"
  data-parallax="scroll"
  data-image-src="{{ asset('assets/images/home_bg.jpg') }}"
  data-speed="0.8"
></div>
<div class="home_container">
  <div class="container">
    <div class="row">
      <div class="col">
        <div class="home_content mx-auto text-center">
          <div class="home_title">About us</div>
          <div class="home_text">
            <a href="{{route('homes')}}" class="text-white fw-bold">Home</a>
            <span class="mx-2">/</span>
            <span class="active_breadcrumb">About</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

<!-- Intro -->

<div class="about_intro">
<div class="container">
  <div class="row justify-content-end">
    <!-- Intro Content -->
    <div class="col-lg-7">
      <div class="about_intro_content">
        <div class="section_title_container">
          <div class="section_subtitle">Get to know us</div>
          <div class="section_title"><h2>Welcome to our Spa</h2></div>
        </div>
        <div class="about_intro_text">
          <p>        
            Welcome to our serene sanctuary! At our spa, indulge in a blissful escape where tranquility meets rejuvenation. Step into a world of relaxation and self-care, where every treatment is tailored to restore your mind, body, and spirit. Our skilled therapists curate personalized experiences, from soothing massages to revitalizing facials and luxurious body treatments. Immerse yourself in a calming ambiance adorned with aromatic scents, gentle melodies, and a haven of comfort. 
          </p>
        </div>
        <div class="about_milestones">
          <div class="row milestones_row">
            <!-- Milestone -->
            @foreach ($milestones as $milestone)
            <div class="col-md-4 milestone_col">
              <div class="milestone">
                <span class="counter-stat">{{$milestone->achievement}}</span>
                <div class="about_milestone_text">{{$milestone->title}}</div>
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

<!-- Testimonials -->

<div class="testimonials">
<div class="container">
  <div class="row">
    <div class="col">
      <div class="section_title_container text-center">
        <div class="section_subtitle">What they say</div>
        <div class="section_title"><h2>Our Testimonials</h2></div>
      </div>
    </div>
  </div>
  <div class="row testimonials_row">
    <div class="col">
      <!-- Testimonials Slider -->
      <div class="test_slider_container">
        <div class="owl-carousel owl-theme test_slider">
          <!-- Slide -->
          @foreach ($testimonials as $testimonial)
          @if ($loop->index < 5)
          <div class="owl-item p-4">
            <div class="test_item">
              <div class="test_info d-flex flex-row align-items-center">
                <div class="test_image me-2">
                  <img src="{{ asset('uploads/testimonials/'.$testimonial->image) }}" alt="{{$testimonial->title}}" />
                </div>
                <div class="test_text">{{$testimonial->title}}</div>
              </div>
              <div class="test_text">
                <p>
                  {{Str::limit($testimonial->description,200)}}
                </p>
              </div>
            </div>
          </div>
          @endif
          @endforeach
        </div>
      </div>
    </div>
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
<script src="{{ asset('plugins/counterup/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('plugins/OwlCarousel2-2.2.1/owl.carousel.js') }}"></script>
<script src="{{ asset('plugins/counterup/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('assets/js/about.js') }}"></script>
@endsection