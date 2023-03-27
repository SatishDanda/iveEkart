<?php if(empty($widgetSetting) || $widgetSetting->status == 1): ?>
    <div class="col">
        <a class="dashboard-stat dashboard-stat-v2 text-white" style="background-color: <?php echo e($widget->color); ?>;" href="<?php echo e($widget->route); ?>">
            <div class="visual">
                <i class="<?php echo e($widget->icon); ?>" style="opacity: .1;"></i>
            </div>
            <div class="details">
                <div class="number">
                    <span data-counter="counterup" data-value="<?php echo e($widget->statsTotal); ?>">0</span>
                </div>
                <div class="desc"><?php echo e($widget->title); ?></div>
            </div>
        </a>
    </div>
<?php endif; ?>
<?php /**PATH D:\Projects\xampp8\htdocs\iveEkart\platform/core/dashboard/resources/views/widgets/stats.blade.php ENDPATH**/ ?>