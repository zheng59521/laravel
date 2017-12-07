<?php
/**
 * Created by PhpStorm.
 * User: zjh
 * Date: 17-11-29
 * Time: 上午10:44
 */
?>
@extends('layouts.student')
@section('title')
    修改用户信息
@stop
@section('head')
    @parent
@stop
@section('left-mains')
    @parent
@stop
@section('right-mains')
    @include('common.message')
    <div class="panel panel-default">
        <div class="panel-heading"><i class="fa fa-fw fa-plus"></i> 用户信息修改</div>
        <div class="panel-body">
            @include('/s/_form',['model'=>$model])
        </div>
    </div>
@stop
@section('foot')
    @parent
@stop
