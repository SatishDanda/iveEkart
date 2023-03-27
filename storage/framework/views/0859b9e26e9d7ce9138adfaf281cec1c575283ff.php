<?php if(count($ads)): ?>
    <div class="ps-home-ads mt-40 mb-40">
        <div class="ps-container">
            <div class="row">
                <?php for($i = 0; $i < count($ads); $i++): ?>
                    <div class="col-lg-<?php echo e(12 / count($ads)); ?>">
                        <div class="ps-collection">
                            <?php echo $ads[$i]; ?>

                        </div>
                    </div>
                <?php endfor; ?>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH D:\Projects\xampp8\htdocs\iveEkart\platform/themes/martfury/partials/short-codes/theme-ads.blade.php ENDPATH**/ ?>