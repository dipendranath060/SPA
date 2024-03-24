@extends('layouts.master')
@section('title', 'List | Package')
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
              <li class="breadcrumb-item active" aria-current="page">
                Package
              </li>
              <li class="breadcrumb-item active" aria-current="page">
                Package List
              </li>
            </ol>
          </nav>
        </div>
      </div>

      <!-- Package List Table -->
      <section class="designation-list">
        <div class="container">
          <h2 class="mb-5 section-title border-bottom pb-3 text-center">
            Package List
          </h2>
          <div class="row justify-content-center">
            @if (session('message'))
                <div class="alert alert-success">{{session('message')}}</div>
            @endif
            @if (session('status'))
                <div class="alert alert-danger">{{session('status')}}</div>
            @endif
            <div class="col-lg-10 overflow-auto">
              <div class="text-end mb-3">
                <a href="{{route('add-package')}}" class="btn btn-success"
                  >+ Add New Package</a
                >
              </div>
              @if($packages->isEmpty())
                <h4 style="text-align: center">Packages Not Found...</h4>
              @else 
              <table class="w-100 bg-white text-center" id="table-list">
                <tr class="border-top border-bottom">
                  <th class="py-3 px-1">S.N</th>
                  <th class="py-3 px-1">Title</th>
                  <th class="py-3 px-1">Time</th>
                  <th class="py-3 px-1">Price</th>
                  <th class="py-3 px-1">Description</th>
                  <th class="py-3 px-1">Image</th>
                  <th class="py-3 px-1">Action</th>
                </tr>

                @foreach ($packages as $package)
                <tr>
                  <td class="py-3 px-1">{{$loop->iteration}}</td>
                  <td class="py-3 px-1">{{Str::limit($package->title,20)}}</td>
                  <td class="py-3 px-1">{{$package->time}} Min.</td>
                  <td class="py-3 px-1">Rs. {{$package->price}}</td>
                  <td class="py-3 px-1">{{Str::limit($package->description,25)}}</td>
                  <td>
                    <img src="{{asset('uploads/packages/'.$package->image)}}" width="80px" alt="img">
                  </td>
                  <td class="py-3 px-1">
                    <a type="button" href="{{url('admin/edit-package/'.$package->id)}}" class="btn btn-success mb-1">
                      Edit
                    </a>
                    <button type="button" class="btn btn-danger mb-1" data-bs-toggle="modal" data-bs-target="#deleteModal">
                      Delete
                  </button>
                  </td>
                </tr>
                {{-- modal starts --}}
                    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Delete Package</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                  <p>Are you sure you want to delete this Package?</p>
                              </div>
                              <div class="modal-footer">
                                  <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancel</button>
                                  <form id="deletePackageForm" action="{{ url('admin/delete-package/'.$package->id) }}" method="POST">
                                      @csrf
                                      @method('DELETE')
                                      <button type="submit" class="btn btn-danger">Yes, Delete</button>
                                  </form>
                              </div>
                          </div>
                      </div>
                  </div>
                @endforeach
              </table>
              {{$packages->links()}}
              @endif
            </div>
          </div>
        </div>
      </section>
@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        $('#deletePackageForm').on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: $(this).serialize(),
                success: function(response) {
                    window.location.href = "{{ route('blogs') }}";
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    });
</script>
@endsection