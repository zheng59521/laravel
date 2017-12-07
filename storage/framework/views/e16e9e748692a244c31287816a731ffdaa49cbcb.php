<?php
/**
 * Created by PhpStorm.
 * User: zjh
 * Date: 17-11-29
 * Time: 上午10:44
 */
?>
<form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
    <div class="form-group">
        <label for="name" class="col-sm-2 control-label">姓名</label>
        <div class="col-sm-3">
            <input type="text" class="form-control" value="<?php echo e(old('data')['user_nickname']?old('data')['user_nickname']:$model['user_nickname']); ?>" id="name" name="data[user_nickname]" placeholder="姓名">
        </div>
        <label for=""><?php echo e($errors->first('data.user_nickname')); ?></label>
    </div>
    <div class="form-group">
        <label for="bir" class="col-sm-2 control-label">生日</label>
        <div class="col-sm-3">
            <input type="date" class="form-control" id="bir" value="<?php echo e(old('data')['birthday']??date('Y-m-d',$model->birthday??time())); ?>" name="data[birthday]" placeholder="出生日期">
        </div>
        <label for=""><?php echo e($errors->first('data.birthday')); ?></label>
    </div>

    <div class="form-group">
        <label for="tel" class="col-sm-2 control-label">手机号</label>
        <div class="col-sm-3">
            <input type="text" class="form-control" id="tel" value="<?php echo e(old('data')['mobile']??$model->mobile); ?>" name="data[mobile]" placeholder="手机号">
        </div>
        <label for=""><?php echo e($errors->first('data.mobile')); ?></label>
    </div>

    <div class="form-group">
        <label for="pwd" class="col-sm-2 control-label">密码</label>
        <div class="col-sm-3">
            <input type="text" class="form-control" id="pwd" value="<?php echo e(old('data')['user_pass']??$model->user_pass); ?>" name="data[user_pass]" placeholder="请输入密码">
        </div>
        <label for=""><?php echo e($errors->first('data.user_pass')); ?></label>
    </div>

    

    <div class="form-group">
        <label for=""><?php echo e($errors->first('data.sex')); ?></label>
        <label class="col-sm-2 control-label">性别</label>

        <div class="col-sm-3">
            <div class="checkbox">
                <?php $__currentLoopData = $model->getSex(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <label>
                        <input type="radio" name="data[sex]" value="<?php echo e($k); ?>" <?php echo e($k==@old('data')['sex']|$k==$model->sex?'checked':''); ?>> <?php echo e($v); ?>

                    </label>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>

    </div>
    <?php echo e(csrf_field()); ?>

    <div class="form-group">
        <label for="avatar" class="col-sm-2 control-label">头像</label>
        <div class="col-sm-3">
            <input type="file" class="form-control" id="avatar" value="<?php echo e(old('data')['avatar']??$model->avatar); ?>" name="data[avatar]" placeholder="请上传头像">
        </div>
        <label for=""><?php echo e($errors->first('data.avatar')); ?></label>
    </div>

    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>"/>
    <input type="hidden"  name="id" value="<?php echo e($model->id); ?>">
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-3">
            <button type="submit" class="btn btn-primary"><?php echo e(array_key_exists($model->sex,$model->getSex())?'修改':'添加'); ?></button>
        </div>
    </div>
</form>
