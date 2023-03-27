<div class="customer-address-payment-form">

    <?php if(EcommerceHelper::isEnabledGuestCheckout() && ! auth('customer')->check()): ?>
        <div class="form-group mb-3">
            <p><?php echo e(__('Already have an account?')); ?> <a href="<?php echo e(route('customer.login')); ?>"><?php echo e(__('Login')); ?></a></p>
        </div>
    <?php endif; ?>

    <?php if(auth('customer')->check()): ?>
        <div class="form-group mb-3">
            <?php if($isAvailableAddress): ?>
                <label class="control-label mb-2" for="address_id"><?php echo e(__('Select available addresses')); ?>:</label>
            <?php endif; ?>
            <?php
                $oldSessionAddressId = old('address.address_id', $sessionAddressId);
            ?>
            <div class="list-customer-address <?php if(! $isAvailableAddress): ?> d-none <?php endif; ?>">
                <div class="select--arrow">
                    <select name="address[address_id]" class="form-control address-control-item" id="address_id">
                        <option value="new" <?php if($oldSessionAddressId == 'new'): echo 'selected'; endif; ?>><?php echo e(__('Add new address...')); ?></option>
                        <?php if($isAvailableAddress): ?>
                            <?php $__currentLoopData = $addresses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($address->id); ?>" <?php if($oldSessionAddressId == $address->id): echo 'selected'; endif; ?>><?php echo e($address->full_address); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </select>
                    <i class="fas fa-angle-down"></i>
                </div>
                <br>
                <div class="address-item-selected <?php if(! $sessionAddressId): ?> d-none <?php endif; ?>">
                    <?php if($isAvailableAddress && $oldSessionAddressId != 'new'): ?>
                        <?php if($oldSessionAddressId && $addresses->contains('id', $oldSessionAddressId)): ?>
                            <?php echo $__env->make('plugins/ecommerce::orders.partials.address-item', ['address' => $addresses->firstWhere('id', $oldSessionAddressId)], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php elseif($defaultAddress = get_default_customer_address()): ?>
                            <?php echo $__env->make('plugins/ecommerce::orders.partials.address-item', ['address' => $defaultAddress], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php else: ?>
                            <?php echo $__env->make('plugins/ecommerce::orders.partials.address-item', ['address' => Arr::first($addresses)], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
                <div class="list-available-address d-none">
                    <?php if($isAvailableAddress): ?>
                        <?php $__currentLoopData = $addresses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="address-item-wrapper" data-id="<?php echo e($address->id); ?>">
                                <?php echo $__env->make('plugins/ecommerce::orders.partials.address-item', compact('address'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <div class="address-form-wrapper <?php if(auth('customer')->check() && $oldSessionAddressId !== 'new' && $isAvailableAddress): ?> d-none <?php endif; ?>">
        <div class="row">
            <div class="col-12">
                <div class="form-group mb-3 <?php $__errorArgs = ['address.name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> has-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                    <input type="text" name="address[name]" id="address_name" placeholder="<?php echo e(__('Full Name')); ?>"
                        class="form-control address-control-item address-control-item-required checkout-input"
                        value="<?php echo e(old('address.name', Arr::get($sessionCheckoutData, 'name'))); ?>" required>
                    <?php echo Form::error('address.name', $errors); ?>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8 col-12">
                <div class="form-group  <?php $__errorArgs = ['address.email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> has-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                    <input type="email" name="address[email]" id="address_email" placeholder="<?php echo e(__('Email')); ?>"
                        class="form-control address-control-item address-control-item-required checkout-input"
                        value="<?php echo e(old('address.email', Arr::get($sessionCheckoutData, 'email'))); ?>" required>
                    <?php echo Form::error('address.email', $errors); ?>

                </div>
            </div>
            <div class="col-lg-4 col-12">
                <div class="form-group  <?php $__errorArgs = ['address.phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> has-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                    <?php echo Form::phoneNumber('address[phone]', old('address.phone', Arr::get($sessionCheckoutData, 'phone')), ['id' => 'address_phone', 'required' => 'required','class' => 'form-control address-control-item ' . (!EcommerceHelper::isPhoneFieldOptionalAtCheckout() ? 'address-control-item-required' : '') . ' checkout-input']); ?>

                    <?php echo Form::error('address.phone', $errors); ?>

                </div>
            </div>
        </div>

        <div class="row">
            <!-- V1::eArbor add this line to select country dropdown option -->
            <div class="col-12">
                <div class="form-group mb-3 <?php $__errorArgs = ['address.country'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> has-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                    <?php if(EcommerceHelper::isUsingInMultipleCountries()): ?>
                        <div class="select--arrow">
                            <select name="address[country]" class="form-control address-control-item address-control-item-required" required
                                data-form-parent=".customer-address-payment-form" id="address_country" data-type="country">
                                <?php $__currentLoopData = EcommerceHelper::getAvailableCountries(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $countryCode => $countryName): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($countryCode); ?>" <?php if(old('address.country', Arr::get($sessionCheckoutData, 'country')) == $countryCode): ?> <?php endif; ?> <?php if(35 == $countryCode): ?>  selected <?php endif; ?>><?php echo e($countryName); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <i class="fas fa-angle-down"></i>
                        </div>
                    <?php else: ?>
                        <input type="hidden" name="address[country]" id="address_country" value="<?php echo e(EcommerceHelper::getFirstCountryId()); ?>">
                    <?php endif; ?>
                    <?php echo Form::error('address.country', $errors); ?>

                </div>
            </div>
            <!-- V1::eArbor add this line to Select State L:111-->
            <div class="col-sm-6 col-12">
                <div class="form-group mb-3 <?php $__errorArgs = ['address.state'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> has-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                    <?php if(EcommerceHelper::loadCountriesStatesCitiesFromPluginLocation()): ?>
                        <div class="select--arrow">
                            <select name="address[state]" class="form-control address-control-item address-control-item-required" required
                                data-form-parent=".customer-address-payment-form" id="address_state" data-type="state" data-url="<?php echo e(route('ajax.states-by-country')); ?>">
                                <option value=""><?php echo e(__('Select state...')); ?></option>
                                <?php if(old('address.country', Arr::get($sessionCheckoutData, 'country')) || !EcommerceHelper::isUsingInMultipleCountries() || 35): ?>
                                    <?php $__currentLoopData = EcommerceHelper::getAvailableStatesByCountry(old('address.country', Arr::get($sessionCheckoutData, 'country'))); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stateId => $stateName): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($stateId); ?>" <?php if(old('address.state', Arr::get($sessionCheckoutData, 'state')) == $stateId): ?> selected <?php endif; ?>><?php echo e($stateName); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </select>
                            <i class="fas fa-angle-down"></i>
                        </div>
                    <?php else: ?>
                        <input id="address_state" type="text" class="form-control address-control-item address-control-item-required checkout-input" placeholder="<?php echo e(__('State')); ?>" name="address[state]" value="<?php echo e(old('address.state', Arr::get($sessionCheckoutData, 'state'))); ?>">
                    <?php endif; ?>
                    <?php echo Form::error('address.state', $errors); ?>

                </div>
            </div>

            <div class="col-sm-6 col-12">
                <div class="form-group  <?php $__errorArgs = ['address.city'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> has-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                    <?php if(EcommerceHelper::loadCountriesStatesCitiesFromPluginLocation()): ?>
                        <div class="select--arrow">
                            <select name="address[city]" class="form-control address-control-item address-control-item-required" id="address_city" required data-type="city" data-url="<?php echo e(route('ajax.cities-by-state')); ?>">
                                <option value=""><?php echo e(__('Select city...')); ?></option>
                                <?php if(old('address.state', Arr::get($sessionCheckoutData, 'state'))): ?>
                                    <?php $__currentLoopData = EcommerceHelper::getAvailableCitiesByState(old('address.state', Arr::get($sessionCheckoutData, 'state'))); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cityId => $cityName): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($cityId); ?>" <?php if(old('address.city', Arr::get($sessionCheckoutData, 'city')) == $cityId): ?> selected <?php endif; ?>><?php echo e($cityName); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </select>
                            <i class="fas fa-angle-down"></i>
                        </div>
                    <?php else: ?>
                        <input id="address_city" type="text" class="form-control address-control-item address-control-item-required checkout-input" placeholder="<?php echo e(__('City')); ?>" name="address[city]" value="<?php echo e(old('address.city', Arr::get($sessionCheckoutData, 'city'))); ?>">
                    <?php endif; ?>
                    <?php echo Form::error('address.city', $errors); ?>

                </div>
            </div>

            <div class="col-12">
                <div class="form-group mb-3 <?php $__errorArgs = ['address.address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> has-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                    <input id="address_address" type="text" class="form-control address-control-item address-control-item-required checkout-input" placeholder="<?php echo e(__('Address')); ?>" name="address[address]" value="<?php echo e(old('address.address', Arr::get($sessionCheckoutData, 'address'))); ?>" required>
                    <?php echo Form::error('address.address', $errors); ?>

                </div>
            </div>

            <!-- V1::eArbor add to disable auto complete L:158 -->
            <?php if(EcommerceHelper::isZipCodeEnabled()): ?>
                <div class="col-12">
                    <div class="form-group mb-3 <?php $__errorArgs = ['address.zip_code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> has-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                        <input id="address_zip_code" type="text"
                            class="form-control address-control-item address-control-item-required checkout-input"
                            placeholder="<?php echo e(__('Zip code')); ?>" name="address[zip_code]"
                            value="<?php echo e(old('address.zip_code', Arr::get($sessionCheckoutData, 'zip_code'))); ?>"  readonly onfocus="this.removeAttribute('readonly');" required>
                        <?php echo Form::error('address.zip_code', $errors); ?>

                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <?php if(! auth('customer')->check()): ?>
        <div class="form-group mb-3">
            <input type="checkbox" name="create_account" value="1" id="create_account" <?php if(old('create_account') == 1): ?> checked <?php endif; ?>>
            <label for="create_account" class="control-label ps-2"><?php echo e(__('Register an account with above information?')); ?></label>
        </div>

        <div class="password-group <?php if(! $errors->has('password') && ! $errors->has('password_confirmation')): ?> d-none <?php endif; ?>">
            <div class="row">
                <div class="col-md-6 col-12">
                    <div class="form-group  <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> has-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                        <input id="password" type="password" class="form-control checkout-input" name="password" autocomplete="password" placeholder="<?php echo e(__('Password')); ?>">
                        <?php echo Form::error('password', $errors); ?>

                    </div>
                </div>

                <div class="col-md-6 col-12">
                    <div class="form-group <?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> has-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                        <input id="password-confirm" type="password" class="form-control checkout-input" autocomplete="password-confirmation" placeholder="<?php echo e(__('Password confirmation')); ?>" name="password_confirmation">
                        <?php echo Form::error('password_confirmation', $errors); ?>

                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>
<?php /**PATH D:\Projects\xampp8\htdocs\iveEkart\platform/plugins/ecommerce/resources/views/orders/partials/address-form.blade.php ENDPATH**/ ?>