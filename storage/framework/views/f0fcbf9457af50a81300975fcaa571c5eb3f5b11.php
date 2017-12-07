<?php
/**
 * Created by PhpStorm.
 * User: zjh
 * Date: 17-11-29
 * Time: 下午10:31
 */
?>
;
<?php $__env->startSection('title'); ?>
##parent-placeholder-3c6de1b7dd91465d437ef415f94f36afc1fbc8a8##
    用户详情
<?php $__env->stopSection(); ?>


<?php $__env->startSection('head'); ?>
    ##parent-placeholder-1a954628a960aaef81d7b2d4521929579f3541e6##
<?php $__env->stopSection(); ?>
<?php $__env->startSection('left-mains'); ?>
    ##parent-placeholder-f9cc1c78fbfac86a6feb6bc521375f9f66e3fa35##
<?php $__env->stopSection(); ?>
<?php $__env->startSection('right-mains'); ?>
    <?php echo $__env->make('common.message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="panel panel-default">
        <div class="panel-heading"><i class="fa fa-fw fa-users"></i> 学生列表</div>
        <table class="table table-responsive table-bordered table-hover">
            <tr>
                <th>ID</th>
                <td><?php echo e($model->id); ?></td>
            </tr>
            <tr>
                <th>用户名</th>
                <td><?php echo e($model->user_nickname); ?></td>
            </tr>
            <tr>
                <th>性别</th>
                <td><?php echo e($model->getSex($model->sex)); ?></td>
            </tr>
            <tr>
                <th>手机号</th>
                <td><?php echo e($model->mobile); ?></td>
            </tr>
            <tr>
                <th>头像</th>
                <td><?php echo e($model->avatar); ?></td>
            </tr>
            <tr>
                <th>操作</th>

                <td>
                    <a href="<?php echo e(url('indexs')); ?>" class="btn btn-default btn-xs"><i class="fa fa-fw fa-archive"></i>返回</a>
                    <a href="<?php echo e(url('update',['id'=>$model['id']])); ?>" class="btn btn-default btn-xs"><i class="fa fa-fw fa-edit"></i> 修改</a>
                    <a href="<?php echo e(url('delete',['id'=>$model['id']])); ?>" class="btn btn-danger btn-xs" onclick="return confirm('is del or not???')"><i class="fa fa-fw fa-trash-o"></i> 删除</a>
                </td>
            </tr>
        </table>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('foot'); ?>
    ##parent-placeholder-32cb9138ce24c9c5d1917211aec19ba409d84f98##
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.student', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>