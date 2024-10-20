@extends('themes.default.common.master')
@section('title', $news_type->news_type)
@section('meta_keyword', $news_type->meta_keyword)
@section('meta_description', $news_type->meta_description)
@section('content')
    <!-- section -->
    <section class="uk-section bg-white">

        <div class="uk-container" uk-scrollspy="cls: uk-animation-slide-top-small; target:div, h1, a;  delay: 50; repeat: false;">
                    <h1 class="uk-h2 text-primary f-w-600">{{$news_type->news_type}}</h1>
            <!--  -->
            <ul class=" uk-child-width-1-3@l uk-child-width-1-2@m uk-child-width-1-2@s " uk-lightbox
                uk-height-match="target:.uk-match-height" uk-grid
                uk-scrollspy="cls: uk-animation-slide-top-small; target:div, p, h1, a,  li;  delay: 50; repeat: false;"
                uk-lightbox>
                @if ($data->count() > 0)
                    @foreach ($data as $row)
                        <li>
                            <div class="uk-news">
                                <!-- if video -->
                                <div class="open-video" data-youtube-id="{{ $row->news_video }}">
                                    <div class="uk-media-250 uk-position-relative uk-same-height">
                                        <div class="uk-overlay-primary uk-position-cover"
                                            style="background:rgb(34 34 34 / 52%) !important"></div>
                                        <img src="https://img.youtube.com/vi/{{ $row->news_video }}/mqdefault.jpg">
                                        <div class="uk-position-center uk-zindex" style="left:45%!important;">
                                            <!--<i class="fa fa-play fa-2x text-white"></i> -->
                                            <span class="uk-margin-small-right uk-icon uk-text-white"
                                                uk-icon="icon: play-circle; ratio: 1.5"></span>
                                        </div>
                                    </div>
                                    <h1 class="uk-h5 uk-text-bold uk-margin-top">{{ $row->news_title }}</h1>
                                </div>
                                <!-- if video -->


                            </div>
                        </li>
                    @endforeach
                @endif
            </ul>
        </div>
        <div class="uk-margin-medium-top">
            {!! $data->links('themes.default.common.pagination') !!}
        </div>
    </section>
    <!-- video modal -->
    <div id="video-modal" class="uk-flex-top">
        <button class="uk-modal-close uk-icon uk-close uk-position-top-right text-white uk-padding" type="button"
            uk-icon="icon: close; ratio: 2"></button>
        <div class="uk-modal-dialog uk-margin-auto-vertical">
        </div>
    </div>
    <!-- end video modal-->
    <!-- section -->
@endsection
