@extends('layouts.master')
@section('title', 'Add | Blog')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    
<!-- Breadcrumb -->
<div class="breadcrumb-area mb-3">
    <div class="container">
      <nav
        aria-label="breadcrumb"
        class="p-2 bg-white breadcrumb-main rounded">
        <ol class="breadcrumb m-0">
          <li class="breadcrumb-item">
            <a href="{{route('dashboard')}}">Dashboard</a>
          </li>
          <li class="breadcrumb-item" aria-current="page">
            <a href="{{route('blogs')}}">Blog</a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">
            Add Blog
          </li>
        </ol>
      </nav>
    </div>
  </div>

  <!-- Blog Upload Form -->
  <div class="blog-container py-3">
    <div class="container">
      <div class="row mb-3 justify-content-center">
        <div class="col-lg-7">
          <div class="add-form bg-white p-4 rounded">
            <h2 class="mb-5 section-title border-bottom pb-1">
              Add a Blog
            </h2>
            @if ($errors->any())
                <div class="alert alert-danger">
                  @foreach ($errors->all() as $error)
                      <div>{{$error}}</div>
                  @endforeach
                </div>
            @endif
            <form action="{{route('add-blog')}}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="mb-3">
                <label for="title" class="fs-5 mb-2">Title</label>
                <input type="text" name="title" id="title" class="w-100" placeholder="Enter blog title..." required />
              </div>
              <div class="mb-3">
                <label for="title" class="fs-5 mb-2">Meta Title</label>
                <input type="text" name="meta_title" id="title" class="w-100" placeholder="Enter blog meta title..." required />
              </div>
              <div class="mb-3">
                <label for="slug" class="fs-5 mb-2">Slug</label>
                <input type="text" name="blog_slug" id="slug" class="w-100" placeholder="Enter blog slug..." required />
              </div>
              <div class="mb-3">
                <label for="summernote" class="fs-5 mb-2"
                  >Description</label
                >
                <textarea
                  id="summernote"
                  class="bg-white"
                  name="description"
                  placeholder="Enter blog description..."
                ></textarea>
              </div>

              <div class="mb-5">
                <label for="description" class="fs-5 mb-2"
                  >Meta Description</label
                ><br />
                <textarea
                  id="description"
                  name="meta_description"
                  class="w-100"
                  rows="5"
                  placeholder="Enter blog meta description..."
                ></textarea>
              </div>
              <div class="mb-3">
                <label for="blogimg" class="fs-5 mb-2"
                  >Upload blog image</label
                ><br />
                <input
                  type="file"
                  name="image"
                  id="blogimg"
                  class="w-100"
                />
              </div>

              <button class="btn btn-primary mb-1">Create Post</button>
              <button
                class="btn btn-danger mb-1"
                type="reset"
                onclick="reset_content()"
              >
                Reset Content
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

<script>
    $('#summernote').summernote({
        placeholder: 'Enter blog description...',
        tabsize: 2,
        height: 300
    });
    function reset_content() {
        $('#summernote').summernote('reset')
    }
</script>
@endsection