<?php
/**
 * Created by PhpStorm.
 * User: zjh
 * Date: 17-11-28
 * Time: 下午11:22
 */
?>
<?php if(Session()->has('create')): ?>
    <div class="alert alert-success alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
        <strong><?php echo e(session()->get('create')); ?></strong>
    </div>
<?php endif; ?>
