@extends('layouts.front-master')
@section('title', 'Golden Door Soft SPA | Contact')
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
                  <div class="home_title">Contact</div>
                  <div class="home_text">
                    <a href="{{route('homes')}}" class="text-white fw-bold">Home</a>
                    <span class="mx-2">/</span>
                    <span class="active_breadcrumb">Contact</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Contact -->

      <div class="contact">
        <div class="container">
          <div class="row">
            <!-- Contact Form -->
            <div class="col-lg-6">
              <div class="contact_form_container">
                <div class="contact_form_title">Make an Appointment</div>
                @if (session('message'))
                    <div class="alert alert-success">{{session('message')}}</div>
                @endif
                  @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                          <div>{{$error}}</div>
                        @endforeach
                    </div>
                  @endif 
                  <form action="{{route('sendMail')}}" method="POST" class="contact_form" id="contact_form">
                  @csrf
                  <div class="d-flex flex-column align-items-start justify-content-between flex-wrap" >
                    <input
                      type="text"
                      class="contact_input w-100"
                      placeholder="Your Name"
                      name="name"
                      required="required"
                    />
                    <input
                      type="email"
                      class="contact_input w-100"
                      placeholder="Your E-mail"
                      name="email"
                      required="required"
                    />
                    <input
                      type="number"
                      class="contact_input w-100"
                      placeholder="Your Phone"
                      name="phone"
                      required="required"
                    />
                    <select name="package" id="package" class="contact_input w-100">
                      @foreach ($packages as $package)    
                      <option value="{{$package->id}}">{{$package->title}}</option>
                      @endforeach
                    </select>
                    <input
                      type="text"
                      name="date"
                      id="datepicker"
                      class="contact_input datepicker w-100"
                      placeholder="Date"
                      required="required"
                    />
                    <textarea name="message" id="message" rows="10" class="w-100 contact_input pt-2" placeholder="Your Message"></textarea>
                  </div>
                  <button type="submit"  class="button button_1 contact_button trans_200">
                    make an appointment
                  </button>
                </form>
              </div>
            </div>

            <!-- Contact Content -->
            <div class="col-lg-5 offset-lg-1 contact_col">
              <div class="contact_content">
                <div class="section_subtitle">Contact with us</div>
                <div class="section_title"><h2>Get in touch</h2></div>
                <div class="contact_content_text">
                  <p>
                    Thank you for considering our spa for your relaxation needs. 
                    Please feel free to reach out with any inquiries or to schedule an appointment. 
                    We look forward to pampering you soon!
                  </p>
                </div>
                <div
                  class="direct_line d-flex flex-row align-items-center justify-content-start"
                >
                  <div class="direct_line_title text-center">Direct Line</div>
                  <div class="direct_line_num text-center">
                    +977 9843684582 | 9823455328
                  </div>
                </div>
                <div class="contact_info">
                  <ul>
                    <li class="d-flex flex-row align-items-start justify-content-start gap-2">
                      <div><i class="fa fa-map-marker me-1"></i>Address</div>
                      <div>Bakhundol, Lalitpur, Nepal</div>
                    </li>
                    <li class="d-flex flex-row align-items-start justify-content-start gap-2">
                      <div><i class="fa fa-phone me-1"></i>Phone</div>
                      <div>+977 9843684582 9823455328</div>
                    </li>
                    <li class="d-flex flex-row align-items-start justify-content-start gap-2">
                      <div><i class="fa fa-envelope me-1"></i>E-mail</div>
                      <div>contact@gmail.com</div>
                    </li>
                  </ul>
                </div>
                <div class="contact_social">
                  <ul class="d-flex flex-row align-items-center justify-content-start">
                    <li>
                      <a href="#" target="_blank"
                        ><i class="fa fa-facebook" aria-hidden="true"></i
                      ></a>
                    </li>
                    <li>
                      <a href="#" target="_blank"
                        ><i class="fa fa-twitter" aria-hidden="true"></i
                      ></a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="row google_map_row">
            <div class="col">
              <!-- Contact Map -->

              <div class="contact_map">
                <!-- Google Map -->

                <div class="map">
                  <div id="google_map" class="google_map">
                    <div class="map_container">
                      <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14132.341675467795!2d85.3124664!3d27.6837547!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb191d21bc5245%3A0xb7254a091601809a!2sGolden%20Door%20Soft%20Spa%20and%20Beauty!5e0!3m2!1sen!2snp!4v1699527639893!5m2!1sen!2snp"
                        width="100%"
                        height="100%"
                        style="border: 0"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"
                      ></iframe>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection
@section('scripts')
<script src="{{ asset('assets/js/contact.js') }}"></script>
<script src="{{ asset('plugins/jquery-datepicker/jquery-ui.min.js') }}"></script>
@endsection