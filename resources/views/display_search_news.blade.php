@extends('layouts.app')

@section('content')


            <div class="container">
                @if($news->count() > 0)
                    @foreach ($news as $new)
                            <div id="article-a"  class="row g-2">
                                    <br>
                                        <div class="col-sm-4">
                                            <br>
                                            <a href="{{ route('get.posts.details',$new->id) }}" >
                                                <img src="{{ asset('public/images/'.$new->big_picture)}}" alt="..." @if (LaravelLocalization::getCurrentLocale() == 'ar')
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
                                            <h6>{{$new->created_at}}</h6>
                                            <a href="{{ route('get.posts.details',$new->id) }}" id="st_age">
                                                <h4>{{$new->title}}</h4>
                                            </a>
                                            <p>{{$new->subtitle}}.</p>
                                        </div>
                                    <br>
                            </div>
                            <br>
                        @endforeach
                @else
                        <div class="container">
                            <h6 class="display-5" align="center">
                                {{__('messages.Nothing Found')}}
                            </h6>
                        </div>
                @endif
                </div>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>


@stop
