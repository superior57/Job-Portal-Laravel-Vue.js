 
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-4 login-form" <?php if($errors->has('email') || $errors->has('password')): ?> style="display: block;" <?php endif; ?>>
            <form method="POST" action="<?php echo e(route('login')); ?>" class="wt-formtheme wt-loginform do-login-form">
                <?php echo csrf_field(); ?>
                <fieldset>
                    <h3>LOG PÅ</h3>
                    <div class="login-form-groups">
                        <div class="form-group">
                            <input id="email" type="email" name="email" class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>"
                                placeholder="E-mail adresse" required autofocus>
                            <?php if($errors->has('email')): ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($errors->first('email')); ?></strong>
                            </span>
                            <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <input id="password" type="password" name="password" class="form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>"
                                placeholder="Kodeord" required>
                            <?php if($errors->has('password')): ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($errors->first('password')); ?></strong>
                            </span>
                            <?php endif; ?>
                        </div>
                    </div>
                    
                    <div class="wt-logininfo">
                        <button type="submit" class="wt-btn do-login-button"><?php echo e(trans('lang.login')); ?></button>
                    </div>
                    <div class="wt-loginwith row">
                        <div class="h-line">
                            <hr/>
                        </div>
                        <div class="h-with">
                            <span>ELLER LOGIN MED</span>
                        </div>
                        <div class="h-line">
                            <hr/>
                        </div>
                    </div>
                    <div class="wt-logininfo">
                        <button class="wt-btn with-facebook-button"><i class="fa fa-facebook-square fa-2x"></i>FACEBOOK</button>
                    </div>
                </fieldset>
                <div class="wt-loginfooterinfo">
                    <?php if(Route::has('password.request')): ?>
                        <a href="<?php echo e(route('password.request')); ?>" class="wt-forgot-password"><?php echo e(trans('lang.forget_pass')); ?></a>
                    <?php endif; ?>
                    <a href="<?php echo e(route('register')); ?>"><?php echo e(trans('lang.create_account')); ?></a>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make(file_exists(resource_path('views/extend/front-end/master.blade.php')) ? 'extend.front-end.master' : 'front-end.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>