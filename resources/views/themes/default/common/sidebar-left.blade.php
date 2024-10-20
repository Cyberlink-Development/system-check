<div class="uk-width-1-3@m ">
   <!--  -->
   <div class="uk-author ">
      <div class="uk-flex uk-flex-middle uk-grid-small uk-margin-small-bottom" uk-grid>
         <div class="uk-text-bold">
            <div>
               <div class="uk-media-author-sm  uk-align-center uk-margin-remove-bottom">
                   <a href="{{ route('page.profile',postby($data->content_writer)->uri)}}">
                  @if( postby($data->content_writer)->thumbnail)
                  <img src="{{ asset('uploads/original/' . postby($data->content_writer)->thumbnail) }}" alt="">
                  @else
                 <img src="{{ asset('themes-assets') }}/images/avatar.jpg" alt="">
               @endif

               </a>
               </div>
            </div>
         </div>
         <div>
            <a href="{{ route('page.profile',postby($data->content_writer)->uri)}}" class="text-primary f-w-600 f-18  uk-margin-remove uk-display-block">{{ postby($data->content_writer)->name }}</a>
            <span class="uk-display-block f-w-600 f-15 uk-margin-remove">{{ designation($data->content_writer)->title }}</span> 
         </div>
      </div>
      <hr class="uk-divider-icon uk-margin-remove">
      <div class="uk-padding-small">
         <h5 class="uk-text-bold text-primary">{{ postby($data->content_writer)->name }}का अन्य रिपोर्टहरु :</h5>
         <ul class="uk-theme-list uk-list-divider">
            @if($writer_news->count()>0)
            @foreach($writer_news as $row)
             <?php 
               if($row->uri == $_uri){
                  continue;
               } ?>
            <li> <a href="{{ url(get_newstype($row->news_type)['uri'] .'/'. splitTimeStamp($row->created_at,$row->uri) ) }}">{{ $row->news_title }}</a> 
            </li>
           @endforeach
           @endif
         </ul>
         <div class="uk-padding-small uk-border-top uk-margin-small-top">
            <a href="{{ route('page.profile',postby($data->content_writer)->uri)}}" class="f-w-600 text-primary">सबै हेर्नुहोस् 
            <span class="uk-icon" uk-icon="icon: triangle-right; "></span>
            </a>
         </div>
      </div>
   </div>
   <!--  -->
</div>