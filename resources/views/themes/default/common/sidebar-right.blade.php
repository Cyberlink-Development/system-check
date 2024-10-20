<div class="uk-width-1-4@m ">

   <!-- ad -->
   @php
      $position = 21;
      @endphp
      @if( advertisement($position) )
   <div class="ad-aside uk-text-center uk-margin-bottom">
      <a href="{{advertisement($position)->client_link}}" target="_blank"><img src="{{ asset( env('PUBLIC_PATH') . '/uploads/advertisement/' . advertisement($position)->add_image ) }}" alt=""></a>
   </div>
      @endif   
   <!-- ad -->
    <!-- ad -->
   @php
      $position = 22;
      @endphp
      @if( advertisement($position) )
   <div class="ad-aside uk-text-center uk-margin-bottom">
      <a href="{{advertisement($position)->client_link}}" target="_blank"><img src="{{ asset( env('PUBLIC_PATH') . '/uploads/advertisement/' . advertisement($position)->add_image ) }}" alt=""></a>
   </div>
      @endif   
   <!-- ad -->
     <!--  -->
   <div class="uk-trending bg-white uk-margin-medium-bottom uk-border-rounded bg-light">
      <div class="uk-trending-header bg-secondary">ट्रेन्डिङ</div>
      <div class="uk-trending-body uk-box-shadow-medium uk-background-white">
         <ul class="uk-trending-list">
              @if($trending->count() > 0)
                      @foreach($trending as $row)
            <li class="uk-trending-item">
               <a href="{{ url(get_newstype($row->news_type)['uri'] .'/'. splitTimeStamp($row->created_at,$row->uri) ) }}">
                  <div class="uk-flex uk-flex-middle">
                     <div class="uk-trending-number uk-text-bold">{{ $loop->iteration }}</div>
                     <div class="uk-trending-caption">{{ $row->news_title }}</div>
                  </div>
               </a>
            </li>
             @endforeach
            @endif
         </ul>
      </div>
   </div>
   <!--  -->
 <!-- ad -->
   @php
      $position = 23;
      @endphp
      @if( advertisement($position) )
   <div class="ad-aside uk-text-center uk-margin-bottom">
      <a href="{{advertisement($position)->client_link}}" target="_blank"><img src="{{ asset( env('PUBLIC_PATH') . '/uploads/advertisement/' . advertisement($position)->add_image ) }}" alt=""></a>
   </div>
      @endif   
   <!-- ad -->
 <!-- ad -->
   @php
      $position = 24;
      @endphp
      @if( advertisement($position) )
   <div class="ad-aside uk-text-center uk-margin-bottom">
      <a href="{{advertisement($position)->client_link}}" target="_blank"><img src="{{ asset( env('PUBLIC_PATH') . '/uploads/advertisement/' . advertisement($position)->add_image ) }}" alt=""></a>
   </div>
      @endif   
   <!-- ad -->
    <!-- ad -->
   @php
      $position = 25;
      @endphp
      @if( advertisement($position) )
   <div class="ad-aside uk-text-center uk-margin-bottom">
      <a href="{{advertisement($position)->client_link}}" target="_blank"><img src="{{ asset( env('PUBLIC_PATH') . '/uploads/advertisement/' . advertisement($position)->add_image ) }}" alt=""></a>
   </div>
      @endif   
   <!-- ad -->
    <!-- ad -->
   @php
      $position = 26;
      @endphp
      @if( advertisement($position) )
   <div class="ad-aside uk-text-center uk-margin-bottom">
      <a href="{{advertisement($position)->client_link}}" target="_blank"><img src="{{ asset( env('PUBLIC_PATH') . '/uploads/advertisement/' . advertisement($position)->add_image ) }}" alt=""></a>
   </div>
      @endif   
   <!-- ad -->
    <!-- ad -->
   @php
      $position = 27;
      @endphp
      @if( advertisement($position) )
   <div class="ad-aside uk-text-center uk-margin-bottom">
      <a href="{{advertisement($position)->client_link}}" target="_blank"><img src="{{ asset( env('PUBLIC_PATH') . '/uploads/advertisement/' . advertisement($position)->add_image ) }}" alt=""></a>
   </div>
      @endif   
   <!-- ad -->
            
</div>