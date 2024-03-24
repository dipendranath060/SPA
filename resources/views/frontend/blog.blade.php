@extends('layouts.front-master')
@section('title', 'Golden Door Soft SPA | Blog')
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
            <div class="home_title">Blog</div>
            <div class="home_text">
              <a href="{{route('homes')}}" class="text-white fw-bold">Home</a>
              <span class="mx-2">/</span>
              <span class="active_breadcrumb">Blogs</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Blog -->

<div class="blog">
  <div class="container">
    <div class="row">
      @foreach ($blogs as $blog)
      <div class="col-lg-4  col-md-6 mb-5">
        <div class="px-2">
          <div class="blog_post pb-4">
            <div class="blog_post_image">
              <a href="{{url('blog', ['blog_slug' => $blog->blog_slug])}}">
                <img src="{{ asset('uploads/blogs/'.$blog->image) }}" alt="{{$blog->title}}" class="w-100"/>
              </a>
            </div>
            <div class="px-2">
              <div class="blog_post_title">
                <a href="{{url('blog', ['blog_slug' => $blog->blog_slug])}}">{{$blog->title}}</a>
              </div>
              <div class="blog_post_text">
                <p> @php
                    $plainTextContent = strip_tags($blog->description);
                    $limitedText = substr($plainTextContent, 0, 75);
                    @endphp
                    {{$limitedText}} ....
                </p>
              </div>
              <div class="blog_post_button text-center">
                <div class="button button_1 ml-auto mr-auto">
                  <a href="{{url('blog', ['blog_slug' => $blog->blog_slug])}}">Read more</a>
                  
                </div>
              </div>
            </div>
          </div>
      </div>
      </div>
      @endforeach
    </div>
    {{$blogs->links()}}
    <div class="row page_nav_row">
      <div class="col">
        <div class="page_nav">
        </div>
      </div>
    </div>
  </div>
</div>
@endsection