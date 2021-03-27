@extends('admin.admin_app')

@section('title','Admin LR9News Users Manage')

@section('content')

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Users</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group me-2">
                        <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                        <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
                    </div>
                    <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                    <span data-feather="calendar"></span>
                        This week
                    </button>
                </div>
        </div>
        <br>
        <br>
        <div class="container">
            <div align="right">
                <!-- Button trigger modal -->
                    <button type="button" id="search_users_button" class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="mx-3" role="img" viewBox="0 0 24 24"><title>Search</title><circle cx="10.5" cy="10.5" r="7.5"/><path d="M21 21l-5.2-5.2"/>
                        </svg>
                    </button>

                <!-- Button trigger modal add_new_post-->
                    <button type="button" id="add_new_user_button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <span data-feather="users"></span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
                            <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z"/>
                        </svg> Add New User
                    </button>
            </div>
            <br>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>User Name</th>
                        <th>Email</th>
                        <th>Email Verify</th>
                        <th>Password</th>
                        <th>remember_token</th>
                        <th>Created_At</th>
                        <th>Updated_At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->email_verified_at}}</td>
                        <td>{{$user->password}}</td>
                        <td>{{$user->remember_token}}</td>
                        <td>{{$user->created_at}}</td>
                        <td>{{$user->updated_at}}</td>
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
            <div class="modal fade" id="user_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Category Details</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="add_modal_from_id">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="">Full Name</label>
                                        <input type="text" class="form-control" name="name" id="name">
                                    </div>
                                    <div class="col-md-12">
                                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1" name="email" id="email" aria-describedby="emailHelp">
                                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="">Password</label>
                                        <input type="password" class="form-control" name="password" id="password">
                                    </div>
                                </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save User</button>
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
                            <h5 class="modal-title" id="exampleModalLabel">Search Users</h5>
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
                        $('#add_new_user_button').on('click',function(e){
                            e.preventDefault();
                                $('#user_modal').modal('show');


                        });
                    });

                    $(document).ready(function(){
                        $('#search_users_button').on('click',function(e){
                            e.preventDefault();
                                $('#search_modal').modal('show');
                        });
                    });
            </script>

@endsection
