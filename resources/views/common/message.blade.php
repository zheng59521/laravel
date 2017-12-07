<?php
/**
 * Created by PhpStorm.
 * User: zjh
 * Date: 17-11-28
 * Time: 下午11:22
 */
?>
@if(Session()->has('message'))
    <div class="alert alert-success alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
        <strong>{{session()->get('message')}}</strong>
    </div>
@elseif(@count($errors))
    <div class="alert alert-warning alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
        <br />
        @foreach($errors->all() as $v)
            <strong>警告!</strong><li>{{$v}}</li>
        @endforeach
    </div>
@endif
