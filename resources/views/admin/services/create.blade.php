@extends('layouts.master')
@section('title', 'Add | Service')
@section('content')
     <!-- Breadcrumb -->
     <div class="breadcrumb-area mb-3">
        <div class="container">
          <nav
            aria-label="breadcrumb"
            class="p-2 bg-white breadcrumb-main rounded"
          >
            <ol class="breadcrumb m-0">
              <li class="breadcrumb-item">
                <a href="{{route('dashboard')}}">Dashboard</a>
              </li>
              <li class="breadcrumb-item" aria-current="page">
                <a href="{{route('services')}}">Service</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">
                Add Service
              </li>
            </ol>
          </nav>
        </div>
      </div>

      <!-- Service Add Form -->
      <div class="service-container py-3">
        <div class="container">
          <div class="row mb-3 justify-content-center">
            <div class="col-lg-7">
              <div class="add-form bg-white p-4 rounded">
                <h2 class="mb-5 section-title border-bottom pb-1">
                  Add a Service
                </h2>
                @if ($errors->any())
                    <div class="alert alert-danger">
                      @foreach ($errors->all() as $error)
                          <div>{{$error}}</div>
                      @endforeach
                    </div>
                @endif
                <form action="{{route('add-service')}}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="mb-3">
                    <label for="title" class="fs-5 mb-2">Title</label>
                    <input type="text" id="title" name="title" class="w-100" placeholder="Enter title..." required />
                  </div>
                  <div class="mb-3">
                    <label for="title" class="fs-5 mb-2">Slug</label>
                    <input
                      type="text"
                      name="service_slug"
                      id="title"
                      class="w-100"
                      placeholder="Enter title as slug..."
                      required
                    />
                  </div>

                  <div class="mb-5">
                    <label for="description" class="fs-5 mb-2"
                      >Description</label
                    ><br />
                    <textarea
                      id="description"
                      name="description"
                      class="w-100"
                      rows="5"
                      placeholder="Enter description..."
                    ></textarea>
                  </div>
                  <div class="mb-3">
                    <label for="blogimg" class="fs-5 mb-2"
                      >Upload Service image</label
                    ><br />
                    <input
                      type="file"
                      name="image"
                      id="blogimg"
                      class="w-100"
                    />
                  </div>

                  <div class="mb-5">
                    <div class="d-flex align-items-center flex-wrap">
                      <div class="me-5">
                        <label for="title" class="fs-5 mb-2">Price for 60 Min.</label><br>
                          <input type="text" name="price1" placeholder="Enter 60 min price..." id="title" />
                      </div>
                      
                      <div class="me-5">
                        <label for="title" class="fs-5 mb-2">Price for 90 Min.</label><br>
                            <input type="text" name="price2" id="title" placeholder="Enter 90 min price..."/>
                      </div>

                      <div class="me-5">
                        <label for="title" class="fs-5 mb-2">Price for 120 Min.</label><br>
                            <input type="text" name="price3" id="title" placeholder="Enter 120 min price..."/>
                      </div>
                      
                    </div>
                  </div>

                  <button class="btn btn-primary mb-1" type="submit">Add Service</button>
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
@endsection