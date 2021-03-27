@extends('layouts.app')



@section('content')


        <div class="container">
                    <div class="container">
                        @foreach ($offs as $of)
                            <div class="row">
                                <div class="col-md-4"@if(LaravelLocalization::getCurrentLocale() == 'en')
                                                        style="text-align: left;margin-top:60px;"
                                                    @else
                                                        style="text-align: right;margin-top:60px;"
                                                    @endif>
                                    <a href="{{ route('get.posts.details',$of->id) }}" id="st_age">
                                        <h3>{{$of->title}}</h3>
                                    </a>
                                        <h5>{{$of->subtitle}}</h5>
                                </div>
                                <div class="col-md-8">
                                    <a href="{{ route('get.posts.details',$of->id) }}">
                                        <img src="{{ asset('public/images/'.$of->big_picture)}}" class="img-fluid" alt="...">
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                <br>
                <br>
                <br>

            <div class="row row-cols-1 row-cols-md-3 g-4">
                @foreach ($posts as $post)
                   <div class="col">
                       <div class="card h-100" @if(LaravelLocalization::getCurrentLocale() == 'en')
                                                    style="text-align: left;"
                                                @else
                                                    style="text-align: right;"
                                                @endif>
                           <a href="{{ route('get.posts.details',$post->id) }}">
                           <img src="{{ asset('public/images/'.$post->big_picture)}}" height="200px" class="card-img-top" alt="...">
                           </a>
                               <div class="card-body">
                                   <a href="{{ route('get.posts.details',$post->id) }}"  id="st_age">
                                       <h5 class="card-title">{{$post->category}}</h5>
                                       <h4 class="card-title">{{$post->title}}</h4>
                                   </a>
                               </div>

                               <div class="card-footer bg-success" >
                                @if(LaravelLocalization::getCurrentLocale() == 'ar')
                                    <small id="date_footer">{{$post->created_at}} : {{__('messages.Last Update')}}
                                    </small>
                                @else
                                    <small id="date_footer">{{__('messages.Last Update')}} :  {{$post->created_at}}
                                    </small>
                                @endif

                               </div>
                       </div>
                   </div>
                @endforeach
            </div>
            <br>
            <br>
            <div class="d-flex justify-content-center">
                {!! $posts->links() !!}
            </div>
            <br>
            <br>
            <br>
            <br>
            <br>
            <div class="row">
                <div class="col-md-8">
                    @if(LaravelLocalization::getCurrentLocale() == 'ar')
                        <h2 class="blog-post-title" align="right" >{{__('messages.The Latest Developments Today')}} <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" style="color:green;" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                            <path d="M7.247 11.14L2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                            </svg>
                        </h2>
                    @else
                        <h2 class="blog-post-title" align="left" ><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" style="color:green;" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                            <path d="M7.247 11.14L2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                            </svg> {{__('messages.The Latest Developments Today')}}
                        </h2>
                    @endif

                        <hr style="color:green;">
                    <br>
                    <br>
                        <div class="container">
                            @foreach ($posts as $post)
                            <div id="article-a"  class="row">
                                    <br>
                                        <div class="col-sm-4">
                                            <br>
                                            <a href="{{ route('get.posts.details',$post->id) }}" >
                                                <img src="{{ asset('public/images/'.$post->big_picture)}}" style="width:200px;height:120px;" alt="...">
                                            </a>
                                            <br>
                                            <br>
                                        </div>

                                        <div class="col-sm-7" @if (LaravelLocalization::getCurrentLocale() == 'ar')
                                                                   style="margin-left:9px;text-align:right;"
                                                              @else
                                                                   style="margin-left:9px;text-align:left;"
                                                              @endif >
                                            <br>
                                            <h6>{{$post->created_at}}</h6>
                                            <a href="{{ route('get.posts.details',$post->id) }}" id="st_age">
                                                <h4>{{$post->title}}</h4>
                                            </a>
                                            <p>{{$post->subtitle}}.</p>
                                        </div>
                                    <br>
                            </div>
                                        <br>

                                @endforeach
                            <div class="d-flex justify-content-center">
                                {!! $posts->links() !!}
                            </div>
                <!-- /.blog-post -->
                            <br>
                            <br>
                            <br>
                            <article class="blog-post">
                                @if(LaravelLocalization::getCurrentLocale() == 'ar')
                                    <h2 class="blog-post-title" align="right" >{{__('messages.News Sports')}} <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" style="color:green;" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                                        <path d="M7.247 11.14L2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                                        </svg>
                                    </h2>
                                @else
                                    <h2 class="blog-post-title" align="left" ><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" style="color:green;" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                                        <path d="M7.247 11.14L2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                                        </svg> {{__('messages.News Sports')}}
                                    </h2>
                                @endif
                                    <hr style="color:green;">
                                <br>
                                <br>
                                    <div class="container">
                                        @foreach ($posts_a as $post)
                                        <div id="article-a"  class="row">
                                                <br>
                                                    <div class="col-sm-4">
                                                        <br>
                                                        <a href="{{ route('get.posts.details',$post->id) }}" >
                                                            <img src="{{ asset('public/images/'.$post->big_picture)}}" style="width:200px;height:120px;" alt="...">
                                                        </a>
                                                        <br>
                                                        <br>
                                                    </div>

                                                    <div class="col-sm-7" @if (LaravelLocalization::getCurrentLocale() == 'ar')
                                                                                style="margin-left:9px;text-align:right;"
                                                                          @else
                                                                                style="margin-left:9px;text-align:left;"
                                                                          @endif >
                                                        <br>
                                                        <h6>{{$post->created_at}}</h6>
                                                        <a href="{{ route('get.posts.details',$post->id) }}" id="st_age"><h4>{{$post->title}}</h4></a>
                                                        <p>{{$post->subtitle}}.</p>
                                                    </div>
                                                <br>
                                        </div>
                                                    <br>
                                            @endforeach

                                    <br>
                                    <br>
                                    <br>
                            </article><!-- /.blog-post -->
                            <br>
                            <article class="blog-post">
                                @if(LaravelLocalization::getCurrentLocale() == 'ar')
                                    <h2 class="blog-post-title" align="right" >{{__('messages.Other Exclusive News')}} <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" style="color:green;" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                                        <path d="M7.247 11.14L2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                                        </svg>
                                    </h2>
                                @else
                                    <h2 class="blog-post-title" align="left" ><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" style="color:green;" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                                        <path d="M7.247 11.14L2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                                        </svg> {{__('messages.Other Exclusive News')}}
                                    </h2>
                                @endif
                                    <hr style="color:green;">
                                <br>
                                <br>
                                    <div class="container">
                                        @foreach ($posts_e as $post)
                                        <div id="article-a"  class="row">
                                                <br>
                                                    <div class="col-sm-4">
                                                        <br>
                                                        <a href="{{ route('get.posts.details',$post->id) }}" >
                                                            <img src="{{ asset('public/images/'.$post->big_picture)}}" style="width:200px;height:120px;" alt="...">
                                                        </a>
                                                        <br>
                                                        <br>
                                                    </div>

                                                    <div class="col-sm-7" @if (LaravelLocalization::getCurrentLocale() == 'ar')
                                                                                    style="margin-left:9px;text-align:right;"
                                                                          @else
                                                                                    style="margin-left:9px;text-align:left;"
                                                                          @endif >
                                                        <br>
                                                        <h6>{{$post->created_at}}</h6>
                                                        <a href="{{ route('get.posts.details',$post->id) }}" id="st_age"><h4>{{$post->title}}</h4></a>
                                                        <p>{{$post->subtitle}}.</p>
                                                    </div>
                                                <br>
                                        </div>
                                                    <br>
                                            @endforeach

                                    <br>
                            </article>
                        </div><!-- /.blog-post -->

                    </div>
                    <br>
                    <br>
                    <div class="col-md-4">
                        @foreach ($posts_s as $post)
                        <a href="{{ route('get.posts.details',$post->id) }}" >
                            <div class="p-4 mb-3" id="stage" >
                                <img src="{{ asset('public/images/'.$post->big_picture)}}" style="width:300px;height:220px;">
                                <br>
                                <br>
                                    <h4 class="fst-italic" id="st_age"@if (LaravelLocalization::getCurrentLocale() == 'ar')
                                                                        style="text-align:right;"
                                                                    @else
                                                                        style="text-align:left;"
                                                                  @endif >{{$post->title}}
                                </h4>
                            </div>
                        </a>
                        @endforeach

                        <br>
                        <br>
                        <br>
                        <div class="p-4" @if (LaravelLocalization::getCurrentLocale() == 'ar')
                                            style="text-align:right;"
                                        @else
                                            style="text-align:left;"
                                        @endif >
                            <h4 class="fst-italic">{{__('messages.Archives')}}</h4>
                                <ol class="list-unstyled mb-0">
                                    <li><a href="#">{{__('messages.January')}} 2021</a></li>
                                    <li><a href="#">{{__('messages.February')}} 2021</a></li>
                                    <li><a href="#">{{__('messages.March')}} 2021</a></li>
                                    <li><a href="#">{{__('messages.April')}} 2021</a></li>
                                    <li><a href="#">{{__('messages.May')}} 2021</a></li>
                                    <li><a href="#">{{__('messages.June')}} 2021</a></li>
                                    <li><a href="#">{{__('messages.July')}} 2021</a></li>
                                    <li><a href="#">{{__('messages.August')}} 2021</a></li>
                                    <li><a href="#">{{__('messages.October')}} 2021</a></li>
                                    <li><a href="#">{{__('messages.September')}} 2021</a></li>
                                    <li><a href="#">{{__('messages.November')}} 2021</a></li>
                                    <li><a href="#">{{__('messages.December')}} 2021</a></li>
                                </ol>
                        </div>
                        <br>
                        <br>
                        <div class="p-4" @if (LaravelLocalization::getCurrentLocale() == 'ar')
                                            style="text-align:right;"
                                        @else
                                            style="text-align:left;"
                                        @endif >
                            <h4 class="fst-italic">{{__('messages.ElseWhere')}}</h4>
                                <ol class="list-unstyled">
                                    <li><a href="#">GitHub</a></li>
                                    <li><a href="#">Twitter</a></li>
                                    <li><a href="#">Facebook</a></li>
                                </ol>
                        </div>
                    </div>
                </div>
            </div>

            <br>
            <br>
            <br>
            <br>
@endsection
