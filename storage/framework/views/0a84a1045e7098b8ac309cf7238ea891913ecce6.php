<?php
/**
 * Created by PhpStorm.
 * User: zjh
 * Date: 17-11-28
 * Time: 下午6:39
 */
?>
;


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
        <table class="table table-responsive table-hover">
            <tr>
                <th>ID</th>
                <th>用户名</th>
                <th>性别</th>
                <th>手机号</th>
                <th>头像</th>
                <th>操作</th>
            </tr>
            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($v->id); ?></td>
                <td><?php echo e($v->user_nickname); ?></td>
                <td><?php echo e($v->getSex($v->sex)); ?></td>
                <td><?php echo e($v->mobile); ?></td>
                <td><?php echo e($v->avatar); ?></td>
                <td>
                    <a href="<?php echo e(url('view',['id'=>$v['id']])); ?>" class="btn btn-default btn-xs"><i class="fa fa-fw fa-archive"></i> 详情</a>
                    <a href="<?php echo e(url('update',['id'=>$v['id']])); ?>" class="btn btn-default btn-xs"><i class="fa fa-fw fa-edit"></i> 修改</a>
                    <a href="<?php echo e(url('delete',['id'=>$v['id']])); ?>" class="btn btn-danger btn-xs" onclick="return confirm('is del or not???')"><i class="fa fa-fw fa-trash-o"></i> 删除</a>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>
        <div class="pull-right">
            <?php echo e($data->links()); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('foot'); ?>
    ##parent-placeholder-32cb9138ce24c9c5d1917211aec19ba409d84f98##
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.student', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>