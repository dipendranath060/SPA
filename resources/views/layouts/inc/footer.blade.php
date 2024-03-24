<!-- Footer -->
<footer class="footer">
    <div class="footer_content">
        <div class="container">
            <div class="row align-items-start">

                <!-- Footer About -->
                <div class="col-lg-3 footer_col order-lg-first order-md-first order-xl-first order-xxl-first order-sm-first order-last">
                    <div class="footer_about">
                        <div class="footer_logo">
                            <a href="{{route('homes')}}">
                                <div class="d-flex align-items-center">
                                    <img src="{{ asset('assets/images/logo.png') }}" alt="Logo">
                                    <h2 class="mb-0 mt-1">GOLDEN DOOR<br/><span>SOFT SPA & BEAUTY</span></h2>
                                </div>
                            </a>
                        </div>
                        <div class="footer_about_text">
                            <p>" Balancing Body Mind And Sprit "</p>
                        </div>
                    </div>
                </div>

                <!-- Footer Contact Info -->
                <div class="col-lg-3 footer_col">
                    <div class="footer_contact">
                        <div class="footer_title">Contact Info</div>
                        <ul class="contact_list p-0">
                            <li><i class="fa fa-phone me-2"></i>+977 9843684582 / 9823455328</li>
                            <li><i class="fa fa-envelope me-2"></i>contact@gmail.com</li>
                        </ul>
                    </div>
                </div>

                <!-- Footer Locations -->
                <div class="col-lg-3 footer_col">
                    <div class="footer_location">
                        <div class="footer_title">Our Locations</div>
                        <ul class="locations_list p-0">
                            <li>
                                <div class="location_title"><i class="fa fa-map-marker me-2"></i>Bakhundol</div>
                                <div class="location_text">Lalitpur, Nepal</div>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Footer Opening Hours -->
                <div class="col-lg-3 footer_col  order-lg-last order-md-last order-xl-last order-xxl-last order-sm-last order-first">
                    <div class="opening_hours">
                        <div class="footer_title"><i class="fa fa-clock-o me-2"></i>Opening Hours</div>
                        <ul class="opening_hours_list p-0">
                            <li class="d-flex flex-row align-items-start justify-content-start">
                                <div>Monday:</div>
                                <div class="ml-auto"> 8:00am - 9:00pm</div>
                            </li>
                            <li class="d-flex flex-row align-items-start justify-content-start">
                                <div>Thuesday:</div>
                                <div class="ml-auto"> 8:00am - 9:00pm</div>
                            </li>
                            <li class="d-flex flex-row align-items-start justify-content-start">
                                <div>Wednesday:</div>
                                <div class="ml-auto"> 8:00am - 9:00pm</div>
                            </li>
                            <li class="d-flex flex-row align-items-start justify-content-start">
                                <div>Thursday:</div>
                                <div class="ml-auto"> 8:00am - 9:00pm</div>
                            </li>
                            <li class="d-flex flex-row align-items-start justify-content-start">
                                <div>Friday:</div>
                                <div class="ml-auto"> 8:00am - 7:00pm</div>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="footer_bar">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div
                        class="footer_bar_content d-flex flex-md-row flex-column align-items-md-center justify-content-center">
                        <div class="copyright">
                            Copyright &copy;
                            <script>document.write(new Date().getFullYear());</script> All rights reserved |
                            Golden Door SPA <i class="fa fa-heart-o" aria-hidden="true"></i> by <a
                                href="https://binaryshastra.com/" target="_blank">binaryshastra</a>
                        </div>
                        <nav class="footer_nav ml-md-auto">
                            <ul class="d-flex flex-row align-items-center justify-content-start">
                                <li><a href="{{route('home')}}">Home</a></li>
                                <li><a href="{{route('about')}}">About us</a></li>
                                <li><a href="{{route('service')}}">Services</a></li>
                                <li><a href="{{route('blog')}}">Blog</a></li>
                                <li><a href="{{route('contact')}}">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>