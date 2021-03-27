@extends('layouts.app')



@section('content')


            <div class="container">

                    @if(LaravelLocalization::getCurrentLocale() == 'ar')

                        <div align="right" class="row">
                            <div class="col-2">

                            </div>
                            <div class="col-1">

                            </div>
                            <div class="col-9">
                                <h5 id="sis">{{$posts->category}} | {{$posts->map}}</h5>
                                <br>
                                <h1><strong>{{$posts->title}}</strong></h1>
                                <br>
                                <h3>{{$posts->subtitle}}</h3>
                                <br>

                            @if($posts->big_picture != "")
                                <img src="{{ asset('public/images/'.$posts->big_picture)}}" class="img-fluid" alt="...">
                                <br>
                                <br>
                            @endif

                            @if($posts->big_video != "")

                                <div class="embed-responsive embed-responsive-21by9">
                                    <video controls="true" class="embed-responsive-item">
                                    <source src="{{ url('public/videos/'.$posts->big_video)}}" type="video/mp4" />
                                    </video>
                                </div>
                                <br>
                            @endif

                                <div class="row" align="right">
                                    <div class="col-5">
                                        <h6 align="left">(GMT)  {{$posts->created_at}} </h6>
                                    </div>
                                    <div class="col-7">
                                        <h6 >{{$posts->big_title}}</h6>
                                    </div>
                                </div>
                                <br>
                                <br>
                                <p>
                                    {{$posts->intro}}
                                </p>
                                <hr>
                                <br>
                                <p>
                                    {{$posts->show}}
                                </p>
                                <br>
                                <br>
                            @if($posts->content_show_picture != "")
                                <img src="{{ asset('public/images/'.$posts->content_show_picture)}}" class="img-fluid" alt="...">
                                <br>
                            @endif
                                <br>
                                <br>
                            @if($posts->content_show_video != "")
                                <div class="embed-responsive embed-responsive-21by9">
                                    <video controls="true" class="embed-responsive-item">
                                    <source src="{{ url('public/videos/'.$posts->content_show_video)}}" type="video/mp4" />
                                    </video>
                                </div>
                                <br>
                            @endif
                                <br>
                                <hr>
                                <br>
                                <p>
                                    {{$posts->conclusion}}
                                </p>
                                <br>
                                <br>
                             @if($posts->content_conclusion_picture != "")
                                <img src="{{ asset('public/images/'.$posts->big_picture)}}" class="img-fluid" alt="...">
                            @endif
                                <br>
                                <br>
                            @if($posts->content_conclusion_video != "")
                                <div class="embed-responsive embed-responsive-21by9">
                                    <video controls="true" class="embed-responsive-item">
                                    <source src="{{ url('public/videos/'.$posts->content_conclusion_video)}}" type="video/mp4" />
                                    </video>
                                </div>
                                <br>
                            @endif
                                <br>
                                <br>
                                <h5>{{__('messages.Source')}} : {{$posts->source}} &nbsp;&nbsp;  |  &nbsp;&nbsp;  {{__('messages.Author')}} : {{$posts->author}}</h5>
                                <br>
                                <svg xmlns="http://www.w3.org/2000/svg" style="color:green;" width="20" height="20" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                    <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                    <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                  </svg> ({{$posts->views}})
                                <br>
                                <hr style="color:green;">
                                <br>
                                <h2>{{__('messages.Close To The News')}}
                                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" style="color:green;" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                                        <path d="M7.247 11.14L2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                                        </svg>
                                </h2>
                                <br>
                            @foreach(App\Post::select('id','post_title_'.LaravelLocalization::getCurrentLocale().' as title','post_subtitle_'.LaravelLocalization::getCurrentLocale().' as subtitle','big_picture')->where('category_name_' . LaravelLocalization::getCurrentLocale(),$posts->category)->inRandomOrder()->limit(5)->get(); as $post)
                                <div  class="row">
                                    <div class="col-5">
                                        <a href="{{ route('get.posts.details',$post->id) }}"  id="st_age">
                                            <img src="{{ asset('public/images/'.$post->big_picture)}}"  class="card-img-top" alt="...">
                                        </a>
                                    </div>
                                    <div class="col-7" @if (LaravelLocalization::getCurrentLocale() == 'ar')
                                                                    style="text-align:right;"
                                                        @else
                                                                    style="text-align:left;"
                                                        @endif >
                                        <a href="{{ route('get.posts.details',$post->id) }}"  id="st_age">
                                        <h2 class="card-title">{{$post->title}}</h2>
                                        </a>
                                        <h5 class="card-text">{{$post->subtitle}}.</h5>
                                    </div>
                                </div>
                                <br>
                            @endforeach
                                <br>
                                <hr style="color:green;">
                                <br>
                                <h2>{{__('messages.Other News')}}
                                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" style="color:green;" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                                        <path d="M7.247 11.14L2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                                        </svg>
                                </h2>
                                <br>
                                @foreach(App\Post::select('id','post_title_'.LaravelLocalization::getCurrentLocale().' as title','post_subtitle_'.LaravelLocalization::getCurrentLocale().' as subtitle','big_picture')->inRandomOrder()->limit(5)->get(); as $post)
                                <div class="row">
                                    <div class="col-5">
                                        <a href="{{ route('get.posts.details',$post->id) }}"  id="st_age">
                                            <img src="{{ asset('public/images/'.$post->big_picture)}}"  class="card-img-top" alt="...">
                                        </a>
                                    </div>
                                    <div class="col-7" @if (LaravelLocalization::getCurrentLocale() == 'ar')
                                                                    style="text-align:right;"
                                                        @else
                                                                    style="text-align:left;"
                                                        @endif >
                                        <a href="{{ route('get.posts.details',$post->id) }}"  id="st_age">
                                            <h2 class="card-title">{{$post->title}}</h2>
                                        </a>
                                        <h5 class="card-text">{{$post->subtitle}}.</h5>
                                    </div>
                                </div>
                                    <br>
                            @endforeach
                        </div>
                    </div>


                        @elseif(LaravelLocalization::getCurrentLocale() == 'en')


                        <div class="row">
                            <div class="col-9">
                                <h5 id="sis">{{$posts->category}} | {{$posts->map}}</h5>
                                <br>
                                <h1><strong>{{$posts->title}}</strong></h1>
                                <br>
                                <h3>{{$posts->subtitle}}</h3>
                                <br>

                            @if($posts->big_picture != "")
                                <img src="{{ asset('public/images/'.$posts->big_picture)}}" class="img-fluid" alt="...">
                                <br>
                                <br>
                            @endif

                            @if($posts->big_video != "")
                                <div class="embed-responsive embed-responsive-21by9">
                                    <video controls="true" class="embed-responsive-item">
                                    <source src="{{ url('public/videos/'.$posts->big_video)}}" type="video/mp4" />
                                    </video>
                                </div>
                                <br>
                            @endif
                                <br>
                                <div class="row" align="left">

                                    <div class="col-7">
                                        <h6 >{{$posts->big_title}}</h6>
                                    </div>
                                    <div class="col-5">
                                        <h6 align="left">(GMT)  {{$posts->created_at}} </h6>
                                    </div>

                                </div>
                                <br>
                                <br>
                                <p>
                                    {{$posts->intro}}
                                </p>
                                <hr>
                                <br>
                                <p>
                                    {{$posts->show}}
                                </p>
                                <br>
                                <br>
                            @if($posts->content_show_picture != "")
                                <img src="{{ asset('public/images/'.$posts->big_picture)}}" class="img-fluid" alt="...">
                            @endif
                                <br>
                                <br>
                            @if($posts->content_show_video != "")
                                <div class="embed-responsive embed-responsive-21by9">
                                    <video controls="true" class="embed-responsive-item">
                                    <source src="{{ url('public/videos/'.$posts->content_show_video)}}" type="video/mp4" />
                                    </video>
                                </div>
                                <br>
                            @endif
                                <br>
                                <hr>
                                <br>
                                <p>
                                    {{$posts->conclusion}}
                                </p>
                                <br>
                                <br>
                             @if($posts->content_conclusion_picture != "")
                                <img src="{{ asset('public/images/'.$posts->big_picture)}}" class="img-fluid" alt="...">
                            @endif
                                <br>
                                <br>
                            @if($posts->content_conclusion_video != "")
                                <div class="embed-responsive embed-responsive-21by9">
                                    <video controls="true" class="embed-responsive-item">
                                    <source src="{{ url('public/videos/'.$posts->content_conclusion_video)}}" type="video/mp4" />
                                    </video>
                                </div>
                                <br>
                            @endif
                                <br>
                                <br>
                                <h5>{{__('messages.Source')}} : {{$posts->source}} &nbsp;&nbsp;  |  &nbsp;&nbsp;  {{__('messages.Author')}} : {{$posts->author}}</h5>
                                <svg xmlns="http://www.w3.org/2000/svg" style="color:green;" width="20" height="20" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                    <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                    <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                  </svg> ({{$posts->views}})
                                <br>
                                <hr style="color:green;">
                                <br>
                                <h2>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" style="color:green;" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                                        <path d="M7.247 11.14L2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                                        </svg>
                                {{__('messages.Close To The News')}}</h2>
                                <br>
                            @foreach(App\Post::select('id','post_title_'.LaravelLocalization::getCurrentLocale().' as title','post_subtitle_'.LaravelLocalization::getCurrentLocale().' as subtitle','big_picture')->where('category_name_' . LaravelLocalization::getCurrentLocale(),$posts->category)->inRandomOrder()->limit(5)->get(); as $post)
                                <div  class="row">
                                    <div class="col-5">
                                        <a href="{{ route('get.posts.details',$post->id) }}"  id="st_age">
                                            <img src="{{ asset('public/images/'.$post->big_picture)}}"  class="card-img-top" alt="...">
                                        </a>
                                    </div>
                                    <div class="col-7" @if (LaravelLocalization::getCurrentLocale() == 'ar')
                                                                    style="text-align:right;"
                                                        @else
                                                                    style="text-align:left;"
                                                        @endif >
                                        <a href="{{ route('get.posts.details',$post->id) }}"  id="st_age">
                                        <h2 class="card-title">{{$post->title}}</h2>
                                        </a>
                                        <h5 class="card-text">{{$post->subtitle}}.</h5>
                                    </div>
                                </div>
                                <br>
                            @endforeach
                                <br>
                                <hr style="color:green;">
                                <br>
                                <h2>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" style="color:green;" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                                        <path d="M7.247 11.14L2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                                        </svg>
                                    {{__('messages.Other News')}}
                                </h2>
                                <br>
                            @foreach(App\Post::select('id','post_title_'.LaravelLocalization::getCurrentLocale().' as title','post_subtitle_'.LaravelLocalization::getCurrentLocale().' as subtitle','big_picture')->inRandomOrder()->limit(2)->get(); as $post)
                                <div  class="row">
                                    <div class="col-4">
                                        <a href="{{ route('get.posts.details',$post->id) }}"  id="st_age">
                                            <img src="{{ asset('public/images/'.$post->big_picture)}}"  class="card-img-top" alt="...">
                                        </a>
                                    </div>
                                    <div class="col-8" @if (LaravelLocalization::getCurrentLocale() == 'ar')
                                                                    style="text-align:right;"
                                                        @else
                                                                    style="text-align:left;"
                                                        @endif >
                                        <a href="{{ route('get.posts.details',$post->id) }}"  id="st_age">
                                            <h2 class="card-title">{{$post->title}}</h2>
                                        </a>
                                        <h5 class="card-text">{{$post->subtitle}}.</h5>
                                    </div>
                                </div>
                                    <br>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-2">

                    </div>
                    <div class="col-1">

                    </div>
                    @endif

            </div>




@stop
