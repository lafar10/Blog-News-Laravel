@extends('admin.admin_app')

@section('title','Admin LR9News Post Manage')

@section('content')

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Posts</h1>
        </div>
        <br>
        <br>
        <div class="container">
            <div align="right">
                <!-- Button trigger modal -->
                    <button type="button" id="search_post_button" class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="mx-3" role="img" viewBox="0 0 24 24"><title>Search</title><circle cx="10.5" cy="10.5" r="7.5"/><path d="M21 21l-5.2-5.2"/>
                        </svg>
                    </button>

                <!-- Button trigger modal add_new_post-->
                    <a  class="btn btn-outline-success" href="{{route('Create.Posts')}}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-plus" viewBox="0 0 16 16">
                            <path d="M8 6.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V11a.5.5 0 0 1-1 0V9.5H6a.5.5 0 0 1 0-1h1.5V7a.5.5 0 0 1 .5-.5z"/>
                            <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h-2z"/>
                        </svg> Add New Post
                    </a>
            </div>
            <br>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Author Name</th>
                        <th>Post Title</th>
                        <th>Post Subtitle</th>
                        <th>Official Img</th>
                        <th>Official Video</th>
                        <th>Big Comment</th>
                        <th>Post Intro</th>
                        <th>Post Show</th>
                        <th>Post Show Img</th>
                        <th>Post Show video</th>
                        <th>Post Conclusion</th>
                        <th>Post Concl Img</th>
                        <th>Post Concl Video</th>
                        <th>Catgory ID</th>
                        <th>Action Map</th>
                        <th>Post Source</th>
                        <th>Created_At</th>
                        <th>Updated_At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <a href="" class="btn btn-outline-secondary">Edit</a>
                            <a href="" class="btn btn-outline-danger">Delete</a>
                        </td>
                </tbody>
            </table>
        </div>



            <!-- Modal -->
            <div class="modal fade" id="search_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Search Post</h5>
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
                            var formData = $('#add_modal_from_id').serialize();

                            $.ajax({
                                type:'post',
                                enctype:'multipart/form-data',
                                url:"{{ route('store.post') }}",
                                data:formData,
                                success:function(data){
                                    alert('ok');
                                },error:function(data){
                                    alert('not ok');
                                }
                            });
                        });
                    });

                    $(document).ready(function(){
                        $('#search_post_button').on('click',function(e){
                            e.preventDefault();
                                $('#search_modal').modal('show');
                        });
                    });
            </script>

@endsection
