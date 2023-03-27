<ul <?php echo $options; ?>>
    <?php $__currentLoopData = $menu_nodes->loadMissing('metadata'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li <?php if($row->has_child || $row->css_class || $row->active): ?> class="<?php if($row->has_child): ?> menu-item-has-children <?php endif; ?> <?php if($row->css_class): ?> <?php echo e($row->css_class); ?> <?php endif; ?> <?php if($row->active): ?> current-menu-item <?php endif; ?>" <?php endif; ?>>
            <a href="<?php echo e(url($row->url)); ?>" <?php if($row->target !== '_self'): ?> target="<?php echo e($row->target); ?>" <?php endif; ?>>
                <?php if($iconImage = $row->getMetadata('icon_image', true)): ?>
                    <img src="<?php echo e(RvMedia::getImageUrl($iconImage)); ?>" alt="icon image" width="15" height="15" style="vertical-align: top; margin-top: 2px"/>
                <?php elseif($row->icon_font): ?> <i class="<?php echo e(trim($row->icon_font)); ?>"></i> <?php endif; ?> <?php echo e($row->title); ?>

            </a>
            <?php if($row->has_child): ?>
                <span class="sub-toggle"></span>
                <?php echo Menu::generateMenu([
                    'menu'       => $menu,
                    'menu_nodes' => $row->child,
                    'view'       => 'menu',
                    'options' => [
                        'class' => 'sub-menu',
                    ]
                ]); ?>

            <?php endif; ?>
        </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>
<?php /**PATH D:\Projects\xampp8\htdocs\iveEkart\platform/themes/martfury/partials/menu.blade.php ENDPATH**/ ?>