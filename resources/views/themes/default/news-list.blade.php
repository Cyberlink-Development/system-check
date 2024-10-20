@extends('themes.default.common.master')
{{-- @section('title', $news_type->news_type)
@section('meta_keyword', $news_type->meta_keyword)
@section('meta_description', $news_type->meta_description) --}}
@section('content')
    <!-- section start -->
    <section class="uk-section-small bg-white">
        <div class="uk-container">
            <h1 class="uk-h2 text-primary f-w-600">{{ $news_type->news_type }}</h1>
            <!--  -->
            <div class="uk-grid-mdeium uk-child-width-1-3@s" uk-height-match="target:.bg-white" uk-grid>
                <!--  -->
                @if ($data->count() > 0)
                    @foreach ($data as $row)
                        <div class="uk-news">
                            <div class="uk-news-box bg-white">
                                <a
                                    href="{{ url(get_newstype($row->news_type)['uri'] . '/' . splitTimeStamp($row->created_at, $row->uri)) }}">
                                    <figure class="uk-media-250 uk-position-relative">
                                        @if ($row->news_thumbnail)
                                            <img class="uk-image" alt=""
                                                src="{{ asset(env('PUBLIC_PATH') . '/uploads/medium/' . $row->news_thumbnail) }}">
                                        @else
                                            <img class="uk-image" src="{{ asset('themes-assets') }}/images/default.png"
                                                class="uk-no-border-radius">
                                        @endif
                                    </figure>
                                </a>
                                <div class="uk-news-box-body-list">
                                    <div class="">
                                        <h1 class=" uk-h5  uk-text-bold  uk-margin-remove">
                                            <a class="uk-margin-remove"
                                                href="{{ url(get_newstype($row->news_type)['uri'] . '/' . splitTimeStamp($row->created_at, $row->uri)) }}">{{ $row->news_title }}</a>
                                        </h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
                <!--  -->

                <!--  -->
            </div>
            <!--  -->
            <div class="uk-margin-medium-top">
                {!! $data->links('themes.default.common.pagination') !!}
            </div>
    </section>
    <!-- section end -->
@endsection
