@extends('layouts.front-master')
@section('title', $services->title)
@section('meta_description', $services->description)
@section('image', asset('uploads/services/'.$services->image))
@section('content')
    
<!-- Home -->
<div
       class="home d-flex flex-column align-items-start justify-content-end" >
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
                   <a href="{{route('service')}}" class="text-white fw-bold"
                     >Service</a>
                 </div>
               </div>
             </div>
           </div>
         </div>
       </div>
     </div>

     <!-- Services -->

     <div class="service_details">
       <div class="container">
         <div class="bg-white py-4 px-2">
           <div class="row services_row justify-content-center m-0">
             <!-- Service Main-->
             <div class="col-lg-8 col-md-8 service_col">
               <div class="service_main">
                 <div class="service_detail_img mb-4 rounded">
                   <img
                     src="{{ asset('uploads/services/'.$services->image) }}"
                     class="w-100 rounded"
                     alt=""
                   />
                 </div>
                 <div class="service_body px-4 pb-3">
                   <h4 class="fs-2">{!!$services->title!!}</h4>
                   <div class="service_text">
                     <p class="mb-4">
                       {!!$services->description!!}
                     </p>
                     <div class="service_price">
                       <div class="row">
                         <div class="d-flex flex-column col-lg-3 gap-2">
                           <span class="service_time">60 min</span>
                           <h4 class="service_price">Rs. {!!$services->price1!!}</h4>
                         </div>
                         <div class="d-flex flex-column col-lg-3 gap-2">
                           <span class="service_time">90 min</span>
                           <h4 class="service_price">Rs. {!!$services->price2!!}</h4>
                         </div>
                         <div class="d-flex flex-column col-lg-3 gap-2">
                           <span class="service_time">120 min</span>
                           <h4 class="service_price">Rs. {!!$services->price3!!}</h4>
                         </div>
                       </div>
                     </div>
                   </div>
                 </div>
               </div>
             </div>

             <!-- Service sidebar-->
             <div class="col-lg-4 col-md-4 mb-5">
               <div class="service_sidebar p-2">
                 <h4 class="mb-4">Other Services</h4>
                 @foreach ($otherServices as $sv)
                 @if ($loop->index < 4)
                 <div class="media border-bottom py-3">
                   <div class="d-flex align-items-center">
                     <div class="flex-shrink-0">
                       <img
                         loading="lazy"
                         width="64"
                         height="64"
                         src="{{ asset('uploads/services/'.$sv->image) }}"
                         alt="img"
                       />
                     </div>
                     <div class="flex-grow-1 ms-3">
                       <h6>
                         <a href="{{url('service', ['service_slug' => $sv->service_slug])}}" class="text-black fs-6"
                           >{{$sv->title}}</a
                         >
                       </h6>
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
@endsection