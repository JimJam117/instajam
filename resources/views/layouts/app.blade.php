<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>InstaJam | @yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>

<script>
  var editor_config = {
    forced_root_block : false,
    path_absolute : "/",
    selector: "textarea",
    plugins: [
      "advlist autolink lists link image charmap print preview hr anchor pagebreak",
      "searchreplace wordcount visualblocks visualchars code fullscreen",
      "insertdatetime media nonbreaking save table contextmenu directionality",
      "emoticons template paste textcolor colorpicker textpattern"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
    relative_urls: false,
    file_browser_callback : function(field_name, url, type, win) {
      var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
      var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

      var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
      if (type == 'image') {
        cmsURL = cmsURL + "&type=Images";
      } else {
        cmsURL = cmsURL + "&type=Files";
      }

      tinyMCE.activeEditor.windowManager.open({
        file : cmsURL,
        title : 'Filemanager',
        width : x * 0.8,
        height : y * 0.8,
        resizable : "yes",
        close_previous : "no"
      });
    }
  };

  tinymce.init(editor_config);
</script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        .profile-link {
            display: flex;
            transition: 0.2s;
            color: #212529;
            padding: 1em;
            overflow: hidden;
        }

        .profile-link:hover {
            text-decoration: none;
            background-color: #3490dc;
            color: #fff;
        }



        .profile-link img,
        .profile-img {
            border-radius: 100%;
            width: 100%;
            flex-direction: column;
            justify-content: center;
            margin: auto;
        }


        .posts-display {
            display: grid;
            grid-template-columns: 33% 33% 33%;
            grid-auto-rows: 33vw;
            width: 100%;
        }

        .post-display {
            margin: 1em;
            background: #dddddd;
            background-position-x: 0%;
            background-position-y: 0%;
            background-repeat: repeat;
            background-image: none;
            background-size: auto;
            overflow: hidden;
            border-radius: 0;
            box-shadow: 0 7px 5px 1px grey;
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
            transition: 0.2s;
        }

        .post-display-filter{
          width: 100%;
          height: 100%;
          transition: 0.2s;
          text-align: center;
        }
        .post-display-filter h2{
          opacity: 0;
          padding-top: 1em;
          color: #eee;
        }
        .post-display-filter:hover{
          background-color: #00000050;

        }
        .post-display-filter:hover *{
          opacity: 1;
        }


        /*Breakpoints*/

        @media screen and (max-width: 1200px) {

        }


        @media screen and (max-width: 992px) {

            .posts-display{
              grid-template-columns: 50% 50%;
              grid-auto-rows: 50vw;
            }
        }


        @media screen and (max-width: 768px) {

        }


        @media screen and (max-width: 576px) {


            .home-col {
                -webkit-box-flex: 0;
                flex: 0 0 100%;
                max-width: 100%;
            }
            .profile-details{
              margin: 1em 0;
              flex-direction: column;
            }
            .profile-img{
              width: 50%;
            }
            .profile-link-img-container{
              display: none;
            }

            .posts-display{
              grid-template-columns: 100%;
              grid-auto-rows: 100vw;
            }
        }
    </style>

</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand d-flex" href="{{ url('/') }}">
                    <img src="/ico/jam.ico" alt="" style="height: 25px; padding-right:10px;">
                    <div class="">
                        InstaJam
                    </div>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->username }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

</html>
