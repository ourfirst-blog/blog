<!DOCTYPE html>
<html lang="zh-CN">
    <head>
        <meta charset="utf-8">
       <title>@yield('title')</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="author" content="tencent">
        <link rel="stylesheet" href="{{ URL::asset('/assets/bootstrap-3.3.0/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('/css/base.css') }}">
        <!--[if lt IE 9]>
        <script src="{{ URL::asset('/assets/vendors/html5shiv-3.7.3/html5shiv.min.js') }}"></script>
        <script src="{{ URL::asset('/assets/vendors/respond.js-1.4.2/respond.min.js') }}"></script>
        <![endif]-->
        <script src="{{ URL::asset('/assets/jquery-1.11.1/jquery.min.js') }}"></script>
        <script src="{{ URL::asset('/assets/bootstrap-3.3.0/js/bootstrap.min.js') }}"></script>
        <script src="{{ URL::asset('/assets/bootstrap-3.3.0/js/jquery.validate.js') }}" type="text/javascript"></script>
        <meta name="csrf-token" content="{{ csrf_token() }}">

    </head>

    <style media="screen">

    </style>
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>

    <body>
      <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Home</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Home</a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
              <li><a href="#">Dashboard</a></li>
              <li><a href="#">Settings</a></li>
              <li><a href="#">Profile</a></li>
              <li><a href="{{ route('Admin::logout')}}">退出登陆</a></li>
            </ul>
            <form class="navbar-form navbar-right">
              <input type="text" class="form-control" placeholder="Search...">
            </form>
          </div>
        </div>
      </nav>
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-sidebar">
              <li><a href="{{ route('Admin::index')}}">总览 <span class="sr-only">(current)</span></a></li>
              <li><a href="#">会员管理</a></li>
              <li><a href="#">Analytics</a></li>
              <li><a href="#">Export</a></li>
            </ul>
            <ul class="nav nav-sidebar">
              <li><a href="{{ route('Admin::category_show')}}">分类管理</a></li>
              <li><a href="">Nav item again</a></li>
              <li><a href="">One more nav</a></li>
              <li><a href="">Another nav item</a></li>
              <li><a href="">More navigation</a></li>
            </ul>
            <ul class="nav nav-sidebar">
              <li><a href="">标签管理</a></li>
              <li><a href="">One more nav</a></li>
              <li><a href="">Another nav item</a></li>
            </ul>
              <ul class="nav nav-sidebar">
              <li><a href="{{ route('Admin::posts')}}">文章管理</a></li>
              <li><a href="{{ route('Admin::add_post')}}">增加新文章</a></li>
              <li><a href="{{ route('Admin::categories')}}">分类管理</a></li>
              <li><a href="{{ route('Admin::add_category')}}">增加分类</a></li>
            </ul>
          </div>
          <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            @yield('content')
          </div>
        </div>
      </div>
    </body>
</html>
<script type="text/javascript">
(function(window) {'use strict';
    function setSidebarActive() {
        var url = window.location.href;
        let aMenu = $('.nav-sidebar').find('a[href="' + url + '"]');

            aMenu.parent().attr('class', 'active');
            return;

        // let ulMenu = aMenu.parent().parent();
        // let liMenu = ulMenu.parent();
        // ulMenu.attr('class', 'active dropdown');
        // liMenu.attr('class', 'active');
        // return;
    }

    setSidebarActive();
})(window);
</script>