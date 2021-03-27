@extends('admin.admin_app')

@section('title','Admin LR9News Categories Manage')

@section('content')

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Categories</h1>
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
                    <button type="button" id="search_cate_button" class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="mx-3" role="img" viewBox="0 0 24 24"><title>Search</title><circle cx="10.5" cy="10.5" r="7.5"/><path d="M21 21l-5.2-5.2"/>
                        </svg>
                    </button>

                <!-- Button trigger modal add_new_post-->
                    <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#cate_modal">
                        <span data-feather="shopping-cart"></span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-text-paragraph" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M2 12.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm4-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5z"/>
                        </svg> Add New Category
                    </button>
            </div>
            <br>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Category Name en</th>
                        <th>Category Name ar</th>
                        <th>Created_At</th>
                        <th>Updated_At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->category_name_en}}</td>
                        <td>{{$category->category_name_ar}}</td>
                        <td>{{$category->created_at}}</td>
                        <td>{{$category->updated_at}}</td>
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
            <div class="modal fade" id="cate_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Category Details</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                    <form id="add_modal_from_id">
                        @csrf
                        <div class="modal-body">
                                <div class="row g-2">
                                    <div class="col-md-6">
                                        <label for="">Category Name en</label>
                                        <input type="text" class="form-control" name="category_name_en" id="category_name_en">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Category Name ar</label>
                                        <input type="text" class="form-control" name="category_name_ar" id="category_name_ar">
                                    </div>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" id="save_cate" class="btn btn-primary">Save Category</button>
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
                            <h5 class="modal-title" id="exampleModalLabel">Search Categories</h5>
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
                                $('#add_modal_from_id').on('submit',function(e){
                                    e.preventDefault();
                                        $.ajax({
                                                type : "post",
                                                url : "{{ route('store.category') }}",
                                                data : $('#add_modal_from_id').serialize(),
                                                success:function(data){
                                                        alert('ok');
                                                },
                                                error:function(data){
                                                        alert('not ok');
                                                }
                                         });
                                });         
                        });
                    
                    $(document).ready(function(){
                        $('#search_cate_button').on('click',function(e){
                            e.preventDefault();
                                $('#search_modal').modal('show');
                        });
                    });
            </script>

@endsection
