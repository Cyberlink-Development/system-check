@extends('themes.default.common.master')
@section('title', $data->post_title)
@section('news_excerpt', $data->post_excerpt)
@section('news_thumbnail', $data->page_thumbnail)
@section('meta_keyword', $data->meta_keyword)
@section('meta_description', $data->meta_description)
@section('content')
<!-- section start -->
<section class="uk-section-small bg-white">
   <div class="uk-container">
  
   <div class="  uk-grid" uk-grid>
      <div class="uk-width-1-1">
          <!-- title -->
         <div class="uk-margin-bottom">
            <h1 class="uk-text-bold uk-margin-remove uk-news-title">{{ $data->post_title }}</h1>
            <h1 class="uk-text-bold uk-h4 uk-margin-small uk-news-subtitle">{{ $data->sub_title }}</h1>
         </div>
         <!-- end -->
      </div>
      <!-- left list -->
      <div class="uk-width-expand@m">
        
         <!--  -->
         <div class="uk-border-bottom uk-border-top uk-margin-bottom uk-padding-small">
            <div class="uk-grid uk-flex-between uk-grid-large">
              
               <div class="uk-width-auto@m">
                  <!-- ShareThis BEGIN -->
                  <div class="sharethis-inline-share-buttons uk-text-left uk-text-right@m"></div>
                  <!-- ShareThis END -->
               </div>
            </div>
         </div>
         <!--  -->
         <!-- feature image -->   
          @if($data->page_thumbnail)     
         <figure class="uk-feature-image uk-margin-bottom uk-text-center" uk-lightbox>
            <a  href="{{ asset( env('PUBLIC_PATH') . '/uploads/original/' . $data->page_thumbnail) }}"  data-caption="{{ $data->thumbnail_caption }}">
                <div class="uk-feature-image-small"> 
            <img src="{{ asset( env('PUBLIC_PATH') . '/uploads/original/' . $data->page_thumbnail) }}" alt="">
         </div>
            </a>
            
         </figure>
         @endif
          <!-- end -->
         
         <!--  -->
         <div class="uk-grid-small" uk-grid>
            
            <div class="uk-width-expand@m">
               <div class="uk-single-text">
                   {!! $data->post_content !!}
               </div>
            </div>
         </div>
         
       
         
      </div>
      <!-- left list end -->
      <!-- sidebar -->
       @include('themes.default.common.sidebar-right')
      <!-- sidebar end -->
   </div>
</section>
<!-- section end -->
@endsection