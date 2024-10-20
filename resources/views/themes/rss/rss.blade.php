<rss version="2.0"
xmlns:content="http://purl.org/rss/1.0/modules/content/">
  <channel>
    <title>{{$setting->site_name}}</title>
    <link>https://arghakhanchibulletin.com/rssfeed</link>
    <description>
      {{$setting->meta_key}}
    </description>
    <language>en-us</language>
    <lastBuildDate>{{ now() }}</lastBuildDate>
    @foreach($posts as $post)
    <item>
      <title>{{ $post->news_title }}</title>
      <link>{{ url(get_newstype($post->news_type)['uri'] .'/'. splitTimeStamp($post->created_at,$post->uri) ) }}</link>
      <guid>{{ $post->id }}</guid>
      <pubDate>{{ $post->created_at->toRssString() }}</pubDate>    
       
      <description>{{ $post->meta_description }}</description>
      <content:encoded>
        <![CDATA[
        <!doctype html>
        <html lang="en" prefix="op: http://media.facebook.com/op#">
          <head>
            <meta charset="utf-8">
            <link rel="canonical" href="{{ url(get_newstype($post->news_type)['uri'] .'/'. splitTimeStamp($post->created_at,$post->uri) ) }}">
            <meta property="op:markup_version" content="v1.0">
            <meta charset="utf-8">            
                  
             <meta property="og:title" content="{{ $post->seo_title }}">
               <meta property="og:description" content="{{ $post->meta_description }}">
              @if($post->news_thumbnail)
               <meta property="og:image" content="{{ asset( env('PUBLIC_PATH') . '/uploads/original/' . $post->news_thumbnail ) }}" />
               @endif
          </head>
          <body>
            <article>
              <header>
                {{ $post->news_title }}
              </header>
              @if($post->news_thumbnail)
                <figure>
                <img src="{{ asset( env('PUBLIC_PATH') . '/uploads/original/' . $post->news_thumbnail ) }}" />
                </figure> 
                @endif
              {!! $post->news_content !!}
                <!--fb ad-->
                <figure class="op-ad">
               <iframe height="300" width="250" style="border:0; margin:0;" src="https://www.facebook.com/adnw_request?placement=2314482868859447_2484534121854320&adtype=banner300x250"></iframe>
               </figure>
               <!--fb ad-->
               
              <footer>
                <small>&copy; Arghakhanchibulletin.com</small>
              </footer>
            </article>
          </body>
        </html>
        ]]>
      </content:encoded>
    </item>
     @endforeach
   
    
  </channel>
</rss>