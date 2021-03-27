@extends('admin.admin_app')

@section('title','Admin LR9News Iconss Manage')

@section('content')

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Icons</h1>
        </div>
        <br>
        <br>
        <div class="container">
            <div align="right">
                <!-- Button trigger modal -->
                    <button type="button" id="search_icons_button" class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="mx-3" role="img" viewBox="0 0 24 24"><title>Search</title><circle cx="10.5" cy="10.5" r="7.5"/><path d="M21 21l-5.2-5.2"/>
                        </svg>
                    </button>

                <!-- Button trigger modal add_new_post-->
                    <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#icons_modal">
                        <span data-feather="shopping-cart"></span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-text-paragraph" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M2 12.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm4-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5z"/>
                        </svg> Add New Icon
                    </button>
            </div>
            <br>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Icon Name</th>
                        <th>Icons</th>
                        <th>Created_At</th>
                        <th>Updated_At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($icons as $icon)
                    <tr>
                        <td>{{$icon->id}}</td>
                        <td>{{$icon->name_icon}}</td>
                        <td>{{$icon->icons}}</td>
                        <td>{{$icon->created_at}}</td>
                        <td>{{$icon->updated_at}}</td>
                        <td>
                            <a href="" class="btn btn-outline-secondary">Edit</a>
                            <a href="" class="btn btn-outline-danger">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


        <!-- Button trigger modal -->


        <!-- Modal -->
            <div class="modal fade" id="icons_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Category Details</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                    <form id="add_modal_from_id" action="{{ route('save.icons')}}" method="POST" enctype="multipart/form-data" >
                        @csrf
                        <div class="modal-body">
                                <div class="row g-2">
                                    <div class="col-md-6">
                                        <label for="">Icon Name</label>
                                        <input type="text" class="form-control" name="name_icon" id="name_icon">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Icons</label>
                                        <input type="file" class="form-control" name="icons" id="icons">
                                    </div>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" id="save_cate" class="btn btn-primary">Save Icon</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>



            <!-- Modal -->
            <div class="modal fade" id="search_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Search Icons</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="search_modal_from_id">
                                <div class="row">
                                    <div class="col">
                                        <input type="search" class="form-control" placeholder="You Looking For Something type here" name="search_data" id="search_data">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-success">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="mx-3" role="img" viewBox="0 0 24 24"><title>Search</title><circle cx="10.5" cy="10.5" r="7.5"/><path d="M21 21l-5.2-5.2"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
@endsection


@section('scripts')

            <script>


                    $(document).ready(function(){
                        $('#search_cate_button').on('click',function(e){
                            e.preventDefault();
                                $('#search_modal').modal('show');
                        });
                    });
            </script>

@endsection
