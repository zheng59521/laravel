<?php
/**
 * Created by PhpStorm.
 * User: zjh
 * Date: 17-11-29
 * Time: 上午10:44
 */
?>

<?php $__env->startSection('title'); ?>
    修改用户信息
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
        <div class="panel-heading"><i class="fa fa-fw fa-plus"></i> 用户信息修改</div>
        <div class="panel-body">
            <?php echo $__env->make('/s/_form',['model'=>$model], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('foot'); ?>
    ##parent-placeholder-32cb9138ce24c9c5d1917211aec19ba409d84f98##
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.student', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>