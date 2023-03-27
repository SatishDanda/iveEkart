<?php if($data instanceof Illuminate\Pagination\LengthAwarePaginator && $data->withQueryString()): ?>
    <div class="row g-0">
        <div class="col-3 number_record">
            <div class="f_com">
                <input type="number" class="numb" value="<?php echo e($limit); ?>" step="5" min="5" max="<?php echo e($data->total()); ?>">
                <div class="btn_grey btn_change_paginate btn_up"></div>
                <div class="btn_grey btn_change_paginate btn_down"></div>
            </div>
        </div>
        <div class="col-9 widget_pagination">
            <div class="d-flex justify-content-end ">
                <?php
                    $info = $data->total() > 0 ? ($data->currentPage() - 1) * $limit + 1 : 0;
                    $info .= '- ' . ($limit < $data->total() ? $data->currentPage() * $limit : $data->total()) . ' ';
                    $info .= trans('core/base::tables.in') . ' ' . $data->total() . ' ' . trans('core/base::tables.records');
                ?>
                <span class="d-flex align-items-center"><?php echo e($info); ?></span>
                <a class="btn btn_grey page_previous <?php if($data->onFirstPage()): ?> disabled <?php endif; ?>" href="<?php echo e($data->previousPageUrl()); ?>"></a>
                <a class="btn btn_grey page_next <?php if(!$data->hasMorePages()): ?> disabled <?php endif; ?>" href="<?php echo e($data->nextPageUrl()); ?>"></a>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH D:\Projects\xampp8\htdocs\iveEkart\platform/core/dashboard/resources/views/partials/paginate.blade.php ENDPATH**/ ?>