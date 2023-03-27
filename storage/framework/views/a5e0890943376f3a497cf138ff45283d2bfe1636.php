<li><?php echo e($address->name); ?></li>
<?php if($address->phone): ?>
    <li>
        <a href="tel:<?php echo e($address->phone); ?>">
            <span><i class="fa fa-phone-square cursor-pointer mr5"></i></span>
            <span><?php echo e($address->phone); ?></span>
        </a>
    </li>
<?php endif; ?>
<li>
    <?php if($address->email): ?>
        <div><a href="mailto:<?php echo e($address->email); ?>"><?php echo e($address->email); ?></a></div>
    <?php endif; ?>
    <?php if($address->address): ?>
        <div><?php echo e($address->address); ?></div>
    <?php endif; ?>
    <?php if($address->city): ?>
        <div><?php echo e($address->city_name); ?></div>
    <?php endif; ?>
    <?php if($address->state): ?>
        <div><?php echo e($address->state_name); ?></div>
    <?php endif; ?>
    <?php if($address->country_name): ?>
        <div><?php echo e($address->country_name); ?></div>
    <?php endif; ?>
    <?php if(EcommerceHelper::isZipCodeEnabled() && $address->zip_code): ?>
        <div><?php echo e($address->zip_code); ?></div>
    <?php endif; ?>
    <div>
        <a target="_blank" class="hover-underline" href="https://maps.google.com/?q=<?php echo e($address->address); ?>, <?php echo e($address->city_name); ?>, <?php echo e($address->state_name); ?>, <?php echo e($address->country_name); ?><?php if(EcommerceHelper::isZipCodeEnabled()): ?>, <?php echo e($address->zip_code); ?> <?php endif; ?>"><?php echo e(trans('plugins/ecommerce::order.see_on_maps')); ?></a>
    </div>
</li>
<?php /**PATH D:\Projects\xampp8\htdocs\iveEkart\platform/plugins/ecommerce/resources/views/orders/shipping-address/detail.blade.php ENDPATH**/ ?>