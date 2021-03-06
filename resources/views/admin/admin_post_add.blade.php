@extends('admin.admin_app')

@section('title','Admin LR9News Add Post')

@section('content')

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Add Post</h1>
        </div>
            <div class="container">
                <form action="{{route('store.post')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="row g-2">
                            <div class="col-md-6">
                                <label for="">Author Name</label>
                                <input type="text" class="form-control" name="author_name" id="author_name">
                            </div>
                            <div class="col-md-6" align="right">
                                <label >اسم المؤلف</label>
                                <input type="text" class="form-control" name="author_name_ar" id="author_name_ar">
                            </div>
                            <div class="col-md-6">
                                <label for="">Post title</label>
                                <input type="text" class="form-control" name="post_title" id="post_title">
                            </div>
                            <div class="col-md-6" align="right">
                                <label for="" id="arab_title">عنوان المشاركة الكبير</label>
                                <input type="text" class="form-control" name="post_title_ar" id="post_title_ar">
                            </div>
                            <div class="col-md-6">
                                <label for="">Post Subtitle</label>
                                <input type="text" class="form-control" name="post_subtitle" id="post_subtitle">
                            </div>
                            <div class="col-md-6"align="right" >
                                <label for="" >عنوان المشاركة الصغير</label>
                                <input type="text" class="form-control" name="post_subtitle_ar" id="post_subtitle_ar">
                            </div>
                            <div class="col-md-6">
                                <label for="">Post Action Map</label>
                                <input type="text" class="form-control" name="action_place" id="action_place">
                            </div>
                            <div class="col-md-6" align="right">
                                <label for="" >اسم خريطة العمل</label>
                                <input type="text" class="form-control" name="action_place_ar" id="action_place_ar">
                            </div>
                            <div class="col-md-6">
                                <label for="" align="right">Source Of Post</label>
                                <input type="text" class="form-control" name="source_of_post" id="source_of_post">
                            </div>
                            <div class="col-md-6" align="right">
                                <label for="" >المصدر</label>
                                <input type="text" class="form-control" name="source_of_post_ar" id="source_of_post_ar">
                            </div>
                            <div class="col-md-6">
                                <label for="">Post Category ID</label>
                                <input type="text" class="form-control" name="category_id" id="category_id">
                            </div>
                            <div class="col-md-6">
                                <label for="">Post Big Pic</label>
                                <input type="file" class="form-control" name="big_picture" id="big_picture">
                            </div>
                            <div class="col-md-12">
                                <label for="">Post Big Video</label>
                                <input type="file" class="form-control" name="big_video" id="big_video">
                            </div>
                            <div class="col-md-6">
                                <label for="">Big File title</label>
                                <input type="text" class="form-control" name="big_title" id="big_title">
                            </div>
                            <div class="col-md-6" align="right">
                                <label for="" >عنوان الصورة</label>
                                <input type="text" class="form-control" name="big_title_ar" id="big_title_ar">
                            </div>
                            <div class="col-md-12">
                                <label for="">Post Content Intro</label>
                                <textarea  class="form-control" rows="3" name="content_intro" id="content_intro"></textarea>
                            </div>
                            <div class="col-md-12">
                                <label for="">Post Content Show</label>
                                <textarea  class="form-control" rows="6" name="content_show" id="content_show"></textarea>
                            </div>
                            <div class="col-md-12" align="right">
                                <label for="" >مقدمة عن المحتوى</label>
                                <textarea  class="form-control" style="text-align: right" rows="3" name="content_intro_ar" id="content_intro_ar"></textarea>
                            </div>
                            <div class="col-md-12" align="right">
                                <label for="" >عرض المحتوى</label>
                                <textarea  class="form-control" rows="6" name="content_show_ar" id="content_show_ar"></textarea>
                            </div>
                            <div class="col-md-6">
                                <label for="">Post Content Show Pic</label>
                                <input type="file" class="form-control" name="content_show_picture" id="content_show_picture">
                            </div>
                            <div class="col-md-6">
                                <label for="">Post Content Show Vid</label>
                                <input type="file" class="form-control" name="content_show_video" id="content_show_video">
                            </div>
                            <div class="col-md-12">
                                <label for="">Post Content Conclusion</label>
                                <textarea class="form-control" rows="3" name="content_conclusion" id="content_conclusion"></textarea>
                            </div>
                            <div class="col-md-12" align="right">
                                <label >خاتمة المحتوى</label>
                                <textarea class="form-control" rows="3" name="content_conclusion_ar" id="content_conclusion_ar"></textarea>
                            </div>
                            <div class="col-md-6">
                                <label for="">Post Content Conclusion Pic</label>
                                <input type="file" class="form-control" name="content_conclusion_picture" id="content_conclusion_picture">
                            </div>

                            <div class="col-md-6">
                                <label for="">Post Content Conclusion Vid</label>
                                <input type="file" class="form-control" name="content_conclusion_video" id="content_conclusion_video">
                            </div>
                        </div>
                        <br>
                    <div  align="center">
                        <a href="{{route('Posts')}}" class="btn btn-outline-danger" style="width:150px;" ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                          </svg> Cancel</a>&nbsp;
                        <button type="submit" class="btn btn-outline-success" style="width:150px;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-dotted" viewBox="0 0 16 16">
                            <path d="M8 0c-.176 0-.35.006-.523.017l.064.998a7.117 7.117 0 0 1 .918 0l.064-.998A8.113 8.113 0 0 0 8 0zM6.44.152c-.346.069-.684.16-1.012.27l.321.948c.287-.098.582-.177.884-.237L6.44.153zm4.132.271a7.946 7.946 0 0 0-1.011-.27l-.194.98c.302.06.597.14.884.237l.321-.947zm1.873.925a8 8 0 0 0-.906-.524l-.443.896c.275.136.54.29.793.459l.556-.831zM4.46.824c-.314.155-.616.33-.905.524l.556.83a7.07 7.07 0 0 1 .793-.458L4.46.824zM2.725 1.985c-.262.23-.51.478-.74.74l.752.66c.202-.23.418-.446.648-.648l-.66-.752zm11.29.74a8.058 8.058 0 0 0-.74-.74l-.66.752c.23.202.447.418.648.648l.752-.66zm1.161 1.735a7.98 7.98 0 0 0-.524-.905l-.83.556c.169.253.322.518.458.793l.896-.443zM1.348 3.555c-.194.289-.37.591-.524.906l.896.443c.136-.275.29-.54.459-.793l-.831-.556zM.423 5.428a7.945 7.945 0 0 0-.27 1.011l.98.194c.06-.302.14-.597.237-.884l-.947-.321zM15.848 6.44a7.943 7.943 0 0 0-.27-1.012l-.948.321c.098.287.177.582.237.884l.98-.194zM.017 7.477a8.113 8.113 0 0 0 0 1.046l.998-.064a7.117 7.117 0 0 1 0-.918l-.998-.064zM16 8a8.1 8.1 0 0 0-.017-.523l-.998.064a7.11 7.11 0 0 1 0 .918l.998.064A8.1 8.1 0 0 0 16 8zM.152 9.56c.069.346.16.684.27 1.012l.948-.321a6.944 6.944 0 0 1-.237-.884l-.98.194zm15.425 1.012c.112-.328.202-.666.27-1.011l-.98-.194c-.06.302-.14.597-.237.884l.947.321zM.824 11.54a8 8 0 0 0 .524.905l.83-.556a6.999 6.999 0 0 1-.458-.793l-.896.443zm13.828.905c.194-.289.37-.591.524-.906l-.896-.443c-.136.275-.29.54-.459.793l.831.556zm-12.667.83c.23.262.478.51.74.74l.66-.752a7.047 7.047 0 0 1-.648-.648l-.752.66zm11.29.74c.262-.23.51-.478.74-.74l-.752-.66c-.201.23-.418.447-.648.648l.66.752zm-1.735 1.161c.314-.155.616-.33.905-.524l-.556-.83a7.07 7.07 0 0 1-.793.458l.443.896zm-7.985-.524c.289.194.591.37.906.524l.443-.896a6.998 6.998 0 0 1-.793-.459l-.556.831zm1.873.925c.328.112.666.202 1.011.27l.194-.98a6.953 6.953 0 0 1-.884-.237l-.321.947zm4.132.271a7.944 7.944 0 0 0 1.012-.27l-.321-.948a6.954 6.954 0 0 1-.884.237l.194.98zm-2.083.135a8.1 8.1 0 0 0 1.046 0l-.064-.998a7.11 7.11 0 0 1-.918 0l-.064.998zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
                          </svg> Save Post</button>
                    </div>
                </form>
            </div>
        </div>
        <br>
        <br>



@stop
