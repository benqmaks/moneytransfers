<!DOCTYPE html>
<html lang="en">
<head>
    <title></title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{URL::asset('assets/js/vendors/jquery-ui/jquery-ui.min.css')}}"/>
    <link rel="stylesheet" href="{{URL::asset('assets/css/vendors/bootstrap.min.css')}}"/>
    <link rel="stylesheet" href="{{URL::asset('assets/css/vendors/bootstrap-theme.min.css')}}"/>
    <link rel="stylesheet" href="{{URL::asset('assets/css/style.css')}}" type="text/css" media="all">
</head>
<body ng-app="app">
<div class="wrapper" ng-controller="mainCtrl">
    <div class="header">
        <div class="container">
            <div class="col-xs-4">
                <a href="/" id="logo">
                    <img src="{{URL::asset('assets/img/logo.png')}}" alt="Вывод средств Луганск"/>
                </a>
            </div>
            <div class="col-xs-8"></div>
        </div>
    </div>

    <div class="menu">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <ul id="menu" class="clearfix">
                        @if(Route::currentRouteName() == 'index')
                            <li class="active"><a href="/"><span>Главная</span></a></li>
                        @else
                            <li><a href="/"><span>Главная</span></a></li>
                        @endif

                        @if(Route::currentRouteName() == 'exchange')
                            <li class="active"><a href="/exchange"><span>Обменник</span></a></li>
                        @else
                            <li><a href="/exchange"><span>Обменник</span></a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>

    @if(Route::currentRouteName() == 'index')
        <div class="slider">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div id="slider" class="carousel slide" data-ride="carousel">
                            <!-- Indicators -->
                            <ol class="carousel-indicators">
                                <li data-target="#slider" data-slide-to="0" class="active"></li>
                                <li data-target="#slider" data-slide-to="1"></li>
                                <li data-target="#slider" data-slide-to="2"></li>
                            </ol>

                            <!-- Wrapper for slides -->
                            <div class="carousel-inner" role="listbox">
                                <div class="item active">
                                    <div class="img-wrap">
                                        <div class="img-container"><img src="{{URL::asset('assets/img/img1.jpg')}}"
                                                                        alt="image"></div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="img-wrap">
                                        <div class="img-container"><img src="{{URL::asset('assets/img/img2.jpg')}}"
                                                                        alt="image"></div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="img-wrap">
                                        <div class="img-container"><img src="{{URL::asset('assets/img/img3.jpg')}}"
                                                                        alt="image"></div>
                                    </div>
                                </div>
                            </div>

                            <!-- Controls -->
                            <a class="left carousel-control" href="#slider" role="button" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="right carousel-control" href="#slider" role="button" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif


    @yield('content')

    @if(Route::currentRouteName() == 'index')
        <div class="sign">
            <div class="container">
                <div class="row">
                    <div class="col-xs-4"></div>
                    <div class="col-xs-4"><a href="http://goo.gl/forms/r3ay085Iau"><img
                                    src="{{URL::asset('assets/img/bron2.png')}}"></a></div>
                    <div class="col-xs-4"></div>
                </div>
            </div>
        </div>
    @endif

    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-xs-3 text-center">
                    <a href="/">moneytransfers.in.ua</a>
                </div>
                <div class="col-xs-3 text-center">
                    <a href="https://vk.com/money_transfers" target="_blank">Вконтакте</a>
                </div>
                <div class="col-xs-3 text-center">
                    <p>ТЕЛ: +380685486119</p>
                </div>
                <div class="col-xs-3 text-right" id="counter"></div>
            </div>
        </div>
    </div>
</div>

{{--VENDORS--}}
<script src="{{URL::asset('assets/js/vendors/jquery-2.1.3.min.js')}}"></script>
<script src="{{URL::asset('assets/js/vendors/jquery-ui/jquery-ui.min.js')}}"></script>
<script src="{{URL::asset('assets/js/vendors/bootstrap.min.js')}}"></script>
<script src="{{URL::asset('assets/js/vendors/angular.min.js')}}"></script>
<script src="//vk.com/js/api/xd_connection.js?2"></script>


{{--APPLICATION--}}
<script src="{{URL::asset('assets/js/main.js')}}"></script>


<!--LiveInternet counter-->
<script>
    $(function () {
        $('#counter').append("<a href='//www.liveinternet.ru/click' " +
        "target=_blank><img src='//counter.yadro.ru/hit?t11.6;r" +
        escape(document.referrer) + ((typeof(screen) == "undefined") ? "" :
        ";s" + screen.width + "*" + screen.height + "*" + (screen.colorDepth ?
                screen.colorDepth : screen.pixelDepth)) + ";u" + escape(document.URL) +
        ";" + Math.random() +
        "' alt='' title='LiveInternet: показано число просмотров за 24" +
        " часа, посетителей за 24 часа и за сегодня' " +
        "border='0' width='88' height='31'><\/a>");
    });
</script>

</body>
</html>