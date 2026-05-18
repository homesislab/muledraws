<div class="kt-portlet__head-label">
    <span class="kt-portlet__head-icon">
        <i class="kt-font-brand <?= $icon; ?>"></i>
    </span>
    <h3 class="kt-portlet__head-title">
        {title}
    </h3>
</div>

<?php
	Component(
        'DataTableToolbar',
        ['actionUrl' => $actionUrl, 'actionLabel' => $actionLabel]
    );
?>
