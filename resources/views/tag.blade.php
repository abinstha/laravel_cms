@extends('layouts.frontend')

@section('content')
    <!-- Stunning Header -->

    <div class="stunning-header stunning-header-bg-lightviolet">
        <div class="stunning-header-content">
            <h1 class="stunning-header-title">Tag: {{$tag->tag}}</h1>
        </div>
    </div>

    <!-- End Stunning Header -->

    <!-- Tag Posts -->


    <div class="container">
        <div class="row medium-padding120">
                <div class="container">
                        
                            <div class="col-lg-12">
                                <div class="offers">
                                    <div class="row">
                                        <div class="case-item-wrap">
                                            @foreach ($tag->posts as $item)                                                
                                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                                    <div class="case-item">
                                                        <div class="case-item__thumb">
                                                        <img src="{{$item->image}}" alt="{{$item->title}}">
                                                    </div>
                                                <h6 class="case-item__title text-center"><a href="{{route('post.single', ['slug' => $item->slug])}}">{{$item->title}}</a></h6>
                                                    </div>
                                                </div>
                                            @endforeach
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="padded-50"></div>
                            </div>
                        
                    </div>
        </div>
    </div>
@endsection