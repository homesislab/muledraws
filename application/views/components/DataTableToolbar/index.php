<div class="kt-portlet__head-toolbar">
    <div class="kt-portlet__head-wrapper">
        <div class="kt-portlet__head-actions">
            <?php if($actionLabel != '') { ?>
            <a href="<?= $loader['path'] . $actionUrl; ?>" class="btn btn-brand btn-elevate btn-icon-sm">
                <i class="la la-plus"></i>
                <?= $actionLabel; ?>
            </a>
            <?php } ?>
        </div>
    </div>
</div>
