<div class="ps-site-features">
    <div class="ps-container">
        <div class="ps-block--site-features">
            <?php for($i = 1; $i <= 5; $i++): ?>
                <?php if(clean($shortcode->{'title' . $i})): ?>
                    <div class="ps-block__item">
                        <div class="ps-block__left"><i class="<?php echo BaseHelper::clean($shortcode->{'icon' . $i}); ?>"></i></div>
                        <div class="ps-block__right">
                            <h4><?php echo BaseHelper::clean($shortcode->{'title' . $i}); ?></h4>
                            <p><?php echo BaseHelper::clean($shortcode->{'subtitle' . $i}); ?></p>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endfor; ?>
        </div>
    </div>
</div>
<?php /**PATH D:\Projects\xampp8\htdocs\iveEkart\platform/themes/martfury/partials/short-codes/site-features.blade.php ENDPATH**/ ?>