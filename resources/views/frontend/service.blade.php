@extends('layouts.front-master')
@section('title', 'Golden Door Soft SPA | Service')
@section('image', asset('assets/images/logo.png'))
@section('content')


<!-- Home -->

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
                  <div class="home_title">Services</div>
                  <div class="home_text">
                    <a href="{{route('homes')}}" class="text-white fw-bold">Home</a>
                    <span class="mx-2">/</span>
                    <span class="active_breadcrumb">Services</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Services -->

      <div class="services">
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
            <div class="col-lg-4 col-md-6 service_col">
              <div class="service rounded-1">
                <div class="service_img rounded-1">
                  <a href="{{url('service', ['service_slug' => $service->service_slug])}}">
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
                    <a href="{{url('service', ['service_slug' => $service->service_slug])}}">Read More</a>
                  </button>
                </div>
                <div class="service_bg">
                  <img src="{{ asset('assets/images/servicebg.png') }}" alt="" />
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>

      <!-- Packages -->

      <div class="services">
        <div class="container">
          <div class="row">
            <div class="col text-center">
              <div class="section_title_container">
                <div class="section_subtitle">What We Offer</div>
                <div class="section_title">
                  <h2>Our Packages</h2>
                </div>
              </div>
            </div>
          </div>
          <div class="row services_row justify-content-center">
            <!-- Package -->
            @foreach ($packages as $package)
            <div class="col-lg-4 col-md-6 service_col">
              <div class="service rounded-1">
                <div class="service_img rounded-1">
                  <a href="{{route('contact')}}">
                    <img src="{{ asset('uploads/packages/'.$package->image) }}" class="w-100" alt="{{$package->title}}" />
                  </a>
                </div>
                <div class="service_body px-4 pb-3">
                  <div class="d-flex align-items-center justify-content-between">
                    <h4 class="m-0">
                      <a href="#" class="service_title">{{$package->title}}</a>
                    </h4>
                    @if ($package->time)
                      <span class="package_time">
                        {{$package->time}} min.
                      </span>
                    @endif
                  </div>
                    <div class="service_text">
                    <p>
                      {{Str::limit($package->description,150)}}
                    </p>
                  </div>
                  <button class="button button_1">
                    <a href="#"
                      >Get This Package
                      <i class="fa fa-long-arrow-right ms-2"></i
                    ></a>
                  </button>
                </div>
                <div class="service_bg">
                  <img src="{{ asset('assets/images/servicebg.png') }}" alt="" />
                </div>
                <div class="price text-white">Rs.{{$package->price}}</div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>

      <!-- Before and After -->

      <div class="before_and_after">
        <div class="container">
          <div class="row">
            <div class="col">
              <div class="section_title_container text-center">
                <div class="section_title">
                  <h2>Before & After Gallery</h2>
                </div>
              </div>
            </div>
          </div>
          <div class="row before_and_after_row">
            <div class="col">
              <div class="ba_container">
                <figure class="cd-image-container">
                  <img src="{{ asset('assets/images/before.jpg') }}" alt="Original Image" />
                  <span class="cd-image-label" data-type="original"></span>

                  <div class="cd-resize-img">
                    <img src="{{ asset('assets/images/after.jpg') }}" alt="Modified Image" />
                    <span class="cd-image-label" data-type="modified"></span>
                  </div>

                  <span class="cd-handle"></span>
                </figure>
              </div>
              <div class="ba_text text-center">
                <p>            
                  " Facial treatments rejuvenate skin, reducing impurities for a radiant, hydrated look, enhancing texture, boosting confidence with a youthful glow."
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>      
@endsection
@section('scripts')
<script src="{{ asset('plugins/image-comparison-slider-master/main.js') }}"></script>
@endsection