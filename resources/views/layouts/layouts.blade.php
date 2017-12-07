<?php
/**
 * Created by PhpStorm.
 * User: zjh
 * Date: 17-11-27
 * Time: 下午11:03
 */
?>
 <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.bootcss.com/bootstrap/4.0.0-beta.2/css/bootstrap.css" rel="stylesheet">
    <script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <title>Document</title>
    <style>
        html,body,.container,.row{
            width:100%;height:100%;background-color: #FCFCFC;
        }
        .container{
            padding:2% 0;
        }
        .head{
            height:45%;border:1px solid #ff0;margin-bottom:1.5%;
        }
        .main{
            border:1px solid #f0f;margin-bottom:1.5%;
        }
        .footer{
            height:10%;border:1px solid #f00;margin-bottom:1.5%;
        }
    </style>
    @section('js')
    @stop
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12 head">
            @section('header')
                我是layouts中的顶部
            @show
        </div>
        <div class="col-md-3 main">
            @section('left-main')
                我是layouts中的主体
            @show
        </div>
        <div class="col-md-9 main">
            @yield('right-main','我是layouts中的内容')
        </div>
        <div class="col-md-12 footer">
            @section('footer')
            @show
        </div>
    </div>
</div>
</body>
</html>
