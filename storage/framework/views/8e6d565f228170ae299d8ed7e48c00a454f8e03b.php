<?php $__env->startSection('header'); ?>
    ##parent-placeholder-594fd1615a341c77829e83ed988f137e1ba96231##
    <?php echo $__env->make('common.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <br />
    我是index中的header
    <h2><?php echo e($position); ?>

    <small><?php echo e(date('Y-m-d h:i:s',time())); ?></small>
    </h2>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('right-main'); ?>
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
        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($v['id']); ?></td>
                <td><?php echo e($v['sex']); ?></td>
                <td><?php echo e($v['mobile']); ?></td>
                <td><?php echo e($v['birthday']); ?></td>
                <td>
                    <a href="#" class="btn btn-success">修改</a>
                    <a hrer="#" class="btn btn-info">删除</a>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer'); ?>
    <?php echo $__env->make('common.footer',['data'=>'我是index传递的变量'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/layouts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>