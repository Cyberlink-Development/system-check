@extends('themes.default.common.master')
@section('meta_keyword', $setting->meta_key)
@section('meta_description', $setting->meta_description)
@section('content') 

<!-- breaking section start -->
<section class="uk-section-small bg-white">
   <div class="uk-container">
    <!-- ad -->
    @php
   $position = 1;
   @endphp
   @if( advertisement($position) )
   <div class="uk-margin-bottom uk-text-center uk-advertisement">
      <a href="{{advertisement($position)->client_link}}" target="_blank"><img data-src="{{ asset( env('PUBLIC_PATH') . '/uploads/advertisement/' . advertisement($position)->add_image ) }}" alt="" width="1800" uk-img></a>
   </div>
   @endif   
   <!--ad  -->
   <ul class="uk-breaking-news">
        @if($breaking_news1)
      <li>
         <div class="uk-grid uk-flex-middle uk-text-center" uk-grid>
            <!--  -->
            <div class="uk-width-1-1@l uk-width-1-1@m uk-text-center">
               <!--  -->
               <div class="uk-padding-small">
                  <a href="{{ route('news.newstype',get_newstype($breaking_news1->news_type)->uri ) }}">
                     <div class="uk-news-catagory bg-red uk-margin-small f-18 f-w-600">{{ get_newstype($breaking_news1->news_type)->news_type }}</div>
                  </a>
                  <h1 class="uk-text-bold uk-margin-small uk-h1"> <a href="{{ url(get_newstype($breaking_news1->news_type)['uri'] .'/'. splitTimeStamp($breaking_news1->created_at,$breaking_news1->uri) ) }}"> {{ $breaking_news1->news_title }}</a></h1>
                  
               </div>
               <!--  -->
                 @if($breaking_news1->news_thumbnail)
               <a href="{{ url(get_newstype($breaking_news1->news_type)['uri'] .'/'. splitTimeStamp($breaking_news1->created_at,$breaking_news1->uri) ) }}">
                  <figure class="uk-media-450">
                     <img class="uk-image" alt="" src="{{ asset( env('PUBLIC_PATH') . '/uploads/original/' . $breaking_news1->news_thumbnail ) }}">
                  </figure>
               </a>
                @endif   
               <!--  -->
               <!--  -->
               <div class="uk-padding-small">
                  <div class="uk-text-large">
                   {{ $breaking_news1->news_excerpt }}
                  </div>
               </div>
               <!--  -->
            </div>
            <!--  -->
         </div>
      </li>
      @endif
      <!-- ad -->
       @php
   $position = 2;
   @endphp
   @if( advertisement($position) )
    <li>
   <div class="uk-margin-bottom uk-text-center uk-advertisement">
      <a href="{{advertisement($position)->client_link}}" target="_blank"><img data-src="{{ asset( env('PUBLIC_PATH') . '/uploads/advertisement/' . advertisement($position)->add_image ) }}" alt="" width="1800" uk-img></a>
   </div>
    </li>
   @endif
     <!-- ad -->

        @if($breaking_news2)
      <li>
         <div class="uk-grid uk-flex-middle uk-text-center" uk-grid>
            <!--  -->
            <div class="uk-width-1-1@l uk-width-1-1@m uk-text-center">
               <!--  -->
               <div class="uk-padding-small">
                  <a href="{{ route('news.newstype',get_newstype($breaking_news2->news_type)->uri ) }}">
                     <div class="uk-news-catagory bg-red uk-margin-small f-18 f-w-600">{{ get_newstype($breaking_news2->news_type)->news_type }}</div>
                  </a>
                  <h1 class="uk-text-bold uk-margin-small uk-h1"> <a href="{{ url(get_newstype($breaking_news2->news_type)['uri'] .'/'. splitTimeStamp($breaking_news2->created_at,$breaking_news2->uri) ) }}"> {{ $breaking_news2->news_title }}</a></h1>
                  
               </div>
               <!--  -->
                 @if($breaking_news2->news_thumbnail)
               <a href="{{ url(get_newstype($breaking_news2->news_type)['uri'] .'/'. splitTimeStamp($breaking_news2->created_at,$breaking_news2->uri) ) }}">
                  <figure class="uk-media-450">
                     <img class="uk-image" alt="" src="{{ asset( env('PUBLIC_PATH') . '/uploads/original/' . $breaking_news2->news_thumbnail ) }}">
                  </figure>
               </a>
                @endif   
               <!--  -->
               <!--  -->
               <div class="uk-padding-small">
                  <div class="uk-text-large">
                    {{ $breaking_news2->news_excerpt }}
                  </div>
               </div>
               <!--  -->
            </div>
            <!--  -->
         </div>
      </li>
      @endif
      <!-- ad -->
       @php
   $position = 3;
   @endphp
   @if( advertisement($position) )
    <li>
   <div class="uk-margin-bottom uk-text-center uk-advertisement">
      <a href="{{advertisement($position)->client_link}}" target="_blank"><img data-src="{{ asset( env('PUBLIC_PATH') . '/uploads/advertisement/' . advertisement($position)->add_image ) }}" alt="" width="1800" uk-img></a>
   </div>
    </li>
   @endif
     <!-- ad -->
     
   </ul>
</div>
</section>
<!-- breaking section end -->
<!-- section start -->
<div class="uk-section-small uk-section uk-background-secondary">
<div class="uk-container">
   <div class="uk-width-1-1 uk-text-center">
      <div class=" ">
         <div class=" uk-light">
            <h3 class="uk-heading-line uk-text-left uk-margin-small-bottom">
               <a class="uk-h3 uk-text-bold" href="{{ route('news.newstype',get_newstype(93)->uri) }}">
               <span>
               <span uk-icon="icon: youtube; ratio: 1.5" class="uk-icon"></span>
               {{ get_newstype(93)->news_type }}
               </a>
            </h3>
         </div>
          @if(newslist(93,3,0))
         <div class=" uk-light uk-video-home" uk-slideshow="animation: slide">
            <div class="uk-video-container">
               <div class="uk-grid-medium uk-grid" uk-grid>
                    <div class="uk-width-large@m uk-flex-last uk-flex-first@l">
                     <div class="uk-margin-remove">
                        <div class="">
                           <ul class="uk-list uk-list-large uk-list-divider uk-margin-remove">                             
                            @foreach(newslist(93,3,0) as $key=>$value)
                              <li uk-slideshow-item="{{$loop->index}}">
                                 <div class="uk-grid uk-grid-small" uk-grid>
                                    <div class="uk-width-auto">
                                       <a href="#" class="uk-position-relative  uk-inline">
                                          <img class="no-lazy" src="https://i.ytimg.com/vi/{{$value->news_video}}/mqdefault.jpg" style="width: 180px; height:auto;">
                                          <div class="uk-position-cover   uk-overlay uk-overlay-primary" style="background:rgb(34 34 34 / 52%) !important"> 
                                             <span class="uk-margin-small-right uk-icon" uk-icon="icon: play-circle; ratio: 1.5"></span>
                                          </div>
                                       </a>
                                    </div>
                                    <div class="uk-video-content uk-width-expand">
                                       <a href="#">
                                          <h4 class="uk-margin-remove uk-h5 uk-text-bold  uk-text-left">{{$value->news_title}} </h4>
                                       </a>                                          
                                    </div>
                                 </div>
                              </li>
                           @endforeach
                           </ul>
                        </div>
                     </div>
                  </div>
                  <div class="uk-width-expand@m">
                     <ul class="uk-slideshow-items uk-responsive-height" style="height: 420px">                         
                            @foreach(newslist(93,3,0) as $key=>$value)
                        <li class="uk-clearfix">
                           <div class="uk-video-slides uk-border-rounded"> <iframe class="no-lazy jch-lazyload" width="100%" height="420" data-src="https://www.youtube.com/embed/{{$value->news_video}}?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen uk-video="autoplay: false;" uk-responsive ></iframe></div>
                        </li>
                          @endforeach
                     </ul>
                  </div>
                 
               </div>
            </div>
         </div>
         @endif
      </div>
   </div>
   
</div>
</div>
<!-- section end -->
<!-- ad -->
       @php
   $position = 4;
   @endphp
   @if( advertisement($position) )
    <li>
   <div class="uk-margin-bottom uk-text-center uk-advertisement">
      <a href="{{advertisement($position)->client_link}}" target="_blank"><img data-src="{{ asset( env('PUBLIC_PATH') . '/uploads/advertisement/' . advertisement($position)->add_image ) }}" alt="" width="1800" uk-img></a>
   </div>
    </li>
   @endif
     <!-- ad -->
<!-- section start -->
<section class="uk-section-small">
<div class="uk-container">
   <div uk-grid class="uk-grid-medium">
      <div class="uk-width-expand@m">
         <div class="uk-category-title uk-flex uk-flex-between uk-flex-middle uk-margin-bottom">
            <div>
               <h1 class="uk-h4 uk-text-bold uk-margin-remove">{{ get_newstype(61)->news_type }} </h1>
            </div>
            <div> <a href="{{ route('news.newstype',get_newstype(61)->uri) }}" class="uk-viewall text-primary">सबै <span class="uk-icon" uk-icon="icon: triangle-right; "></span>
               </a> 
            </div>
         </div>
         <div>
            <!--  -->
            <div class="uk-grid-medium uk-child-width-expand@s  uk-light" uk-grid>
               <!--  -->
                @if(newslist(61,2,0))
                  @foreach(newslist(61,2,0) as $row)
               <div>
                  <div class="uk-news ">
                     <div class=" uk-inline-clip uk-li uk-toggle uk-text-left uk-border-rounded">
                        <a href="{{ url(get_newstype($row->news_type)['uri'] .'/'. splitTimeStamp($row->created_at,$row->uri) ) }}">
                           <figure class="uk-media-400 uk-dark-overlay">
                             @if($row->news_thumbnail)  
                           <img src="{{ asset( env('PUBLIC_PATH') . '/uploads/medium/' . $row->news_thumbnail) }}"  class="img-responsive" > 
                           @else
                            <img src="{{ asset('themes-assets') }}/images/default.png" class="img-responsive" > 
                            @endif
                           </figure>
                        </a>
                        <div class="uk-position-bottom-left">
                           <div class="uk-panel uk-padding">
                              <h1 class=" uk-h3  uk-text-bold  uk-margin-remove">
                                 <a class="uk-margin-remove uk-text-white" href="{{ url(get_newstype($row->news_type)['uri'] .'/'. splitTimeStamp($row->created_at,$row->uri) ) }}">{{$row->news_title }}</a>
                              </h1>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
                @endforeach
                  @endif
               <!--  -->
               
            </div>
            <!--  -->
            <!--  -->
            <div class="uk-child-width-1-2@s uk-child-width-1-4@m uk-child-width-1-4@l uk-margin-top uk-grid-medium " uk-grid="">
                 @if(newslist(61,4,2))
                  @foreach(newslist(61,4,2) as $row)
               <div class="uk-news">
                  <div class="uk-media-180 uk-margin-small-bottom uk-position-relative">
                     <a href="{{ url(get_newstype($row->news_type)['uri'] .'/'. splitTimeStamp($row->created_at,$row->uri) ) }}" title="">
                      @if($row->news_thumbnail)  
                     <img src="{{ asset( env('PUBLIC_PATH') . '/uploads/medium/' . $row->news_thumbnail) }}"  class="img-responsive" > 
                     @else
                      <img src="{{ asset('themes-assets') }}/images/default.png" class="img-responsive" > 
                      @endif
                     </a>
                  </div>
                  <h1 class="uk-h5 uk-text-bold uk-margin-remove"><a href="{{ url(get_newstype($row->news_type)['uri'] .'/'. splitTimeStamp($row->created_at,$row->uri) ) }}" title="">{{$row->news_title }}</a></h1>
               </div>
             @endforeach
                  @endif    
            </div>
         </div>
      </div>
      
   </div>
  
</div>
</section>
<!-- section end --> 

<!-- section start -->
<section class="uk-section-small">
<div class="uk-container">
   <!-- ad -->
       @php
   $position = 5;
   @endphp
   @if( advertisement($position) )
    <li>
   <div class="uk-margin-bottom uk-text-center uk-advertisement">
      <a href="{{advertisement($position)->client_link}}" target="_blank"><img data-src="{{ asset( env('PUBLIC_PATH') . '/uploads/advertisement/' . advertisement($position)->add_image ) }}" alt="" width="1800" uk-img></a>
   </div>
    </li>
   @endif
     <!-- ad -->
  
   <div class="uk-category-title uk-flex uk-flex-between uk-flex-middle uk-margin-bottom">
      <div>
         <h1 class="uk-h4 f-w-600 uk-margin-remove">{{ get_newstype(92)->news_type }}</h1>
      </div>
      <div> <a href="{{ route('news.newstype',get_newstype(92)->uri) }}" class="uk-viewall text-primary">सबै 
         <span class="uk-icon" uk-icon="icon: triangle-right; "></span>
         </a> 
      </div>
   </div>
   <div class="uk-grid-medium " uk-grid>
      <!--  -->
        @if( newstop(92) )
      <div class="uk-width-expand@l">
         <!--  -->
         <div class="uk-news ">
            <div class=" uk-inline-clip uk-li uk-toggle uk-text-left uk-border-rounded">
               <a href="{{ url(get_newstype(newstop(92)->news_type)['uri'] .'/'. splitTimeStamp(newstop(92)->created_at,newstop(92)->uri) ) }}">
                  <figure class="uk-media-520 uk-dark-overlay">
                       @if(newstop(92)->news_thumbnail) 
                     <img src="{{ asset( env('PUBLIC_PATH') . '/uploads/medium/' . newstop(92)->news_thumbnail) }}" alt="" class="uk-no-border-radius">
                      @else
                      <img src="{{ asset('themes-assets') }}/images/default.png" class="uk-no-border-radius" > 
                      @endif   
                  </figure>
               </a>
               <div class="uk-position-bottom-left">
                  <div class="uk-panel uk-padding">
                     <h1 class=" uk-h3  uk-text-bold  uk-margin-remove">
                        <a class="uk-margin-remove uk-text-white" href="{{ url(get_newstype(newstop(92)->news_type)['uri'] .'/'. splitTimeStamp(newstop(92)->created_at,newstop(92)->uri) ) }}"  >{{ newstop(92)->news_title }}</a>
                     </h1>
                     <div class="uk-text-white uk-margin-small f-18">
                       {{ newstop(92)->news_excerpt }}
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!--  -->
      </div>
      @endif
      <!--  -->
      <!--  -->
      <div class="uk-width-1-3@l uk-width-1-2@m">
            <div class="uk-child-width-1-1 uk-margin-top uk-grid-medium " uk-grid="">
               @if(newslist(92,2,1))
                  @foreach(newslist(92,2,1) as $row)
            <div class="uk-news">
               <div class="uk-media-180 uk-margin-small-bottom uk-position-relative">
                 <a href="{{ url(get_newstype($row->news_type)['uri'] .'/'. splitTimeStamp($row->created_at,$row->uri) ) }}" title="">
                  @if($row->news_thumbnail)  
                  <img src="{{ asset( env('PUBLIC_PATH') . '/uploads/medium/' . $row->news_thumbnail) }}"  class="img-responsive" > 
                  @else
                   <img src="{{ asset('themes-assets') }}/images/default.png" class="img-responsive" > 
                   @endif
                  </a>                     
               </div>
               <h1 class="uk-h5 uk-text-bold uk-margin-remove"><a href="{{ url(get_newstype($row->news_type)['uri'] .'/'. splitTimeStamp($row->created_at,$row->uri) ) }}" title="">{{$row->news_title }}</a></h1>
            </div>        
           @endforeach
                  @endif  
         </div>
      </div>
      <!--  -->
      <!--  -->
      <div class="uk-width-1-4@l uk-width-1-2@m">
          <div class="uk-trending bg-white uk-margin-small-bottom">
            <div class="uk-news-box-body uk-padding-small uk-box-shadow-small ">
               <ul class="uk-theme-list uk-list-divider">
                   @if(newslist(92,3,3))
                  @foreach(newslist(92,3,3) as $row)
                  <li><a href="{{ url(get_newstype($row->news_type)['uri'] .'/'. splitTimeStamp($row->created_at,$row->uri) ) }}">{{$row->news_title }}</a></li>
                  @endforeach
                  @endif  
               </ul>
            </div>
         </div>
          @php
         $position = 30;
         @endphp
         @if( advertisement($position) )
         <div class="ad-aside uk-text-center  uk-margin-small-bottom">
             <a href="{{advertisement($position)->client_link}}"><img src="{{ asset( env('PUBLIC_PATH') . '/uploads/advertisement/' . advertisement($position)->add_image ) }}" alt=""></a>
         </div>
         @endif
          @php
         $position = 31;
         @endphp
         @if( advertisement($position) )
         <div class="ad-aside uk-text-center uk-margin-small-bottom">
             <a href="{{advertisement($position)->client_link}}"><img src="{{ asset( env('PUBLIC_PATH') . '/uploads/advertisement/' . advertisement($position)->add_image ) }}" alt=""></a>
         </div>
        @endif
      </div>
   </div>
  <!-- ad -->
   @php
   $position = 6;
   @endphp
   @if( advertisement($position) )
 <div class="uk-margin-medium-top uk-text-center uk-advertisement">
      <a href="{{advertisement($position)->client_link}}"><img data-src="{{ asset( env('PUBLIC_PATH') . '/uploads/advertisement/' . advertisement($position)->add_image ) }}" alt="" width="1800" uk-img></a>
   </div>
   @endif    
   <!-- ad -->
</div>
</section>
<!-- section end -->

<!-- section start -->
<section class="uk-section-small bg-light">
<div class="uk-container">
   <div class="uk-child-width-expand@s" uk-height-match="target:.bg-white" uk-grid>
      <!--  -->
      <div>
         <div class="uk-category-title uk-flex uk-flex-between uk-flex-middle uk-margin-bottom">
            <div>
               <h1 class="uk-h5 uk-text-bold uk-margin-remove"> {{ get_newstype(62)->news_type }}</h1>
            </div>
            <div> <a href="{{ route('news.newstype',get_newstype(62)->uri) }}" class="uk-viewall text-primary">सबै 
               <span class="uk-icon" uk-icon="icon: triangle-right; "></span>
               </a> 
            </div>
         </div>
         <div class="uk-news ">
            <div class="uk-news-box bg-white uk-box-shadow-hover-medium uk-border-rounded">
               @if( newstop(62) )
               <a href="{{ url(get_newstype(newstop(62)->news_type)['uri'] .'/'. splitTimeStamp(newstop(62)->created_at,newstop(62)->uri) ) }}" class="uk-cover-container uk-transition-toggle uk-display-block uk-li uk-toggle uk-media-290 uk-text-center" tabindex="0">
                    @if(newstop(62)->news_thumbnail) 
                     <img src="{{ asset( env('PUBLIC_PATH') . '/uploads/medium/' . newstop(62)->news_thumbnail) }}" alt="" class="uk-no-border-radius">
                      @else
                      <img src="{{ asset('themes-assets') }}/images/default.png" class="uk-no-border-radius" > 
                      @endif  
                  <div class="uk-overlay uk-padding-small uk-position-bottom uk-margin-remove-first-child uk-overlay-primary">
                     <div class=" uk-h4  uk-text-bold uk-margin-top uk-margin-remove-bottom">{{ newstop(62)->news_title }}</div>
                  </div>
               </a>
               @endif
               <div class="uk-news-box-body uk-padding">
                  <ul class="uk-theme-list uk-list-divider">
                     <!--  -->
                      @if(newslist(62,3,1))
                     @foreach(newslist(62,3,1) as $row)
                     <li>
                        <a href="{{ url(get_newstype($row->news_type)['uri'] .'/'. splitTimeStamp($row->created_at,$row->uri) ) }}">
                       {{$row->news_title }}
                        </a>
                     </li>
                     <!--  --> 
                     @endforeach
                    @endif
                  </ul>
               </div>
            </div>
         </div>
      </div>
      <!--  -->
      <!--  -->
      <div>
         <div class="uk-category-title uk-flex uk-flex-between uk-flex-middle uk-margin-bottom">
            <div>
               <h1 class="uk-h5 uk-text-bold uk-margin-remove">{{ get_newstype(63)->news_type }}</h1>
            </div>
            <div> <a href="{{ route('news.newstype',get_newstype(63)->uri) }}" class="uk-viewall text-primary">सबै 
               <span class="uk-icon" uk-icon="icon: triangle-right; "></span>
               </a> 
            </div>
         </div>
          <div class="uk-news ">
            <div class="uk-news-box bg-white uk-box-shadow-hover-medium uk-border-rounded">
                @if( newstop(63) )
               <a href="{{ url(get_newstype(newstop(63)->news_type)['uri'] .'/'. splitTimeStamp(newstop(63)->created_at,newstop(63)->uri) ) }}" class="uk-cover-container uk-transition-toggle uk-display-block uk-li uk-toggle uk-media-290 uk-text-center" tabindex="0">
                    @if(newstop(63)->news_thumbnail) 
                     <img src="{{ asset( env('PUBLIC_PATH') . '/uploads/medium/' . newstop(63)->news_thumbnail) }}" alt="" class="uk-no-border-radius">
                      @else
                      <img src="{{ asset('themes-assets') }}/images/default.png" class="uk-no-border-radius" > 
                      @endif  
                  <div class="uk-overlay uk-padding-small uk-position-bottom uk-margin-remove-first-child uk-overlay-primary">
                     <div class=" uk-h4  uk-text-bold uk-margin-top uk-margin-remove-bottom">{{ newstop(63)->news_title }}</div>
                  </div>
               </a>
               @endif
               
               <div class="uk-news-box-body uk-padding">
                  <ul class="uk-theme-list uk-list-divider">
                     <!--  -->
                     @if(newslist(63,3,1))
                     @foreach(newslist(63,3,1) as $row)
                     <li>
                        <a href="{{ url(get_newstype($row->news_type)['uri'] .'/'. splitTimeStamp($row->created_at,$row->uri) ) }}">
                       {{$row->news_title }}
                        </a>
                     </li>
                     <!--  --> 
                     @endforeach
                    @endif
                     <!--  --> 
                  </ul>
               </div>
            </div>
         </div>
      </div>
      <!--  -->
      <!--  -->
      <div>
         <div class="uk-category-title uk-flex uk-flex-between uk-flex-middle uk-margin-bottom">
            <div>
               <h1 class="uk-h5 uk-text-bold uk-margin-remove">{{ get_newstype(65)->news_type }}</h1>
            </div>
            <div> <a href="{{ route('news.newstype',get_newstype(65)->uri) }}" class="uk-viewall text-primary">सबै 
               <span class="uk-icon" uk-icon="icon: triangle-right; "></span>
               </a> 
            </div>
         </div>
         <div class="uk-news ">
            <div class="uk-news-box bg-white uk-box-shadow-hover-medium uk-border-rounded">
                @if( newstop(65) )
               <a href="{{ url(get_newstype(newstop(65)->news_type)['uri'] .'/'. splitTimeStamp(newstop(65)->created_at,newstop(65)->uri) ) }}" class="uk-cover-container uk-transition-toggle uk-display-block uk-li uk-toggle uk-media-290 uk-text-center" tabindex="0">
                    @if(newstop(65)->news_thumbnail) 
                     <img src="{{ asset( env('PUBLIC_PATH') . '/uploads/medium/' . newstop(65)->news_thumbnail) }}" alt="" class="uk-no-border-radius">
                      @else
                      <img src="{{ asset('themes-assets') }}/images/default.png" class="uk-no-border-radius" > 
                      @endif  
                  <div class="uk-overlay uk-padding-small uk-position-bottom uk-margin-remove-first-child uk-overlay-primary">
                     <div class=" uk-h4  uk-text-bold uk-margin-top uk-margin-remove-bottom">{{ newstop(65)->news_title }}</div>
                  </div>
               </a>
               @endif
               <div class="uk-news-box-body uk-padding">
                  <ul class="uk-theme-list uk-list-divider">
                     <!--  -->
                      @if(newslist(65,3,1))
                     @foreach(newslist(65,3,1) as $row)
                     <li>
                        <a href="{{ url(get_newstype($row->news_type)['uri'] .'/'. splitTimeStamp($row->created_at,$row->uri) ) }}">
                       {{$row->news_title }}
                        </a>
                     </li>
                     <!--  --> 
                     @endforeach
                    @endif
                     <!--  --> 
                  </ul>
               </div>
            </div>
         </div>
      </div>
      <!--  -->
   </div>
   <!-- ad -->
    @php
   $position = 7;
   @endphp
   @if( advertisement($position) )
    <div class="uk-margin-medium-top uk-text-center uk-advertisement">
      <a href="{{advertisement($position)->client_link}}"><img data-src="{{ asset( env('PUBLIC_PATH') . '/uploads/advertisement/' . advertisement($position)->add_image ) }}" alt="" width="1800" uk-img></a>
   </div>
   @endif    
   <!-- ad -->
</div>
</section>
<!-- section end --> 



<!-- section start -->
<section class="uk-section-small">
<div class="uk-container">
   
   <div class="uk-category-title uk-flex uk-flex-between uk-flex-middle uk-margin-bottom">
      <div>
         <h1 class="uk-h4 f-w-600 uk-margin-remove"> {{ get_newstype(67)->news_type }}</h1>
      </div>
      <div> <a href="{{ route('news.newstype',get_newstype(67)->uri) }}" class="uk-viewall text-primary">सबै 
         <span class="uk-icon" uk-icon="icon: triangle-right; "></span>
         </a> 
      </div>
   </div>
   <div class="uk-grid-medium " uk-grid>
       <!--  -->
      <div class="uk-width-1-3@l uk-width-1-2@m">
            <div class="uk-child-width-1-1 uk-margin-top uk-grid-medium " uk-grid="">
             @if(newslist(67,2,1))
                  @foreach(newslist(67,2,1) as $row)
            <div class="uk-news">
               <div class="uk-media-180 uk-margin-small-bottom uk-position-relative">
                   <a href="{{ url(get_newstype($row->news_type)['uri'] .'/'. splitTimeStamp($row->created_at,$row->uri) ) }}" title="">
                  @if($row->news_thumbnail)  
                  <img src="{{ asset( env('PUBLIC_PATH') . '/uploads/medium/' . $row->news_thumbnail) }}"  class="img-responsive" > 
                  @else
                   <img src="{{ asset('themes-assets') }}/images/default.png" class="img-responsive" > 
                   @endif
                  
               </div>
               <h1 class="uk-h5 uk-text-bold uk-margin-remove"><a href="{{ url(get_newstype($row->news_type)['uri'] .'/'. splitTimeStamp($row->created_at,$row->uri) ) }}" title="">{{$row->news_title }}</a></h1>
            </div>
            @endforeach
                  @endif             
          </div>
      </div>
      <!--  -->
      <!--  -->
        @if( newstop(67) )
      <div class="uk-width-expand@l">
         <!--  -->
         <div class="uk-news ">
            <div class=" uk-inline-clip uk-li uk-toggle uk-text-left uk-border-rounded">
               <a href="{{ url(get_newstype(newstop(67)->news_type)['uri'] .'/'. splitTimeStamp(newstop(67)->created_at,newstop(67)->uri) ) }}">
                  <figure class="uk-media-520 uk-dark-overlay">
                    @if(newstop(67)->news_thumbnail) 
                     <img src="{{ asset( env('PUBLIC_PATH') . '/uploads/medium/' . newstop(67)->news_thumbnail) }}" alt="" class="uk-no-border-radius">
                      @else
                      <img src="{{ asset('themes-assets') }}/images/default.png" class="uk-no-border-radius" > 
                      @endif   
                  </figure>
               </a>
               <div class="uk-position-bottom-left">
                  <div class="uk-panel uk-padding">
                     <h1 class=" uk-h3  uk-text-bold  uk-margin-remove">
                        <a class="uk-margin-remove uk-text-white" href="{{ url(get_newstype(newstop(67)->news_type)['uri'] .'/'. splitTimeStamp(newstop(67)->created_at,newstop(67)->uri) ) }}"  >{{ newstop(67)->news_title }}</a>
                     </h1>
                     <div class="uk-text-white uk-margin-small f-18">
                      {{ newstop(67)->news_excerpt }}
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!--  -->
      </div>
      @endif
      <!--  -->
     
      <!--  -->
      <div class="uk-width-1-4@l uk-width-1-2@m">
          <div class="uk-trending bg-white uk-margin-small-bottom">
            <div class="uk-news-box-body uk-padding-small uk-box-shadow-small ">
               <ul class="uk-theme-list uk-list-divider">
                  @if(newslist(67,3,3))
                     @foreach(newslist(67,3,3) as $row)
                     <li>
                        <a href="{{ url(get_newstype($row->news_type)['uri'] .'/'. splitTimeStamp($row->created_at,$row->uri) ) }}">
                       {{$row->news_title }}
                        </a>
                     </li>
                     <!--  --> 
                     @endforeach
                    @endif
               </ul>
            </div>
         </div>
           <!-- ad -->
            @php
         $position = 32;
         @endphp
         @if( advertisement($position) )
          <div class="ad-aside uk-text-center  uk-margin-small-bottom">
            <a href="{{advertisement($position)->client_link}}"><img data-src="{{ asset( env('PUBLIC_PATH') . '/uploads/advertisement/' . advertisement($position)->add_image ) }}" alt="" uk-img></a>
         </div>
         @endif      
         <!-- ad -->
           <!-- ad -->
            @php
         $position = 33;
         @endphp
         @if( advertisement($position) )
          <div class="ad-aside uk-text-center  uk-margin-small-bottom">
            <a href="{{advertisement($position)->client_link}}"><img data-src="{{ asset( env('PUBLIC_PATH') . '/uploads/advertisement/' . advertisement($position)->add_image ) }}" alt="" uk-img></a>
         </div>
         @endif      
         <!-- ad -->
          <!-- ad -->
            @php
         $position = 34;
         @endphp
         @if( advertisement($position) )
          <div class="ad-aside uk-text-center  uk-margin-small-bottom">
            <a href="{{advertisement($position)->client_link}}"><img data-src="{{ asset( env('PUBLIC_PATH') . '/uploads/advertisement/' . advertisement($position)->add_image ) }}" alt="" uk-img></a>
         </div>
         @endif      
         <!-- ad -->
        
      </div>
   </div>
 
</div>
</section>
<!-- section end -->


<!-- section start -->
<section class="uk-section-small bg-light">
<div class="uk-container">
   <div class="uk-category-title   uk-flex uk-flex-between uk-flex-middle  uk-margin-bottom ">
      <div>
         <h1 class="uk-h4 f-w-600 uk-margin-remove">{{ get_newstype(76)->news_type }}</h1>
      </div>
      <div> <a href="{{ route('news.newstype',get_newstype(76)->uri) }}" class="uk-viewall text-primary">सबै 
         <span class="uk-icon" uk-icon="icon: triangle-right; "></span>
         </a> 
      </div>
   </div>
</div>
<div class="uk-container">
   <div class="uk-grid-small uk-child-width-1-4@s   uk-text-center uk-light" uk-grid>
      <!--  -->
       @if(newslist(76,4,0))
         @foreach(newslist(76,4,0) as $row)
      <div>
         <div class="uk-news uk-margin-bottom uk-border-rounded">
            <div class=" uk-inline-clip uk-li uk-toggle">
               <a href="{{ url(get_newstype($row->news_type)['uri'] .'/'. splitTimeStamp($row->created_at,$row->uri) ) }}">
                  <figure class="uk-media-400 uk-dark-overlay">
                  @if($row->news_thumbnail)  
                  <img src="{{ asset( env('PUBLIC_PATH') . '/uploads/medium/' . $row->news_thumbnail) }}"  class="img-responsive" > 
                  @else
                   <img src="{{ asset('themes-assets') }}/images/default.png" class="img-responsive" > 
                   @endif
                  </figure>
               </a>
               <div class="uk-position-bottom-left">
                  <div class="uk-panel uk-padding-small">
                     <h1 class=" uk-h5 uk-text-bold  uk-margin-small-bottom">
                        <a class="uk-margin-remove uk-text-white" href="{{ url(get_newstype($row->news_type)['uri'] .'/'. splitTimeStamp($row->created_at,$row->uri) ) }}">{{$row->news_title }}</a>
                     </h1>
                  </div>
               </div>
            </div>
         </div>
      </div>
       @endforeach
    @endif
      <!--  -->
    
   </div>
    <!-- ad -->
    @php
   $position = 8;
   @endphp
   @if( advertisement($position) )
    <div class="uk-margin-medium-top uk-text-center uk-advertisement">
      <a href="{{advertisement($position)->client_link}}"><img data-src="{{ asset( env('PUBLIC_PATH') . '/uploads/advertisement/' . advertisement($position)->add_image ) }}" alt="" width="1800" uk-img></a>
   </div>
   @endif    
   <!-- ad -->   
</div>
</section>
<!-- section end -->
@endsection