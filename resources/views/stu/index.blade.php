@extends('layouts/layouts')
@section('header')
    @parent
    @include('common.header')
    <br />
    我是index中的header
    <h2>{{$position}}
    <small>{{date('Y-m-d h:i:s',time())}}</small>
    </h2>
@stop
@section('right-main')
    <p class="lead">
        我是index中的header,layouuts中使用了yield,子模板无法继承
    </p>
    <table class="table table-striped table-hover text-center ">
        <tr>
            <th>id</th>
            <th>sex</th>
            <th>mobile</th>
            <th>birthday</th>
            <th>操作</th>
        </tr>
        @foreach($data as $v)
            <tr>
                <td>{{$v['id']}}</td>
                <td>{{$v['sex']}}</td>
                <td>{{$v['mobile']}}</td>
                <td>{{$v['birthday']}}</td>
                <td>
                    <a href="#" class="btn btn-success">修改</a>
                    <a hrer="#" class="btn btn-info">删除</a>
                </td>
            </tr>
        @endforeach
    </table>
@stop
@section('footer')
    @include('common.footer',['data'=>'我是index传递的变量'])
@stop