@extends('layouts.front-master')
@section('title', $blogs->meta_title)
@section('meta_description', $blogs->meta_description)
@section('image', asset('uploads/blogs/'.$blogs->image))
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
                <div class="home_title">Blog</div>
                <div class="home_text">
                  <a href="{{route('homes')}}" class="text-white fw-bold">Home</a>
                  <span class="mx-2">/</span>
                  <a href="{{route('blog')}}" class="text-white fw-bold">Blog</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Blog Single -->

    <div class="blog_details py-5 bg-gray">
      <div class="container">
        <div class="row services_row justify-content-center m-0">
          <!-- Service Main-->
          <div class="col-lg-8 col-md-8 service_col bg-white py-3 rounded">
            <div class="blog_main">
              <div class="blog_detail_img mb-4 rounded">
                <img src="{{ asset('uploads/blogs/'.$blogs->image) }}" class="w-100 rounded" alt="" />
              </div>
              <div class="blog_body px-4 pb-3">
                <h4 class="fs-2">{!!$blogs->title!!}</h4>
                <div class="blog_text">
                  <p class="mb-4">
                    {!!$blogs->description!!}
                  </p>
                </div>
              </div>
            </div>
          </div>

          <!-- Blog sidebar-->
          <div class="col-lg-4 col-md-4 mb-5 bg-white p-4">
            <div class="blog_sidebar">
              <h4 class="mb-4">Recent Blogs</h4>
              @foreach ($latestBlog as $lat)
              @if ($loop->index < 4)
              <div class="media border-bottom py-3">
                <div class="d-flex align-items-start">
                  <div class="flex-shrink-0">
                    <img
                      loading="lazy"
                      width="64"
                      height="64"
                      src="{{ asset('uploads/blogs/'.$lat->image) }}"
                      alt="img"
                    />
                  </div>
                  <div class="flex-grow-1 ms-3">
                    <h6>
                      <a href="{{url('blog', ['blog_slug' => $lat->blog_slug])}}" class="text-black fs-6"
                        >{{$lat->title}}</a
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

@endsection