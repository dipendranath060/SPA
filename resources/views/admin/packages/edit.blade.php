@extends('layouts.master')
@section('title', 'Edit | Package')
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
                <a href="{{route('packages')}}">Package</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">
                Edit Package
              </li>
            </ol>
          </nav>
        </div>
      </div>

      <!-- package Add Form -->
      <div class="designation-container py-3">
        <div class="container">
          <div class="row mb-3 justify-content-center">
            <div class="col-lg-7">
              <div class="add-form bg-white p-4 rounded">
                <h2 class="mb-5 section-title border-bottom pb-1">
                  Edit a Package
                </h2>
                @if ($errors->any())
                <div class="alert alert-danger">
                  @foreach ($errors->all() as $error)
                      <div>{{$error}}</div>
                  @endforeach
                </div>   
                @endif
                <form action="{{url('admin/update-package/'.$package->id)}}" method="POST" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                  <div class="mb-5">
                    <label for="title" class="fs-5 mb-2">Title</label>
                    <input type="text" value="{{$package->title}}" name="title" id="title" class="w-100" required />
                  </div>
                  
                  <div class="mb-5">
                    <label for="title" class="fs-5 mb-2">Time (Min.)</label>
                    <input type="text" value="{{$package->time}}" name="time" id="title" class="w-100"  />
                  </div>
                  
                  <div class="mb-5">
                    <label for="title" class="fs-5 mb-2">Price (Rs.)</label>
                    <input type="text" value="{{$package->price}}" name="price" id="title" class="w-100" required />
                  </div>

                  <div class="mb-3">
                    <label for="description" class="fs-5 mb-2"
                      >Description</label
                    ><br />
                    <textarea
                      id="description"
                      name="description"
                      class="w-100"
                      rows="5"
                    >{{$package->description}}</textarea>
                  </div>
                  <div class="mb-5">
                    <label for="blogimg" class="fs-5 mb-2"
                      >Upload blog image</label
                    ><br />
                    <input
                      type="file"
                      name="image"
                      id="blogimg"
                      class="w-100"
                      value="{{$package->image}}"
                    ></input><br><br>
                    <img src="{{asset('uploads/packages/'.$package->image)}}" width="100px" alt="existing image">
                  </div>
                    
                  <button type="submit" class="btn btn-primary mb-1">Update Package</button>
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