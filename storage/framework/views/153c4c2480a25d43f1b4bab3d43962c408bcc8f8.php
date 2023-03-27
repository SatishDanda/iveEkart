<?php echo Form::open(['url' => $url]); ?>

    <input type="hidden" name="order_id" value="<?php echo e($orderId); ?>">
    <div class="next-form-section">
        <div class="next-form-grid">
            <div class="next-form-grid-cell">
                <label class="text-title-field required"><?php echo e(trans('plugins/ecommerce::shipping.form_name')); ?></label>
                <input type="text" class="next-input" name="name" placeholder="<?php echo e(trans('plugins/ecommerce::shipping.form_name')); ?>" value="<?php echo e($address->name); ?>">
            </div>
            <div class="next-form-grid-cell">
                <label class="text-title-field <?php if(!EcommerceHelper::isPhoneFieldOptionalAtCheckout()): ?> required <?php endif; ?>"><?php echo e(trans('plugins/ecommerce::shipping.phone')); ?></label>
                <input type="text" class="next-input" name="phone" placeholder="<?php echo e(trans('plugins/ecommerce::shipping.phone')); ?>" value="<?php echo e($address->phone); ?>">
            </div>
        </div>
        <div class="next-form-grid">
            <div class="next-form-grid-cell">
                <label class="text-title-field"><?php echo e(trans('plugins/ecommerce::shipping.email')); ?></label>
                <input type="text" class="next-input" name="email" placeholder="<?php echo e(trans('plugins/ecommerce::shipping.email')); ?>" value="<?php echo e($address->email); ?>">
            </div>
        </div>

        <?php if(EcommerceHelper::isUsingInMultipleCountries()): ?>
            <div class="next-form-grid">
                <div class="next-form-grid-cell">
                    <label class="text-title-field required"><?php echo e(trans('plugins/ecommerce::shipping.country')); ?></label>
                    <div class="ui-select-wrapper">
                        <select name="country" class="ui-select form-control" data-type="country">
                            <?php $__currentLoopData = EcommerceHelper::getAvailableCountries(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $countryCode => $countryName): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($countryCode); ?>" <?php if($address->country == $countryCode): ?> selected <?php endif; ?>><?php echo e($countryName); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <svg class="svg-next-icon svg-next-icon-size-16">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#select-chevron"></use>
                        </svg>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <input type="hidden" name="country" value="<?php echo e(EcommerceHelper::getFirstCountryId()); ?>">
        <?php endif; ?>

        <div class="next-form-grid">
            <div class="next-form-grid-cell">
                <label class="text-title-field required"><?php echo e(trans('plugins/ecommerce::shipping.state')); ?></label>
                <?php if(EcommerceHelper::loadCountriesStatesCitiesFromPluginLocation()): ?>
                    <div class="ui-select-wrapper">
                        <select name="state" class="ui-select form-control" data-type="state" data-url="<?php echo e(route('ajax.states-by-country')); ?>">
                            <option value=""><?php echo e(__('Select state...')); ?></option>
                            <?php if($address->state || !EcommerceHelper::isUsingInMultipleCountries()): ?>
                                <?php $__currentLoopData = EcommerceHelper::getAvailableStatesByCountry($address->country); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stateId => $stateName): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($stateId); ?>" <?php if($address->state == $stateId): ?> selected <?php endif; ?>><?php echo e($stateName); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </select>
                        <svg class="svg-next-icon svg-next-icon-size-16">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#select-chevron"></use>
                        </svg>
                    </div>
                <?php else: ?>
                    <input type="text" class="next-input" name="state" placeholder="<?php echo e(trans('plugins/ecommerce::shipping.state')); ?>" value="<?php echo e($address->state); ?>">
                <?php endif; ?>
            </div>
        </div>

        <div class="next-form-grid">
            <div class="next-form-grid-cell">
                <label class="text-title-field required"><?php echo e(trans('plugins/ecommerce::shipping.city')); ?></label>
                <?php if(EcommerceHelper::loadCountriesStatesCitiesFromPluginLocation()): ?>
                    <div class="ui-select-wrapper">
                        <select name="city" class="ui-select form-control" data-type="city" data-url="<?php echo e(route('ajax.cities-by-state')); ?>">
                            <option value=""><?php echo e(__('Select city...')); ?></option>
                            <?php if($address->city): ?>
                                <?php $__currentLoopData = EcommerceHelper::getAvailableCitiesByState($address->state); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cityId => $cityName): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($cityId); ?>" <?php if($address->city == $cityId): ?> selected <?php endif; ?>><?php echo e($cityName); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </select>
                        <svg class="svg-next-icon svg-next-icon-size-16">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#select-chevron"></use>
                        </svg>
                    </div>
                <?php else: ?>
                    <input type="text" class="next-input" name="city" placeholder="<?php echo e(trans('plugins/ecommerce::shipping.city')); ?>" value="<?php echo e($address->city); ?>">
                <?php endif; ?>
            </div>
        </div>

        <div class="next-form-grid">
            <div class="next-form-grid-cell">
                <label class="text-title-field required"><?php echo e(trans('plugins/ecommerce::shipping.address')); ?></label>
                <input type="text" class="next-input" name="address" placeholder="<?php echo e(trans('plugins/ecommerce::shipping.address')); ?>" value="<?php echo e($address->address); ?>">
            </div>
        </div>

        <?php if(EcommerceHelper::isZipCodeEnabled()): ?>
            <div class="next-form-grid">
                <div class="next-form-grid-cell">
                    <label class="text-title-field required"><?php echo e(trans('plugins/ecommerce::shipping.zip_code')); ?></label>
                    <input type="text" class="next-input" name="zip_code" placeholder="<?php echo e(trans('plugins/ecommerce::shipping.zip_code')); ?>" value="<?php echo e($address->zip_code); ?>">
                </div>
            </div>
        <?php endif; ?>

    </div>
<?php echo Form::close(); ?>

<?php /**PATH D:\Projects\xampp8\htdocs\iveEkart\platform/plugins/ecommerce/resources/views/orders/shipping-address/form.blade.php ENDPATH**/ ?>