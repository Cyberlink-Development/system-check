@extends('themes.default.common.master')
@section('title', $data->news_title)
@section('news_excerpt', $data->news_excerpt)
@section('news_thumbnail', $data->news_thumbnail)
@section('seo_title', $data->seo_title)
@section('meta_keyword', $data->meta_keyword)
@section('meta_description', $data->meta_description)
@section('content')
<!-- section start -->
<section class="uk-section-small bg-white">
   <div class="uk-container">
   <!-- ad -->
    @php
      $position = 18;
      @endphp
      @if( advertisement($position) )
      <div class="uk-margin-medium-bottom uk-text-center uk-advertisement">
         <a href="{{advertisement($position)->client_link}}" target="_blank"><img data-src="{{ asset( env('PUBLIC_PATH') . '/uploads/advertisement/' . advertisement($position)->add_image ) }}" alt="" width="1800" uk-img></a>
      </div>
      @endif 
   <!-- ad -->
   <div class="  uk-grid" uk-grid>
      <div class="uk-width-1-1">
          <!-- title -->
         <div class="uk-margin-bottom">
            <h1 class="uk-text-bold uk-margin-remove uk-news-title">{{ $data->news_title }}</h1>
            <h1 class="uk-text-bold uk-h4 uk-margin-small uk-news-subtitle">{{ $data->sub_title }}</h1>
         </div>
         <!-- end -->
      </div>
      <!-- left list -->
      <div class="uk-width-expand@m">
        
         <!--  -->
         <div class="uk-border-bottom uk-border-top uk-margin-bottom uk-padding-small">
            <div class="uk-grid uk-flex-between uk-grid-large">
               <div class="uk-child-width-expand@m uk-flex-middle">
                  <div class="uk-text-bold">
                     <div class="uk-flex uk-flex-left uk-flex-middle uk-grid-small  f-13" uk-grid>
                        <div>
                           {{ $data->nepali_date }} गतेमा प्रकाशित
                        </div>
                     </div>
                  </div>
               </div>
               <div class="uk-width-auto@m">
                  <!-- ShareThis BEGIN -->
                  <div class="sharethis-inline-share-buttons uk-text-left uk-text-right@m"></div>
                  <!-- ShareThis END -->
               </div>
            </div>
         </div>
         <!--  -->
         <!-- feature image -->   
          @if($data->news_thumbnail && $data->thumbnail_status == 0)     
         <figure class="uk-feature-image uk-margin-bottom uk-text-center" uk-lightbox>
            <a  href="{{ asset( env('PUBLIC_PATH') . '/uploads/original/' . $data->news_thumbnail) }}"  data-caption="{{ $data->thumbnail_caption }}">
                <div class="uk-feature-image-small"> 
            <img src="{{ asset( env('PUBLIC_PATH') . '/uploads/original/' . $data->news_thumbnail) }}" alt="">
         </div>
            </a>
             @if($data->thumbnail_caption)
            <figcaption>{{ $data->thumbnail_caption }}</figcaption>
            @endif
         </figure>
         @endif
          <!-- end -->
           @if($data->news_video)
         <iframe width="100%" height="350" src="https://www.youtube.com/embed/{{$data->news_video}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
         @endif
         <!--  -->
         <div class="uk-grid-small" uk-grid>
            
            <div class="uk-width-expand@m">
               <div class="uk-single-text">
                   {!! $data->news_content !!}
               </div>
            </div>
         </div>
         <!--  -->
          @php
            $position = 19;
            @endphp
            @if( advertisement($position) )
            <div class="uk-margin-bottom uk-text-center uk-advertisement">
               <a href="{{advertisement($position)->client_link}}" target="_blank"><img data-src="{{ asset( env('PUBLIC_PATH') . '/uploads/advertisement/' . advertisement($position)->add_image ) }}" alt="" width="1800" uk-img></a>
            </div>
            @endif  
                  @php
            $position = 20;
            @endphp
            @if( advertisement($position) )
            <div class="uk-margin-bottom uk-text-center uk-advertisement">
               <a href="{{advertisement($position)->client_link}}" target="_blank"><img data-src="{{ asset( env('PUBLIC_PATH') . '/uploads/advertisement/' . advertisement($position)->add_image ) }}" alt="" width="1800" uk-img></a>
            </div>
            @endif 
       
         <!-- comment -->
         <div class="uk-comment uk-margin-medium-bottom">
            <div class="uk-category-title uk-flex uk-flex-between uk-flex-middle uk-margin-medium-bottom">
               <div>
                  <h1 class="uk-h4 f-w-600 uk-margin-remove">प्रतिक्रिया दिनुहोस्</h1>
               </div>
            </div>
            <div class="facebook-comment">
               <div id="fb-root"></div>
               <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v11.0&appId=1082517085520776&autoLogAppEvents=1" nonce="MrXYpHdr"></script>
               <div class="fb-comments" data-href="{{url()->current()}}" data-width="" data-numposts="5"></div>
            </div>
         </div>
         <!-- end -->
         <!-- related -->
           @if($related_news->count() > 0)
         <div class="uk-related uk-margin-medium-bottom">
            <div class="uk-category-title uk-flex uk-flex-between uk-flex-middle uk-margin-medium-bottom">
               <div>
                  <h1 class="uk-h4 f-w-600 uk-margin-remove">सम्बन्धित समाचार</h1>
               </div>
            </div>
             <div class="uk-child-width-1-2@s uk-child-width-1-3@m uk-child-width-1-3@l uk-margin-top uk-grid-medium " uk-grid="">
                 @foreach($related_news as $row)
               <?php 
               if($row->uri == $_uri){
                  continue;
               } ?>
               <div class="uk-news">
                  <div class="uk-media-180 uk-margin-small-bottom uk-position-relative">
                     <a href="{{ url( Request::segment(1) .'/'. splitTimeStamp($row->created_at,$row->uri) ) }}" title="">
                     @if($row->news_thumbnail)
                     <img class="uk-image" alt="" src="{{ asset( env('PUBLIC_PATH') . '/uploads/medium/' . $row->news_thumbnail ) }}" class="uk-transition-scale-up uk-transition-opaque">
                     @else
                      <img class="uk-image" alt="" src="{{ asset('themes-assets') }}/images/default.png" class="uk-transition-scale-up uk-transition-opaque">
                      @endif
                     </a>
                  </div>
                  <h1 class="uk-h5 uk-text-bold uk-margin-remove"><a href="{{ url( Request::segment(1) .'/'. splitTimeStamp($row->created_at,$row->uri) ) }}" title="">{{ $row->news_title }}</a></h1>
               </div>
               @endforeach
                   
               </div>
         </div>
         @endif
         <!-- end -->
      </div>
      <!-- left list end -->
      <!-- sidebar -->
       @include('themes.default.common.sidebar-right')
      <!-- sidebar end -->
   </div>
</section>
<!-- section end -->
@endsection