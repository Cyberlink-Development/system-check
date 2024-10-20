<!DOCTYPE html>
<html>

<head>
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <title> {{ config('app.name', '') }} - @yield('title') </title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="Cyberlink">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Font CSS (Via CDN) -->
    <link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,600'>
    @yield('additional-css')

    <link rel="stylesheet" type="text/css"
        href="{{ asset(env('PUBLIC_PATH') . '/vendor/plugins/datatables/media/css/dataTables.bootstrap.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset(env('PUBLIC_PATH') . '/vendor/plugins/datatables/media/css/dataTables.plugins.css') }}">

    <!-- Theme CSS -->
    <link rel="stylesheet" type="text/css"
        href="{{ asset(env('PUBLIC_PATH') . '/assets/skin/default_skin/css/theme2.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset(env('PUBLIC_PATH') . '/assets/skin/default_skin/css/theme3.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset(env('PUBLIC_PATH') . '/assets/skin/default_skin/css/theme.css') }}">

    <!-- Admin Forms CSS -->
    <link rel="stylesheet" type="text/css"
        href="{{ asset(env('PUBLIC_PATH') . '/assets/admin-tools/admin-forms/css/admin-forms.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset(env('PUBLIC_PATH') . '/assets/css/nepaliDatePicker.css') }}">
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset(env('PUBLIC_PATH') . '/themes-assets/images/favicon.ico') }}">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
  <![endif]-->
    {{-- <script src="https://cdn.tiny.cloud/1/d5it5z5z4vyaoj48v3nz02sn4etqj4r5morigf2utrpbdhns/tinymce/5/tinymce.min.js"
        referrerpolicy="origin"></script> --}}
    <script src="{{ asset('js/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
    <script>
        var editor_config = {
            path_absolute: "/",
            selector: 'textarea.testEditor',
            relative_urls: false,
            plugins: 'code table lists advlist charmap emoticons fullscreen hr image insertdatetime link media nonbreaking pagebreak paste preview print searchreplace spellchecker tabfocus toc visualblocks visualchars wordcount fontfamily fontsize style',
            toolbar: 'undo redo | blocks | bold italic underline removeformat | fontfamily fontsize style | alignleft aligncenter alignright alignjustify | indent outdent | bullist numlist | link unlink image media code hr | table fullscreen insertdatetime',
            toolbar_mode: 'sliding',
            force_br_newlines: false,
            force_p_newlines: false,
            forced_root_block: '',
            cleanup: true,
            remove_linebreaks: true,
            convert_newlines_to_brs: false,
            inline_styles: false,
            entity_encoding: 'raw',
            paste_auto_cleanup_on_paste: true,
            entities: '160,nbsp,38,amp,60,lt,62,gt',

            file_picker_callback: function(callback, value, meta) {
                var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName(
                    'body')[0].clientWidth;
                var y = window.innerHeight || document.documentElement.clientHeight || document
                    .getElementsByTagName('body')[0].clientHeight;

                var cmsURL = editor_config.path_absolute + 'laravel-filemanager?editor=' + meta.fieldname;
                if (meta.filetype == 'image') {
                    cmsURL = cmsURL + "&type=Images";
                } else {
                    cmsURL = cmsURL + "&type=Files";
                }

                tinyMCE.activeEditor.windowManager.openUrl({
                    url: cmsURL,
                    title: 'Filemanager',
                    width: x * 0.8,
                    height: y * 0.8,
                    resizable: "yes",
                    close_previous: "no",
                    onMessage: (api, message) => {
                        callback(message.content);
                    }
                });
            }
        };

        tinymce.init(editor_config);
    </script>
    <style>
        .tox-editor-container .tox-promotion {
            visibility: hidden !important;
        }
    </style>

    <style>
        .tox-editor-container .tox-promotion {
            visibility: hidden !important;
        }
    </style>


</head>

<body class="dashboard-page sb-l-o sb-r-c">
    <!-- Start: Main -->
    <div id="main">
        <!-- Start: Header -->
        <header class="navbar navbar-fixed-top">
            <div class="navbar-branding">
                <a class="navbar-brand" href="{{ url('/') }}" target="_blank">
                    Visit Site
                </a>
                <span id="toggle_sidemenu_l" class="ad ad-lines"></span>
            </div>

            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle fw600 p15" data-toggle="dropdown">
                        <img src="{{ asset('/themes-assets/images/users.jpg') }}" alt="avatar"
                            class="mw30 br64 mr15">
                        {{ Auth::user()->name }}
                        <span class="caret caret-tp hidden-xs"></span>
                    </a>
                    <ul class="dropdown-menu list-group dropdown-persist w250" role="menu">
                        <li><a href="{{ route('admin.userprofile') }}">User Profile</a></li>
                        <!--<li><a href="{{ route('admin.changepassword') }}">Change Password </a></li>-->
                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                        @else
                            <li class="dropdown-footer">
                                <a class="animated animated-short fadeInUp" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
                                    <span class="fa fa-power-off pr5"></span>
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        @endguest
                    </ul>
                </li>
            </ul>
        </header>

        <!-- Start: Sidebar Left -->
        @include('admin.common.sidebar')
        <section id="content_wrapper">
            <header id="topbar">
                <div class="topbar-left">
                    <!-- <ol class="breadcrumb">
           <li class="crumb-active">
              <a href="{{ url('dashboard') }}">Dashboard</a>
            </li>
           <li class="crumb-link">
              <a href="{{ url('dashboard') }}">Home</a>
            </li>
            <li class="crumb-trail"> Dashboard </li>
          </ol> -->
                </div>
                <div class="topbar-right">
                    @yield('breadcrumb')
                </div>
            </header>



            @include('admin.common.notification')
            @include('admin.common.message')
            @yield('content')
        </section>
    </div>
    <!-- End: Main -->
    <!-- jQuery -->
    <script src="{{ asset(env('PUBLIC_PATH') . '/vendor/jquery/jquery-1.11.1.min.js') }}"></script>
    <script src="{{ asset(env('PUBLIC_PATH') . '/vendor/jquery/jquery_ui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset(env('PUBLIC_PATH') . '/assets/js/jquery.nepaliDatePicker.js') }}"></script>

    <!-- Bootstrap Maxlength plugin -->
    <script src="{{ asset(env('PUBLIC_PATH') . '/vendor/plugins/maxlength/bootstrap-maxlength.min.js') }}"></script>

    <script src="{{ asset(env('PUBLIC_PATH') . '/vendor/plugins/datatables/media/js/jquery.dataTables.js') }}"></script>
    <script
        src="{{ asset(env('PUBLIC_PATH') . '/vendor/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js') }}">
    </script>
    <script
        src="{{ asset(env('PUBLIC_PATH') . '/vendor/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js') }}">
    </script>
    <script src="{{ asset(env('PUBLIC_PATH') . '/vendor/plugins/datatables/media/js/dataTables.bootstrap.js') }}"></script>

    <!-- Theme Javascript -->
    <script src="{{ asset(env('PUBLIC_PATH') . '/assets/js/utility/utility.js') }}"></script>
    <script src="{{ asset(env('PUBLIC_PATH') . '/assets/js/demo/demo.js') }}"></script>
    <script src="{{ asset(env('PUBLIC_PATH') . '/assets/js/main.js') }}"></script>

    @yield('scripts')



    <script src="https://www.google.com/recaptcha/api.js?render={{ env('SITE_KEY') }}"></script>
    <script>
        grecaptcha.ready(function() {
            grecaptcha.execute('<?php echo env('SITE_KEY'); ?>', {
                action: 'homepage'
            }).then(function(token) {
                document.getElementById('g_recaptcha_response').value = token;
            });
        });
    </script>
    <!--  -->
    <script type="text/javascript">
        jQuery(document).ready(function() {

            "use strict";

            // Init Theme Core    
            Core.init();

            // Init Demo JS  
            //Demo.init();

            $('#datatable3').dataTable({
                "order": [
                    [2, "desc"]
                ],
                "aoColumnDefs": [{
                    'bSortable': false,
                    'aTargets': [-1]

                }],
                "oLanguage": {
                    "oPaginate": {
                        "sPrevious": "Previous",
                        "sNext": "Next"
                    }
                },
                "iDisplayLength": 30,
                "aLengthMenu": [
                    [5, 10, 25, 50, -1],
                    [5, 10, 25, 50, "All"]
                ],
                "sDom": '<"dt-panelmenu clearfix"Tfr>t<"dt-panelfooter clearfix"ip>',
                "oTableTools": {
                    "sSwfPath": "{{ env('PUBLIC_PATH') }}/vendor/plugins/datatables/extensions/TableTools/swf/copy_csv_xls_pdf.swf"
                }
            });

            $("#date-picker").nepaliDatePicker({
                dateFormat: "%y %M %d",
                closeOnDateSelect: true
            });

        });
    </script>
</body>

</html>
