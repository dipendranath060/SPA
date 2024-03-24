@extends('layouts.master')
@section('title', 'List | Member')
@section('content')
    
        <!-- Breadcrumb -->
        <div class="breadcrumb-area mb-3">
            <div class="container">
                <nav aria-label="breadcrumb" class="p-2 bg-white breadcrumb-main rounded">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Team</li>
                        <li class="breadcrumb-item active" aria-current="page">Member List</li>
                    </ol>
                </nav>
            </div>
        </div>

        <!-- Member List Table -->
        <section class="member-list">
            <div class="container">
                <h2 class="mb-5 section-title border-bottom pb-3 text-center">Member List</h2>
                <div class="row justify-content-center">
                    @if (session('message'))
                        <div class="alert alert-success">{{session('message')}}</div>
                    @endif
                    @if (session('status'))
                        <div class="alert alert-danger">{{session('status')}}</div>
                    @endif
                    <div class="col-lg-10 overflow-auto">
                        <div class="text-end mb-3">
                            <a href="{{route('add-member')}}" class="btn btn-success">+ Add New Member</a>
                        </div>
                        @if($teams->isEmpty())
                            <h4 style="text-align: center">Team Members Not Found...</h4>
                        @else 
                        <table class="w-100 text-center bg-white" id="table-list">
                            <tr class="border-top border-bottom">
                                <th class="py-3 px-1">S.N</th>
                                <th class="py-3 px-1">Name</th>
                                <th class="py-3 px-1">Image</th>
                                <th class="py-3 px-1">Post</th>
                                <th class="py-3 px-1">Description</th>
                                <th class="py-3 px-1">Action</th>
                            </tr>

                            @foreach ($teams as $team)  
                            <tr>
                                <td class="py-3 px-1">{{$loop->iteration}}</td>
                                <td class="py-3 px-1">{{$team->name}}</td>
                                <td>
                                    <img src="{{asset('uploads/members/'.$team->image)}}" width="80px" alt="img">
                                </td>
                                <td class="py-3 px-1">{{$team->post}}</td>
                                <td class="py-3 px-1">{{Str::limit($team->description,35)}}</td>
                                <td class="py-3 px-1">
                                    <a type="button" href="{{url('admin/edit-member/' .$team->id)}}" class="btn btn-success mb-1">Edit</a>
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
                                                <h5 class="modal-title" id="exampleModalLabel">Delete Team Member</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Are you sure you want to delete this team member?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancel</button>
                                                <form id="deleteMemberForm" action="{{ url('admin/delete-member/'.$team->id) }}" method="POST">
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
                        {{$teams->links()}}
                        @endif
                    </div>
                </div>
            </div>
        </section>
@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        $('#deleteMemberForm').on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: $(this).serialize(),
                success: function(response) {
                    window.location.href = "{{ route('members') }}";
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    });
</script>
@endsection