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
            height:100%;
        }
        .container{
            padding:2% 0;
        }
        .head{
            height:45%;border:1px solid #ff0;
        }
        .main{
            height:45%;border:1px solid #f0f;
        }
        .footer{
            height:10%;border:1px solid #f00;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12 head">
            <?php $__env->startSection('header'); ?>
                顶部
            <?php echo $__env->yieldSection(); ?>
        </div>
        <div class="col-md-4 main">
            <?php $__env->startSection('left-main'); ?>
                主体
            <?php echo $__env->yieldSection(); ?>
            </div>
        </div>
        <div class="col-md-8 main">
            <?php echo $__env->yieldContent('right-main','内容'); ?>
            </div>
        </div>
        <div class="col-md-12 footer">
            <?php $__env->startSection('footer'); ?>
                足部
            <?php echo $__env->yieldSection(); ?>
            </div>
        </div>
    </div>
</div>
</body>
</html>
