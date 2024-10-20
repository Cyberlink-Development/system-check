</main>
<footer>
    <div class="custom">
        <div class="bg-primary uk-section uk-section-small uk-light">
            <div class="uk-container">
                <div class="uk-margin-medium">
                    <div class="uk-grid-divider uk-grid" uk-grid="">
                        <div class="uk-width-1-4@m">
                            <h4 class="uk-h5 f-w-600 uk-margin-small uk-text-left@s uk-text-center">हाम्रो बारेमा</h4>
                            <div class="uk-margin uk-margin-remove-top uk-text-left@s uk-text-center">
                                {{ $setting->welcome_text }}
                            </div>

                            <div class="uk-child-width-auto uk-grid-small uk-flex-left uk-grid uk-flex-left@s uk-flex-center"
                                uk-grid="">
                                @if ($setting->facebook_link)
                                    <div>
                                        <a href="{{ $setting->facebook_link }}" target="_blank" rel="noopener"
                                            class="el-link uk-icon-button uk-icon" uk-icon="icon: facebook;">
                                        </a>
                                    </div>
                                @endif
                                @if ($setting->twitter_link)
                                    <div>
                                        <a href="{{ $setting->twitter_link }}" target="_blank" rel="noopener"
                                            class="el-link uk-icon-button uk-icon" uk-icon="icon: twitter;">
                                        </a>
                                    </div>
                                @endif
                                @if ($setting->youtube_link)
                                    <div>
                                        <a href="{{ $setting->youtube_link }}" target="_blank" rel="noopener"
                                            class="el-link uk-icon-button uk-icon" uk-icon="icon: youtube;">
                                        </a>
                                    </div>
                                @endif
                            </div>

                        </div>
                        <div class="uk-width-1-4@m">


                            <h4 class="uk-h5 f-w-600 uk-margin-small uk-text-left@s uk-text-center">सहकार्यको लागि
                                सम्पर्क</h4>
                            <div class="uk-margin uk-margin-remove-top uk-text-left@s uk-text-center">
                                <span class="f-20"><a
                                        href="tel:{{ $setting->phone2 }}">{{ $setting->phone2 }}</a></span><br>
                                <span><a
                                        href="mailto:{{ $setting->email_secondary }}">{{ $setting->email_primary }}</a></span><br>
                                <!--<span><b><a href="{{ route('page.pagedetail', 'donation') }}">Donation details</a></b></span>-->
                            </div>

                            <div class="uk-margin uk-margin-remove-top uk-text-left@s uk-text-center">
                                Address <a href="#" target="_blank">{{ $setting->address }}</a><br>
                                <b>Phone:</b> <a href="tel:{{ $setting->phone }}">{{ $setting->phone }}</a><br>
                                <b>Email:</b> <span><a
                                        href="mailto:{{ $setting->email_primary }}">{{ $setting->email_primary }}</a></span>
                            </div>
                        </div>
                        <div class="uk-width-1-4@m">

                            <div class="uk-margin">
                                <div class="uk-child-width-1-1  uk-grid" uk-grid="">
                                    <!--  -->
                                    <div>
                                        <div class="uk-panel">
                                            <div><strong>अध्यक्ष </strong><br>
                                                <span>कोमल कुमारी पाण्डे </span>
                                            </div>
                                        </div>

                                        <div class="uk-panel uk-margin-top">
                                            <div><strong>प्रकाशक/सम्पादक </strong><br>
                                                <span>मनोज के.सी. </span>
                                            </div>
                                        </div>


                                    </div>
                                    <!--  -->


                                </div>
                            </div>
                        </div>
                        <div class="uk-width-1-4@m">

                            <div class="uk-margin">
                                <div class="uk-child-width-1-2@m uk-grid-small" uk-grid="">
                                    @if ($mobile_menu->count() > 0)
                                        @foreach ($mobile_menu as $row)
                                            <a href="{{ route('news.newstype', $row->uri) }}">{{ $row->news_type }}
                                            </a>
                                        @endforeach
                                    @endif
                                    <div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="uk-section uk-section-xsmall">
        <div class=" uk-text-small uk-text-center">{!! $setting->copyright_text !!} </div>
    </div>

    <a href="#" id="BackToTop" uk-scroll="" uk-totop class="show">
    </a>
</footer>

<!--  -->
<script src="{{ asset('themes-assets') }}/js/app.js"></script>
</body>

</html>
