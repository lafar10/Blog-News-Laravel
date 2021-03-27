@extends('layouts.app')



@section('content')

                <div class="container">

                    <div class="row g-2" >
                        @foreach($sports_a as $sport)
                            <div class="col-sm-6">
                                <a href="{{ route('get.posts.details',$sport->id) }}">
                                    <img src="{{ asset('public/images/'.$sport->big_picture)}}" style="width:500px;height:330px;" class="img-fluid" alt="..." >
                                </a>
                            </div>
                            <div class="col-sm-5" @if (LaravelLocalization::getCurrentLocale() == 'ar')
                                                      style="text-align:right;margin-top:60px;"
                                                  @else
                                                      style="text-align:left;margin-top:60px;"
                                                  @endif >
                                <a href="{{ route('get.posts.details',$sport->id) }}" id="st_age">
                                    <h4>{{$sport->title}}</h4>
                                </a>
                                <h5>{{$sport->subtitle}}</h5>
                                <h6>{{$sport->created_at}}</h6>
                            </div>
                        @endforeach
                    </div>
                </div>
                <br>
                <br>

                    <div class="container">
                        <div class="row g-4">
                            @foreach ($sports_b as $ap)
                                <div class="col-sm" @if (LaravelLocalization::getCurrentLocale() == 'ar')
                                                        style="text-align:right;"
                                                    @else
                                                        style="text-align:left;"
                                                    @endif >
                                    <a href="{{ route('get.posts.details',$ap->id) }}">
                                        <img src="{{ asset('public/images/'.$ap->big_picture)}}" style="width:340px;height:180px;" class="img-fluid" alt="..." >
                                    </a>
                                    <br>
                                    <br>
                                    <a href="{{ route('get.posts.details',$ap->id) }}" id="st_age">
                                        <h4>{{$ap->title}}</h4>
                                    </a>
                                    <h5>{{$ap->subtitle}}</h5>
                                    <h6>{{$ap->created_at}}</h6>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <br>
                    <br>
                <div class="container">
                    @foreach ($posts as $post)
                            <div id="article-a"  class="row g-2">
                                    <br>
                                        <div class="col-sm-4">
                                            <br>
                                            <a href="{{ route('get.posts.details',$post->id) }}" >
                                                <img src="{{ asset('public/images/'.$post->big_picture)}}" alt="..." @if (LaravelLocalization::getCurrentLocale() == 'ar')
                                                                                                                            style="align:right;width:250px;height:140px;"
                                                                                                                    @else
                                                                                                                            style="align:left;width:250px;height:140px;"
                                                                                                                    @endif >
                                            </a>
                                            <br>
                                            <br>
                                        </div>

                                        <div class="col-sm-7" @if (LaravelLocalization::getCurrentLocale() == 'ar')
                                                                   style="text-align:right;"
                                                              @else
                                                                   style="text-align:left;"
                                                              @endif >
                                            <br>
                                            <h6>{{ date('Y-m-d',strtotime($post->created_at))}}</h6>
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

                    </div>


@stop


@section('scripts')

        <script>
                $(document).ready(function(){

                });
        </script>

@stop
