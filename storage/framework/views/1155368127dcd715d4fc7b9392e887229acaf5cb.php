<div class="ps-my-account">
    <div class="container">
        <form class="ps-form--account ps-tab-root" method="POST" action="<?php echo e(route('customer.login.post')); ?>">
            <?php echo csrf_field(); ?>
            <div class="ps-form__content">
                <h4><?php echo e(__('Log In Your Account')); ?></h4>
                <?php if(isset($errors) && $errors->has('confirmation')): ?>
                    <div class="alert alert-danger">
                        <span><?php echo $errors->first('confirmation'); ?></span>
                    </div>
                    <br>
                <?php endif; ?>
                <div class="form-group">
                    <input class="form-control" name="email" type="email" value="<?php echo e(old('email')); ?>" placeholder="<?php echo e(__('Your Email')); ?>">
                    <?php if($errors->has('email')): ?>
                        <span class="text-danger"><?php echo e($errors->first('email')); ?></span>
                    <?php endif; ?>
                </div>
                <div class="form-group form-forgot">
                    <input class="form-control" type="password" name="password" placeholder="<?php echo e(__('Password')); ?>"><a href="<?php echo e(route('customer.password.reset')); ?>"><?php echo e(__('Forgot?')); ?></a>
                    <?php if($errors->has('password')): ?>
                        <span class="text-danger"><?php echo e($errors->first('password')); ?></span>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <div class="ps-checkbox">
                        <input class="form-control" type="checkbox" name="remember" id="remember-me">
                        <label for="remember-me"><?php echo e(__('Remember me')); ?></label>
                    </div>
                </div>
                <div class="form-group submit">
                    <button class="ps-btn ps-btn--fullwidth" type="submit"><?php echo e(__('Login')); ?></button>
                </div>

                <div class="form-group">
                    <p class="text-center"><?php echo e(__("Don't Have an Account?")); ?> <a href="<?php echo e(route('customer.register')); ?>" class="d-inline-block"><?php echo e(__('Sign up now')); ?></a></p>
                </div>
            </div>
            <div class="ps-form__footer">
                <?php echo apply_filters(BASE_FILTER_AFTER_LOGIN_OR_REGISTER_FORM, null, \Botble\Ecommerce\Models\Customer::class); ?>

            </div>
        </form>
    </div>
</div>
<?php /**PATH D:\Projects\xampp8\htdocs\iveEkart\platform/themes/martfury/views/ecommerce/customers/login.blade.php ENDPATH**/ ?>