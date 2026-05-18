<div class="kt-portlet kt-portlet--mobile">
    <div class="kt-portlet__head kt-portlet__head--lg">
        <?php
			Component(
				'DataTableHeader',
				[
					'icon' => 'flaticon2-user-outline-symbol',
					'actionUrl' => 'create',
					'actionLabel' => 'Add User Access'
				]
			);
		?>
    </div>
    <div class="kt-portlet__body">
        <?php Component('DataTableFilter'); ?>
    </div>
    <div class="kt-portlet__body kt-portlet__body--fit">
        <div class="kt-datatable" id="json_data"></div>
    </div>
</div>
