<?php
/**
 * Created by PhpStorm.
 * User: zjh
 * Date: 17-11-28
 * Time: 下午7:57
 */
?>
@extends('layouts.student')
@section('title')
    新增用户
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
        <div class="panel-heading"><i class="fa fa-fw fa-plus"></i> 新增学生</div>
        <div class="panel-body">
            @include('/s/_form')
        </div>
    </div>
@stop
@section('foot')
    @parent
@stop

