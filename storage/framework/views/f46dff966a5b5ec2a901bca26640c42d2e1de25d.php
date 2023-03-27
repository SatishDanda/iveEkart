<?php $__env->startSection('content'); ?>
    <?php echo Form::open(['route' => ['customer.address.edit', $address->id], 'class' => 'ps-form--account-setting', 'method' => 'POST']); ?>

        <div class="ps-form__header">
            <h3><?php echo e(SeoHelper::getTitle()); ?></h3>
        </div>
        <div class="ps-form__content">
            <div class="form-group">
                <label for="name"><?php echo e(__('Full Name')); ?>:</label>
                <input id="name" type="text" class="form-control" name="name" value="<?php echo e($address->name); ?>">
                <?php echo Form::error('name', $errors); ?>

            </div>

            <div class="form-group">
                <label for="email"><?php echo e(__('Email')); ?>:</label>
                <input id="email" type="text" class="form-control" name="email" value="<?php echo e($address->email); ?>">
                <?php echo Form::error('email', $errors); ?>

            </div>

           <div class="form-group">
                <label for="phone"><?php echo e(__('Phone:')); ?></label>
                <input id="phone" type="text" class="form-control" name="phone" value="<?php echo e($address->phone); ?>">
                <?php echo Form::error('phone', $errors); ?>

            </div>

            <?php if(EcommerceHelper::isUsingInMultipleCountries()): ?>
                <div class="form-group <?php if($errors->has('country')): ?> has-error <?php endif; ?>">
                    <label for="country"><?php echo e(__('Country')); ?>:</label>
                    <select name="country" class="form-control" id="country" data-type="country">
                        <?php $__currentLoopData = ['' => __('Select country...')] + EcommerceHelper::getAvailableCountries(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $countryCode => $countryName): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($countryCode); ?>" <?php if($address->country == $countryCode): ?> selected <?php endif; ?>><?php echo e($countryName); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <?php echo Form::error('country', $errors); ?>

            <?php else: ?>
                <input type="hidden" name="country" value="<?php echo e(EcommerceHelper::getFirstCountryId()); ?>">
            <?php endif; ?>

            <div class="form-group <?php if($errors->has('state')): ?> has-error <?php endif; ?>">
                <label for="state"><?php echo e(__('State')); ?>:</label>
                <?php if(EcommerceHelper::loadCountriesStatesCitiesFromPluginLocation()): ?>
                    <select name="state" class="form-control" id="state" data-type="state" data-placeholder="<?php echo e(__('Select state...')); ?>" data-url="<?php echo e(route('ajax.states-by-country')); ?>">
                        <option value=""><?php echo e(__('Select state...')); ?></option>
                        <?php if(old('country', $address->country) || !EcommerceHelper::isUsingInMultipleCountries()): ?>
                            <?php $__currentLoopData = EcommerceHelper::getAvailableStatesByCountry(old('country', $address->country)); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stateId => $stateName): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($stateId); ?>" <?php if(old('state', $address->state) == $stateId): ?> selected <?php endif; ?>><?php echo e($stateName); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </select>
                <?php else: ?>
                    <input id="state" type="text" class="form-control" name="state" value="<?php echo e($address->state); ?>">
                <?php endif; ?>
                <?php echo Form::error('state', $errors); ?>

            </div>

            <div class="form-group <?php if($errors->has('city')): ?> has-error <?php endif; ?>">
                <label for="city"><?php echo e(__('City')); ?>:</label>
                <?php if(EcommerceHelper::loadCountriesStatesCitiesFromPluginLocation()): ?>
                    <select name="city" class="form-control" id="city" data-type="city" data-placeholder="<?php echo e(__('Select city...')); ?>" data-url="<?php echo e(route('ajax.cities-by-state')); ?>">
                        <option value=""><?php echo e(__('Select city...')); ?></option>
                        <?php if(old('state', $address->state)): ?>
                            <?php $__currentLoopData = EcommerceHelper::getAvailableCitiesByState(old('state', $address->state)); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cityId => $cityName): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($cityId); ?>" <?php if(old('city', $address->city) == $cityId): ?> selected <?php endif; ?>><?php echo e($cityName); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </select>
                <?php else: ?>
                    <input id="city" type="text" class="form-control" name="city" value="<?php echo e($address->city); ?>">
                <?php endif; ?>
                <?php echo Form::error('city', $errors); ?>

            </div>

            <div class="form-group">
                <label for="address"><?php echo e(__('Address')); ?>:</label>
                <input id="address" type="text" class="form-control" name="address" value="<?php echo e($address->address); ?>">
                <?php echo Form::error('address', $errors); ?>

            </div>

            <?php if(EcommerceHelper::isZipCodeEnabled()): ?>
                <div class="form-group">
                    <label><?php echo e(__('Zip code')); ?>:</label>
                    <input id="zip_code" type="text" class="form-control" name="zip_code" value="<?php echo e($address->zip_code); ?>">
                    <?php echo Form::error('zip_code', $errors); ?>

                </div>
            <?php endif; ?>

            <div class="form-group">
                <div class="ps-checkbox">
                    <input class="form-control" type="checkbox" name="is_default" value="1" <?php if($address->is_default): ?> checked <?php endif; ?> id="is-default">
                    <label for="is-default"><?php echo e(__('Use this address as default')); ?></label>
                </div>
                <?php echo Form::error('is_default', $errors); ?>

            </div>

            <div class="form-group">
                <button class="ps-btn ps-btn--sm" type="submit"><?php echo e(__('Update')); ?></button>
            </div>
        </div>
    <?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make(Theme::getThemeNamespace() . '::views.ecommerce.customers.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects\xampp8\htdocs\iveEkart\platform/themes/martfury/views/ecommerce/customers/address/edit.blade.php ENDPATH**/ ?>