<?php Component('DataTableInit'); ?>

<script type="text/javascript">
jQuery(document).ready(function() {
    const columns = [{
        width: 50,
        field: 'id',
        title: 'No.',
        type: 'number',
        textAlign: 'center',
        sortable: false,
        template: function(row, index) {
            return index + 1;
        },
    }, {
        width: 250,
        field: 'name',
        title: 'Name',
    }, {
        width: 80,
        field: 'status',
        title: 'Status',
        template: function(row) {
            return statusRow(row.status);
        },
    }, {
        width: 150,
        field: 'action',
        title: 'Action',
        sortable: false,
        autoHide: false,
        overflow: 'visible',
        template: function(row) {
            return actionRow(row.id, row.status);
        },
    }];

    KTDatatableJsonRemote.init(columns);
});

</script>
