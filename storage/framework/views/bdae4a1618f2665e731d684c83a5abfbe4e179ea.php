<li class="dropdown dropdown-extended dropdown-inbox" id="admin-notification">
    <a href="<?php echo e(route('notifications.get-notification')); ?>" data-href="<?php echo e(route('notifications.update-notifications-count')); ?>" id="open-notification" class="dropdown-toggle dropdown-header-name">
        <input type="hidden" value="1" class="current-page">
        <i class="fas fa-bell"></i>
        <?php if($countNotificationUnread): ?>
            <span class="badge badge-default"> <?php echo e($countNotificationUnread); ?> </span>
        <?php endif; ?>
    </a>
    <div id="notification-sidebar" class="sidebar show-notification-sidebar">
        <a class="close-btn" id="close-notification">×</a>

        <h2 class="title-notification-heading"><?php echo e(trans('core/base::notifications.notifications')); ?></h2>
        <p class="action-notification" <?php if(isset($adminNotifications) && count($adminNotifications)): ?> style="display: block" <?php endif; ?>>
            <a class="me-2 mark-read-all" href="<?php echo e(route('notifications.read-all-notification')); ?>"><?php echo e(trans('core/base::notifications.mark_as_read')); ?></a>
            <span><a class="delete-all-notifications" href="<?php echo e(route('notifications.destroy-all-notification')); ?>"><?php echo e(trans('core/base::notifications.clear')); ?></a></span>
        </p>
        <ul class="list-group list-item-notification"></ul>
    </div>
    <div class="has-loading" id="loading-notification" style="display: none;"><i class="fa fa-spinner fa-spin"></i></div>
</li>

<?php /**PATH D:\Projects\xampp8\htdocs\iveEkart\platform/core/base/resources/views/notification/notification.blade.php ENDPATH**/ ?>