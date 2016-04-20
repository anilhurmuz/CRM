<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <meta name="csrf-token" content="{!! csrf_token() !!}"/>
    <link rel="shortcut icon" href="{{Request::root()}}/img/favicon.png">

    <title>FlatLab - Flat & Responsive Bootstrap Admin Template</title>

    <!-- Bootstrap core CSS -->
    <link href="{{Request::root()}}/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{Request::root()}}/css/bootstrap-reset.css" rel="stylesheet">
    <link href="{{Request::root()}}/css/toastr.css" rel="stylesheet">
    <!--external css-->
    <link href="{{Request::root()}}/assets/font-awesome/css/font-awesome.css" rel="stylesheet"/>
    <link href="{{Request::root()}}/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css"
          media="screen"/>
    <link rel="stylesheet" href="{{Request::root()}}/css/owl.carousel.css" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{Request::root()}}/assets/bootstrap-datepicker/css/datepicker.css" />
    <link rel="stylesheet" type="text/css" href="{{Request::root()}}/assets/bootstrap-datetimepicker/css/datetimepicker.css" />
    <!--right slidebar-->
    <link href="{{Request::root()}}/css/slidebars.css" rel="stylesheet">

    <!-- Custom styles for this template -->

    <link href="{{Request::root()}}/css/style.css" rel="stylesheet">
    <link href="{{Request::root()}}/css/customstyle.css" rel="stylesheet">
    <link href="{{Request::root()}}/css/style-responsive.css" rel="stylesheet"/>
    <link href="{{Request::root()}}/css/jquery.dataTables.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <link href="{{Request::root()}}/assets/summernote/dist/summernote.css" rel="stylesheet">


    <script src="{{Request::root()}}/js/jquery.js"></script>
    <script src="{{Request::root()}}/js/jquery-1.12.0.min.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>

    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>




    <![endif]-->

</head>

<body>

<section id="container">
    <!--The xcmp code assignment here..-->
    <input type="hidden" value="{{$xcmpcode}}"/>
    <!--header start-->
    <header class="header white-bg">
        <div class="sidebar-toggle-box">
            <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
        </div>
        <!--logo start-->
        <a href="{{Request::root()}}/home" class="logo">SIGNUM<span>WINDESK</span></a>
        <!--logo end-->
        <div class="nav notify-row" id="top_menu">
            <!--  notification start -->
            <ul class="nav top-menu">

                <!-- settings end -->
                <!-- inbox dropdown start-->
                <li id="header_inbox_bar" class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <i class="fa fa-envelope-o"></i>
                        <span class="badge bg-important">5</span>
                    </a>
                    <ul class="dropdown-menu extended inbox">
                        <div class="notify-arrow notify-arrow-red"></div>
                        <li>
                            <p class="red">You have 5 new messages</p>
                        </li>
                        <li>
                            <a href="#">
                                <span class="photo"><img alt="avatar" src="{{Request::root()}}/img/avatar-mini.jpg"></span>
                                    <span class="subject">
                                    <span class="from">Jonathan Smith</span>
                                    <span class="time">Just now</span>
                                    </span>
                                    <span class="message">
                                        Hello, this is an example msg.
                                    </span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="photo"><img alt="avatar" src="{{Request::root()}}/img/avatar-mini2.jpg"></span>
                                    <span class="subject">
                                    <span class="from">Jhon Doe</span>
                                    <span class="time">10 mins</span>
                                    </span>
                                    <span class="message">
                                     Hi, Jhon Doe Bhai how are you ?
                                    </span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="photo"><img alt="avatar" src="{{Request::root()}}/img/avatar-mini3.jpg"></span>
                                    <span class="subject">
                                    <span class="from">Jason Stathum</span>
                                    <span class="time">3 hrs</span>
                                    </span>
                                    <span class="message">
                                        This is awesome dashboard.
                                    </span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="photo"><img alt="avatar" src="{{Request::root()}}/img/avatar-mini4.jpg"></span>
                                    <span class="subject">
                                    <span class="from">Jondi Rose</span>
                                    <span class="time">Just now</span>
                                    </span>
                                    <span class="message">
                                        Hello, this is metrolab
                                    </span>
                            </a>
                        </li>
                        <li>
                            <a href="#">See all messages</a>
                        </li>
                    </ul>
                </li>
                <!-- inbox dropdown end -->
                <!-- notification dropdown start-->
                <li id="header_notification_bar" class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">

                        <i class="fa fa-bell-o"></i>
                        <span class="badge bg-warning">7</span>
                    </a>
                    <ul class="dropdown-menu extended notification">
                        <div class="notify-arrow notify-arrow-yellow"></div>
                        <li>
                            <p class="yellow">You have 7 new notifications</p>
                        </li>
                        <li>
                            <a href="#">
                                <span class="label label-danger"><i class="fa fa-bolt"></i></span>
                                Server #3 overloaded.
                                <span class="small italic">34 mins</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="label label-warning"><i class="fa fa-bell"></i></span>
                                Server #10 not respoding.
                                <span class="small italic">1 Hours</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="label label-danger"><i class="fa fa-bolt"></i></span>
                                Database overloaded 24%.
                                <span class="small italic">4 hrs</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="label label-success"><i class="fa fa-plus"></i></span>
                                New user registered.
                                <span class="small italic">Just now</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="label label-info"><i class="fa fa-bullhorn"></i></span>
                                Application error.
                                <span class="small italic">10 mins</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">See all notifications</a>
                        </li>
                    </ul>
                </li>
                <!-- notification dropdown end -->
            </ul>
            <!--  notification end -->
        </div>
        <div class="top-nav ">
            <!--search & user info start-->
            <ul class="nav pull-right top-menu">
                <li>
                    <input type="text" class="form-control search" placeholder="Search">
                </li>
                <!-- user login dropdown start-->
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <img alt="" src="{{Request::root()}}/img/avatar1_small.jpg">
                        <span class="username">Jhon Doue</span>
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu extended logout">
                        <div class="log-arrow-up"></div>
                        <li><a href="#"><i class=" fa fa-suitcase"></i>Profile</a></li>
                        <li><a href="#"><i class="fa fa-cog"></i> Settings</a></li>
                        <li><a href="#"><i class="fa fa-bell-o"></i> Notification</a></li>
                        <li><a href="login.html"><i class="fa fa-key"></i> Log Out</a></li>
                    </ul>
                </li>
                <!-- user login dropdown end -->
            </ul>
            <!--search & user info end-->
        </div>
    </header>
    <!--header end-->
    <!--sidebar start-->
    <aside>
        <div id="sidebar" class="nav-collapse ">
            <!-- sidebar menu start-->
            <ul class="sidebar-menu" id="nav-accordion">
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-laptop"></i>
                        <span>CRM</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{Request::root()}}/crm/musteri_yonetimi">Müşteri Yönetimi</a></li>
                        <li><a href="{{Request::root()}}/crm/kisi_yonetimi">Kişi Yönetimi</a></li>
                        <li><a href="{{Request::root()}}/crm/satis_firsati_yonetimi">Satış Fırsatı Yönetimi</a></li>
                        <li><a href="{{Request::root()}}/crm/ebulten_yonetimi">E-Bülten Yönetimi</a></li>
                    </ul>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Sözleşme Yönetimi</span>
                    </a>
                    <ul class="sub">
                        <li><a href="#">menu item 1</a></li>
                        <li><a href="#">menu item 2</a></li>
                    </ul>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-cogs"></i>
                        <span>Proje Yönetimi</span>
                    </a>
                    <ul class="sub">
                        <li><a href="#">menu item 1</a></li>
                        <li><a href="#">menu item 2</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-tasks"></i>
                        <span>İdari İşler</span>
                    </a>
                    <ul class="sub">
                        <li><a href="#">menu item 1</a></li>
                        <li><a href="#">menu item 2</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-th"></i>
                        <span>Yardım Masası</span>
                    </a>
                    <ul class="sub">
                        <li><a href="#">menu item 1</a></li>
                        <li><a href="#">menu item 2</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class=" fa fa-envelope"></i>
                        <span>Tanımlar</span>
                    </a>
                    <ul class="sub">
                        <li><a href="#">Müşteri Durum Tanımı</a></li>
                        <li><a href="#">Müşteri Sektör Tanımı</a></li>
                        <li><a href="#">Müşteri Tip Tanımı</a></li>
                        <li><a href="#">Satış Fırsatı Durum Tanımı</a></li>
                        <li><a href="#">Fiyat Listesi</a></li>
                    </ul>
                </li>
            </ul>
            <!-- sidebar menu end-->
        </div>
    </aside>
    <!--sidebar end-->
    <!--main content start-->
            @yield('content')
    <!--main content end-->
</section>


<script src="{{Request::root()}}/js/jquery-ui-1.9.2.custom.min.js"></script>
<script src="{{Request::root()}}/js/jquery-migrate-1.2.1.min.js"></script>
<script src="{{Request::root()}}/js/bootstrap.min.js"></script>
<script class="include" type="text/javascript" src="{{Request::root()}}/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="{{Request::root()}}/js/jquery.scrollTo.min.js"></script>
<script src="{{Request::root()}}/js/jquery.nicescroll.js" type="text/javascript"></script>
<script src="{{Request::root()}}/js/respond.min.js"></script>


<!--right slidebar-->
<script src="{{Request::root()}}/js/slidebars.min.js"></script>

<!--common script for all pages-->
<script src="{{Request::root()}}/js/common-scripts.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script src="{{Request::root()}}/js/jquery.dataTables.min.js"></script>
<script src="{{Request::root()}}/js/toastr.js"></script>
<script src="{{Request::root()}}/js/toastr-message.js"></script>
<script>
    $('document').ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });
</script>

</body>
</html>
