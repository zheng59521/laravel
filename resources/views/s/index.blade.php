<?php
/**
 * Created by PhpStorm.
 * User: zjh
 * Date: 17-11-28
 * Time: 下午6:39
 */
?>
@extends('layouts.student');
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
        <table class="table table-responsive table-hover">
            <tr>
                <th>ID</th>
                <th>用户名</th>
                <th>性别</th>
                <th>手机号</th>
                <th>头像</th>
                <th>操作</th>
            </tr>
            @foreach($data as $v)
            <tr>
                <td>{{$v->id}}</td>
                <td>{{$v->user_nickname}}</td>
                <td>{{$v->getSex($v->sex)}}</td>
                <td>{{$v->mobile}}</td>
                <td>{{$v->avatar}}</td>
                <td>
                    <a href="{{url('view',['id'=>$v['id']])}}" class="btn btn-default btn-xs"><i class="fa fa-fw fa-archive"></i> 详情</a>
                    <a href="{{url('update',['id'=>$v['id']])}}" class="btn btn-default btn-xs"><i class="fa fa-fw fa-edit"></i> 修改</a>
                    <a href="{{url('delete',['id'=>$v['id']])}}" class="btn btn-danger btn-xs" onclick="return confirm('is del or not???')"><i class="fa fa-fw fa-trash-o"></i> 删除</a>
                </td>
            </tr>
            @endforeach
        </table>
        <div class="pull-right">
            {{ $data->links() }}
        </div>
    </div>
@stop
@section('foot')
    @parent
@stop

