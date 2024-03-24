<!-- Header -->
<header class="header trans_400">
    <div class="header_content d-flex flex-row align-items-center justify-content-between trans_400">

        <!-- Logo -->
        <div class="logo">
            <a href="{{route('homes')}}">
                <div class="d-flex align-items-center">
                    <img src="{{ asset('assets/images/logo.png') }}" alt="Logo">
                    <h2 class="mb-0 mt-1">GOLDEN DOOR<br/><span>SOFT SPA & BEAUTY</span></h2>
                </div>
            </a>
        </div>

        <!-- Main Navigation -->
        <nav class="main_nav">
            <ul class="d-flex flex-row align-items-center justify-content-start">
                <li class="{{ request()->is('/') ? 'active' : '' }}"><a href="{{route('homes')}}">Home</a></li>
                <li class="{{ request()->is('about') ? 'active' : '' }}"><a href="{{route('about')}}">About</a></li>
                <li class="{{ request()->is('service') ||request()->is('service/*') ? 'active' : '' }}"><a href="{{route('service')}}">Services</a></li>
                <li class="{{ request()->is('blog') || request()->is('blog/*') ? 'active' : '' }}"><a href="{{route('blog')}}">Blog</a></li>
                <li class="{{ request()->is('contact') ? 'active' : '' }}"><a href="{{route('contact')}}">Contact</a></li>
            </ul>
        </nav>
        <div class="header_extra d-flex flex-row align-items-center justify-content-end ml-auto">

            <!-- Work Hours -->
            <div class="work_hours">Mon - Sat: 8:00am - 9:00pm</div>

            <!-- Header Phone -->
            <div class="header_phone"><a href="tel:+977 9843684582" class="text-white">+977 9843684582</a></div>

            <!-- Header Social -->
            <div class="social header_social">
                <ul class="d-flex flex-row align-items-center justify-content-start">
                    <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                </ul>
            </div>

            <!-- Hamburger -->
            <div class="hamburger"><i class="fa fa-bars" aria-hidden="true"></i></div>
        </div>
    </div>
</header>

<!-- Menu -->
<div class="menu_overlay trans_400"></div>
		<div class="menu trans_400">
			<div class="menu_close_container">
				<div class="menu_close">
					<div></div>
					<div></div>
				</div>
			</div>
			<nav class="menu_nav">
				<ul>
					<li><a href="{{route('homes')}}">Home</a></li>
					<li><a href="{{route('about')}}">About</a></li>
					<li><a href="{{route('service')}}">Services</a></li>
					<li><a href="{{route('blog')}}">Blog</a></li>
					<li><a href="{{route('contact')}}">Contact</a></li>
				</ul>
			</nav>
			<div class="menu_extra">
				<div class="menu_link">Mon - Sat: 8:00am - 9:00pm</div>
				<div class="menu_link"><a href="tel:+977 9843684582" class="text-white">+977 9843684582</a> / <a href="tel:+977 9843684582" class="text-white">+977 9823455328</a></div>
                <button class="button button_1 trans_200 "><a href="{{route('contact')}}" class="px-2">make an appointment</a></button>

			</div>
			<div class="social menu_social">
				<ul class="d-flex flex-row align-items-center justify-content-start">
					<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
					<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
					<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
				</ul>
			</div>
		</div>

		