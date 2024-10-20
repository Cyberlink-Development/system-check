<!DOCTYPE html>
<html>
   <head>
      <title>@yield('title') {{$setting->site_name}}</title>
      <meta charset="utf-8">
      <meta name="keywords" content="@yield('meta_keyword') - System Check Nepal">
      <meta name="description" content="@yield('meta_description') -System Check Nepal">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="{{ asset('themes-assets') }}/css/app.css" />
      <link rel="icon" href="{{ asset('themes-assets') }}/images/favicon.png">
      <meta name="theme-color" content="#1cb2d8">
     <script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=60cac9a1ed0412001c7f52cd&product=sop' async='async'></script>
        <!--  -->
   <meta property="og:title" content="@yield('title')">
   <meta property="og:description" content="@yield('news_excerpt')">
    @if (trim($__env->yieldContent('news_thumbnail')))
    <meta property="og:image" content="{{ asset('uploads/original/' ) }}/@yield('news_thumbnail')" />
    @else
    <meta property="og:image" content="{{asset('/themes-assets')}}/images/logo.png" />
    @endif
  <meta property="og:url" content="@yield('meta_keyword')" />
  <meta property="og:description" content="@yield('meta_description') " />
  {{-- <meta property="og:site_name" content="systemchecknepal.com" /> --}}
  <meta property="og:image:width" content="1000" />
   <meta property="og:image:height" content="600" />
  <!--  -->

    <meta name="twitter:card" content="summary_large_image" />
   <meta name="twitter:site" content="" />
  <!--  -->
   </head>
   <body>
      <header id="header" class="bg-white">
         <!-- start offcanvas menu -->
         <div id="offcanvas-reveal" uk-offcanvas="  flip: true;  overlay: true;">
            <div class="uk-offcanvas-bar uk-dark uk-offcanvas-bar-white uk-padding-remove  uk-box-shadow-medium">
               <div class="uk-margin-remove uk-position-relative uk-border-bottom uk-padding-small">
                  <button class="uk-offcanvas-close uk-close-large" type="button" uk-close></button>
                  <a class="uk-navbar-item uk-background-white uk-padding-small" href="{{url('/')}}">
                  <img src="{{asset('/themes-assets')}}/images/logo.png" alt="Logo" class="uk-logo-light" width="80">
                  <span class="text-black uk-text-bold">SYSTEM CHECK NEPAL</span>
                  </a>
               </div>
               <div>
                  <nav>
                      @if($mobile_menu->count() > 0)
                     <ul class="uk-navsidebar  uk-nav-parent-icon uk-nav-left uk-margin-auto-vertical" uk-nav="multiple: false">
                        <li><a href="{{url('/')}}">होमपेज</a></li>
                         @foreach($mobile_menu as $row)   
                        <li><a href="{{ route('news.newstype',$row->uri) }}">{{ $row->news_type }} </a></li>
                        @endforeach
                     </ul>
                     @endif
                  </nav>
               </div>
               <!-- social icon -->
               <div class="uk-position-relative">
                  <div>
                     <div class="uk-padding-small bg-primary uk-margin-large-top">
                        <ul class="uk-grid-small  uk-flex-center" uk-grid>
                           <li><a class="uk-link  uk-margin-small-right" target="_blank" href="{{$setting->facebook_link}}" uk-icon="icon: facebook;"></a></li>
                           <li><a class="uk-link  uk-margin-small-right" target="_blank" href="{{$setting->twitter_link}}" uk-icon="icon: twitter;"></a></li>
                           <li><a class="uk-link  uk-margin-small-right" target="_blank" href="{{$setting->youtube_link}}" uk-icon="icon: youtube;"></a></li>
                        </ul>
                     </div>
                  </div>
               </div>
               <!-- end social icon -->
            </div>
         </div>
         <!-- end offcanvas menu -->
         <!-- mobile top menu -->
         <div class="uk-header-mobile uk-border-bottom uk-hidden@m   bg-white uk-padding-small uk-padding-remove-left  uk-padding-remove-right">
            <div class="" uk-sticky="" show-on-up="" animation="uk-animation-slide-top" cls-active="uk-navbar-sticky" sel-target=".uk-navbar-container" class="uk-sticky">
               <div class="uk-navbar-container">
                  <nav uk-navbar="" class="uk-navbar">
                     <div class="uk-navbar-left">
                        <a href="{{url('/')}}" class="uk-navbar-item uk-logo">
                        <img alt="" src="{{asset('/themes-assets')}}/images/logo.png" width="100">
                         <!--<span class="text-black uk-text-bold">SYSTEM CHECK NEPAL</span>-->
                        </a>
                     </div>
                     <div class="uk-navbar-center">
                     </div>

                     <div class="uk-navbar-right">
                        <a class="uk-navbar-toggle" uk-toggle="target: #offcanvas-reveal">
                           <div uk-navbar-toggle-icon="" class="uk-icon uk-navbar-toggle-icon"></div>
                        </a>
                     </div>
                  </nav>
               </div>
            </div>
         </div>
         <!-- end mobile top menu -->
         <!-- top logo section -->
         <div class="header-top uk-visible@m uk-header-overlay">
            <div class="uk-container ">
                 <div class="uk-container uk-container-center">
                   <div class="uk-child-width-1-2@l uk-child-width-1-2@m  uk-child-width-1-2@s uk-grid uk-flex-middle">
                      <div class="uk-logo">
                         <a href="{{url('/')}}" title="">
                            <img src="{{asset('/themes-assets')}}/images/logo.png" alt="" width="120">
                              <span class="uk-text-bold uk-margin-remove uk-h2">SYSTEM CHECK NEPAL</span>
                         </a> 
                        </div>
                      <div class="uk-visible@s ">
                         <div class="uk-text-right su-header-right uk-margin-top  ">
                           <p class="nepali-date"></p>
                            <div class=" ">
                              
                               <a href="{{$setting->facebook_link}}" class="uk-icon-button uk-facebook uk-margin-small-right uk-icon" uk-icon="facebook"></a>
                               <a href="{{$setting->twitter_link}}" class="uk-icon-button uk-twitter uk-margin-small-right uk-icon" uk-icon="twitter"></a>                              
                               <a href="{{$setting->youtube_link}}" class="uk-icon-button uk-youtube uk-icon" uk-icon="youtube"> </a>
                            </div>
                            
    
                         </div>
                      </div>
                   </div>
                </div>
            </div>
         </div>
         <!-- end top logo section -->
         <!-- start main menu -->
         <div class="uk-h-sticky uk-visible@m" uk-sticky="top: 200; animation:uk-animation-fade uk-animation-slow uk-transform-origin-bottom-center">
         <div class="  uk-inner-navigation navbar-container uk-position-relative ">
            <div class="uk-container">
               <nav class="uk-navbar" uk-navbar="">
                  <div class="uk-navbar-left">
                       @if($navigations->count() > 0)
                     <ul class="uk-navbar-nav uk-position-relative">
                        <li><a href="{{url('/')}}"><span uk-icon="home"></span> &nbsp;&nbsp; होमपेज</a></li>
                          @foreach($navigations as $row)   
                        <li><a href="{{ route('news.newstype',$row->uri) }}">{{ $row->news_type }}</a></li>
                         @endforeach
                     </ul>
                     @endif
                  </div>
                  <div class="uk-navbar-right">
                     <ul class="uk-navbar-nav uk-text-muted uk-flex uk-flex-middle">
                        <li>
                           <!-- <button class="uk-navbar-toggle" uk-toggle="target: #offcanvas-reveal" uk-navbar-toggle-icon></button> -->
                           <a class="uk-small-menu uk-margin-small-left" uk-toggle="target: #offcanvas-reveal">
                              <span class="uk-menu-trigger">
                              <span></span>
                              <span></span>
                              <span></span>
                              </span>
                           </a>
                        </li>
                     </ul>
                  </div>
               </nav>
            </div>
         </div>
         <!-- end main menu -->
      </header>
      <!-- /header -->

  
      <main>