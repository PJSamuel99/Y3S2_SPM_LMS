<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>The Book</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">

    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.2.7/raphael.min.js"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset ('../assets/chart/morris.js-0.6.4/morris.css') }}">
    <link href="{{ asset('../main.8d288f825d8dffbbe55e.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.min.js"></script>
    <!-- .....................sweat alert..................... -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <!-- ..................end sweat alert..................... -->

    <script>
        $(document).ready(function() {

            $("#dob").datepicker({
                format: 'yyyy-mm-dd'
            });

            $('.close').hide();
        });
    </script>


    <style>
        .rwd-table {
            margin: auto;
            min-width: 300px;
            max-width: 100%;
            border-collapse: collapse;
        }

        .custom-txt-right {
            text-align: right !important;
        }

        .rwd-table tr:first-child {
            border-top: none;
            color: #495057;

        }

        .rwd-table td {
            border-top: 0 !important;

        }

        .rwd-table th {
            display: none;
        }

        .rwd-table td {
            display: block;
        }

        .rwd-table td:first-child {
            margin-top: .5em;
        }

        .rwd-table td:last-child {
            margin-bottom: .5em;
        }

        .rwd-table td:before {
            content: attr(data-th) "";
            font-weight: bold;
            width: 120px;
            display: inline-block;
            color: #495057;
        }


        .rwd-table th,
        .rwd-table td {
            text-align: left;
        }

        .rwd-table {
            color: #333;
            border-radius: .4em;
            overflow: hidden;
        }

        .rwd-table tr {
            border-color: #bfbfbf;
        }

        .rwd-table th,
        .rwd-table td {
            padding: .5em 1em;
        }

        @media screen and (max-width: 601px) {
            .rwd-table tr:nth-child(2) {
                border-top: none;
            }

            .rwd-table td:nth-of-type(1) {
                background-color: #495057;
                color: white;
                display: grid;
            }

            .rwd-table td:nth-of-type(1):before {
                content: "" !important;
            }

            .custom-txt-right {
                text-align: left !important;
            }
        }

        @media screen and (min-width: 600px) {
            .rwd-table tr:hover:not(:first-child) {
                background-color: #d8e7f3;
            }

            .rwd-table td:before {
                display: none;
            }

            .rwd-table th,
            .rwd-table td {
                display: table-cell;
                padding: .25em .5em;
            }

            .rwd-table th:first-child,
            .rwd-table td:first-child {
                padding-left: 0;
            }

            .rwd-table th:last-child,
            .rwd-table td:last-child {
                padding-right: 0;
            }

            .rwd-table th,
            .rwd-table td {
                padding: 0.3em !important;
            }
        }

        #loader {

            position: fixed;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background: url(/images/pageloader/puzzle.gif) center no-repeat #fff;
        }

        .center {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            margin: auto;
        }

        span.field-icon_1,
        span.field-icon_2,
        span.field-icon_3 {

            cursor: pointer;
        }

        .custom-agentwise {

            cursor: pointer;

        }

        .tfoot td {
            background: 0 0;
            border-bottom: none;
            white-space: nowrap;
            text-align: right;
            padding: 10px 20px;
            font-size: 1.2em;
            border: none;
            border-top: 1px solid #aaa
        }

        .tfoot tr:first-child td {
            border-top: none;
            border: none;

        }

        .tfoot tr:last-child td {
            color: #3989c6;
            font-size: 1.4em;
            border: none;
            border-top: 1px solid #3989c6
        }

        .tfoot tr td:first-child {
            border: none;
        }

        .tbody tr:last-child td {
            border: none
        }
    </style>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
</head>

<body>
    <div id="loader" class="center"></div>
    <div class="app-container app-theme-white body-tabs-shadow fixed-header fixed-sidebar">
        <div class="app-header header-shadow" style=" background-image: linear-gradient(to right, #141e30, #243b55) !important; ">
            <div class="app-header__logo">
                <div class="logo-src"></div>
                <div class="header__pane ml-auto">
                    <div>
                        <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="app-header__mobile-menu">
                <div>
                    <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
            <div class="app-header__menu">
                <span>
                    <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                        <span class="btn-icon-wrapper">
                            <i class="fa fa-ellipsis-v fa-w-6"></i>
                        </span>
                    </button>
                </span>
            </div>
            <div class="app-header__content">

                @if(isset($key))
                @if($key == 1)

                <div class="app-header-left">
                    <form action="{{ route('user.index')  }}" method="GET" class="row m-0">
                        <div class="search-wrapper active">
                            <div class="input-holder">
                                <input type="text" class="search-input" name="query" value="{{$query}}" style="color: #a7b6c5;font-weight: bold;" placeholder="Type to search">
                                <button class="search-icon"><span></span></button>
                            </div>
                            <button type="submit" class="close"></button>
                        </div>
                    </form>
                </div>
                @endif

                @endif

                <div class="app-header-right">
                    <div class="dropdown">
                        <a class="d-n full-scrren-home-icon" href="{{ URL::to('/dashboard') }}">
                            <button class="p-0 mr-2 btn b-cb">
                                <span class="icon-wrapper icon-wrapper-alt rounded-circle" style="color: white;">
                                    <span class="icon-wrapper-bg bg-focus"></span><i class="fa fa-home"></i>
                                </span>
                            </button>
                        </a>
                        <button type="button" class="p-0 mr-2 btn b-cb" onclick="toggleFullScreen()" style="color: white;">
                            <span class="icon-wrapper icon-wrapper-alt rounded-circle">
                                <span class="icon-wrapper-bg bg-focus"></span><i class="fas fa-expand"></i>
                            </span>
                        </button>
                    </div>
                    <div class="widget-content-left ml-3 header-user-info">
                        <div class="widget-heading"><a href="{{ route('user.profile',[Auth::user()->id]) }}"><b style="color: white;">{{ Auth::user()->name }}</b></a></div>
                        <div class="widget-subheading"><a style="color: #a7b6c5;">{{ Auth::user()->email }}</a></div>
                    </div>
                    <div class="header-btn-lg pr-0">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                                <b class="btn-pill btn-shadow btn-shine btn btn-focus" style="color: #ffff;"> {{ __('Logout') }} </b>
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="app-main">
            <div class="app-sidebar sidebar-shadow">
                <div class="app-header__logo">
                    <div class="logo-src"></div>
                    <div class="header__pane ml-auto">
                        <div>
                            <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="app-header__mobile-menu">
                    <div>
                        <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
                <div class="app-header__menu">
                    <span>
                        <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                            <span class="btn-icon-wrapper">
                                <i class="fa fa-ellipsis-v fa-w-6"></i>
                            </span>
                        </button>
                    </span>
                </div>
                <div class="scrollbar-sidebar">
                    <div class="app-sidebar__inner">
                        <ul class="vertical-nav-menu">
                            <li class="app-sidebar__heading">Dashboard</li>

                            <li>
                                <a href="/dashboard" class="{{ Request::routeIs('dashboard') ? 'mm-active' : '' }}">
                                    <i class="metismenu-icon pe-7s-home">
                                    </i>Dashboard
                                </a>
                            </li>

                         
                            <li class="app-sidebar__heading">Menu</li>
                            @if(auth()->user()->role == 1 || auth()->user()->role == 2) 
                            <li>
                                <a href="/user" class="{{ Request::routeIs('user.*') ? 'mm-active' : '' }}">
                                    <i class="metismenu-icon pe-7s-users">
                                    </i>Users
                                </a>
                            </li>
                            @endif

                            <li>
                                <a href="/dashboard">
                                    <i class="metismenu-icon pe-7s-users">
                                    </i>Member
                                </a>
                            </li>

                            <li>
                                <a href="/research-paper" class="{{ Request::routeIs('research-paper.*') ? 'mm-active' : '' }}">
                                    <i class="metismenu-icon pe-7s-users">
                                    </i>Research Paper
                                </a>
                            </li>

                            <li>
                                <a href="/subject" class="{{ Request::routeIs('subject.*') ? 'mm-active' : '' }}">
                                    <i class="metismenu-icon pe-7s-users">
                                    </i>Subject
                                </a>
                            </li>

                            <li>
                                <a href="/report" class="{{ Request::routeIs('report.*') ? 'mm-active' : '' }}">
                                    <i class="metismenu-icon pe-7s-users">
                                    </i>Reports
                                </a>
                            </li>

                           





                        </ul>
                    </div>
                </div>
            </div>
            <div class="app-main__outer">
                <div class="app-main__inner">

                    @yield('content')

                </div>
                <div class="app-wrapper-footer">
                    <div class="app-footer">
                        <div class="app-footer__inner">
                            <div class="copyrights">&copy;
                                <script>
                                    document.write(new Date().getFullYear())
                                </script>
                                <span id="year"></span>
                                The Book
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @yield('modals')
    <div id="object-browser-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="object-browser-title">Select</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body form-material" style="min-height:100vh;background:#eef5f9">
                    <input type="text" id="object-browser-search" placeholder="Search and Select" class="form-control" style="padding-left:20px;border-radius:10px" onkeyup="objectBrowser.search()" />


                    <div id="object-browser-loader" style="margin-top:100px;text-align:center">
                        <div class="spinner-grow text-success" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                        <div class="spinner-grow text-danger" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                        <div class="spinner-grow text-warning" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                        <div class="spinner-grow text-info" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>

                    <div class="row" id="object-browser-results" style="margin-top:10px;text-align:center;display:none">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="app-drawer-overlay d-none animated fadeIn"></div>

    <script>
        document.onreadystatechange = function() {
            if (document.readyState !== "complete") {
                document.querySelector("body").style.visibility = "hidden";
                document.querySelector("#loader").style.visibility = "visible";
            } else {
                document.querySelector("#loader").style.display = "none";
                document.querySelector("body").style.visibility = "visible";
            }
        };

        function toggleFullScreen() {
            if ($("#page-title").hasClass("full-screen-mode")) {
                if (document.exitFullscreen) {
                    document.exitFullscreen();
                } else if (document.mozCancelFullScreen) {
                    /* Firefox */
                    document.mozCancelFullScreen();
                } else if (document.webkitExitFullscreen) {
                    /* Chrome, Safari and Opera */
                    document.webkitExitFullscreen();
                } else if (document.msExitFullscreen) {
                    /* IE/Edge */
                    document.msExitFullscreen();
                }
                $("#page-title").removeClass("full-screen-mode")
            } else {
                var elem = document.documentElement;
                if (elem.requestFullscreen) {
                    elem.requestFullscreen();
                } else if (elem.msRequestFullscreen) {
                    elem.msRequestFullscreen();
                } else if (elem.mozRequestFullScreen) {
                    elem.mozRequestFullScreen();
                } else if (elem.webkitRequestFullscreen) {
                    elem.webkitRequestFullscreen();
                }
                $("#page-title").addClass("full-screen-mode")
            }
        }
    </script>
    <script type="text/javascript" src="{{ asset('../assets/scripts/main.8d288f825d8dffbbe55e.js') }}"></script>

    <script src="{{ asset ('../assets/chart/morris.js-0.6.4/morris.min.js') }}"></script>
    @yield('scripts')
</body>

</html>