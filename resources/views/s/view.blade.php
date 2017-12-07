<?php
/**
 * Created by PhpStorm.
 * User: zjh
 * Date: 17-11-29
 * Time: 下午10:31
 */
?>
@extends('layouts.student');
@section('title')
@parent
    用户详情
@stop
{{--<script type="text/javascript" src="{{ URL::asset('https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js') }}"></script>--}}
{{--<script src="{{asset('static/js/bootstrap.js')}}"></script>--}}
@section('head')
    @parent
@stop
@section('left-mains')
    @parent
@stop
@section('right-mains')
    @include('common.message')
    <div class="panel panel-default">
        <div class="panel-heading"><i class="fa fa-fw fa-users"></i> 学生列表</div>
        <table class="table table-responsive table-bordered table-hover">
            <tr>
                <th>ID</th>
                <td>{{$model->id}}</td>
            </tr>
            <tr>
                <th>用户名</th>
                <td>{{$model->user_nickname}}</td>
            </tr>
            <tr>
                <th>性别</th>
                <td>{{$model->getSex($model->sex)}}</td>
            </tr>
            <tr>
                <th>手机号</th>
                <td>{{$model->mobile}}</td>
            </tr>
            <tr>
                <th>头像</th>
                <td>{{$model->avatar}}</td>
            </tr>
            <tr>
                <th>操作</th>

                <td>
                    <a href="{{url('indexs')}}" class="btn btn-default btn-xs"><i class="fa fa-fw fa-archive"></i>返回</a>
                    <a href="{{url('update',['id'=>$model['id']])}}" class="btn btn-default btn-xs"><i class="fa fa-fw fa-edit"></i> 修改</a>
                    <a href="{{url('delete',['id'=>$model['id']])}}" class="btn btn-danger btn-xs" onclick="return confirm('is del or not???')"><i class="fa fa-fw fa-trash-o"></i> 删除</a>
                </td>
            </tr>
        </table>
    </div>
@stop
@section('foot')
    @parent
@stop


