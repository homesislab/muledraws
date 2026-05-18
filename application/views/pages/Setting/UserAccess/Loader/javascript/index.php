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
        width: 150,
        field: 'name',
        title: 'name',
    }, {
        width: 100,
        field: 'username',
        title: 'Username',
        sortable: false,
    }, {
        width: 150,
        field: 'terakhirlogin',
        title: 'Terakhir Login',
    }, {
        width: 50,
        field: 'status',
        title: 'Status',
        template: function(row) {
            return statusRow(row.status);
        },
    }, {
        width: 100,
        field: 'aksi',
        title: 'Aksi',
        sortable: false,
        autoHide: false,
        overflow: 'visible',
        template: function(row) {
            return actionRow(row.id, row.status, 'edit,delete');
        },
    }];

    KTDatatableJsonRemote.init(columns);
});

</script>
