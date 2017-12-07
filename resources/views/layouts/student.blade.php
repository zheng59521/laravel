<?php
/**
 * Created by PhpStorm.
 * User: zjh
 * Date: 17-11-28
 * Time: 下午6:40
 */
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('static/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('static/css/bootstrap-theme.css')}}">
    <link rel="stylesheet" href="{{asset('static/css/font-awesome.css')}}">
    <link rel="stylesheet" href="{{asset('static/css/reset.css')}}">
    <link rel="stylesheet" href="{{asset('static/css/style.css')}}">
    <title>@yield('title','首页')</title>
</head>
<body>
<div class="main">
    <header class="jumbotron">
        <div class="container-fluid">
            @section('head')
                <div class="jumbotron">
                    <h1><i class="fa fa-fw fa-commenting"></i>Hello,world!</h1>
                </div>
            @show
        </div>
    </header>
    <main class="container-fluid a">
        <div class="row">
            <div class="col-md-2 col-sm-1 col-xs-12">
                @section('left-mains')
                    <div class="list-group">
                        <ul class="nav nav-pills nav-stacked">
                            <li role="presentation"><a href="{{url('indexs')}}" class="list-group-item {{ Request::getPathInfo()=='/indexs'?'active':'' }}">用户列表</a></li>
                            <li role="presentation"><a href="{{url('create')}}" class="list-group-item {{ Request::getPathInfo()=='/create'?'active':'' }}">新增用户</a></li>
                        </ul>
                    </div>
                @show
            </div>
            <div class="col-md-10 col-sm-11 col-xs-12">
                @yield('right-mains')
            </div>
        </div>
    </main>
</div>
<div class="row write"></div>
<footer class="container-fluid">
    @section('foot')
        <i class="fa fa-fw fa-copyright"></i> By ---ZJH 2017
    @show
<script type="text/javascript" src="{{ URL::asset('https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js') }}"></script>
<script src="{{asset('static/js/bootstrap.min.js')}}"></script>
<script src="{{asset('static/js/init.js')}}"></script>
<script src="{{asset('static/js/npm.js')}}"></script>
</body>
</html>

