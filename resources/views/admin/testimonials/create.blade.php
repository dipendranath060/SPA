@extends('layouts.master')
@section('title', 'Add | Testimonial')
@section('content')

<!-- Breadcrumb -->
<div class="breadcrumb-area mb-3">
    <div class="container">
        <nav aria-label="breadcrumb" class="p-2 bg-white breadcrumb-main rounded">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item" aria-current="page"><a href="{{route('testimonials')}}">Testimonial</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add Testimonial</li>
            </ol>
        </nav>
    </div>
</div>

<!-- Testimonial Add Form -->
<div class="testimonial-container py-3">
    <div class="container">
        <div class="row mb-3 justify-content-center">
            <div class="col-lg-7">
                <div class="add-form bg-white p-4 rounded">
                    <h2 class="mb-5 section-title border-bottom pb-1">Add a Testimonial</h2>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <div>{{$error}}</div>
                            @endforeach
                        </div>
                    @endif
                    <form action="{{url('admin/add-testimonial')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="fs-5 mb-2">Title</label>
                            <input type="text" name="title" id="title" class="w-100" placeholder="Enter title..." required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="fs-5 mb-2">Description</label><br>
                            <textarea id="description" name="description" class="w-100" rows="5" placeholder="Enter description..."></textarea>
                        </div>

                        <div class="mb-5">
                            <label for="blogimg" class="fs-5 mb-2">Upload testimonial image</label><br>
                            <input type="file" name="image" id="blogimg" class="w-100">
                        </div>

                        <button type="submit" class="btn btn-primary mb-1">Add Testimonial</button>
                        <button class="btn btn-danger mb-1" type="reset" onclick="reset_content()">Reset
                            Content</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>    
@endsection