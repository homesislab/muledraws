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
        width: 100,
        field: 'image',
        title: 'Image',
        template: function(row, index) {
            return `<img width="100%"
                style="border: solid 1px #eee; border-radius: 10px;"
                alt="${row.name}"
                src="{uploadsPath}work/${row.image}">`;
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
        width: 200,
        field: 'action',
        title: 'Action',
        sortable: false,
        autoHide: false,
        overflow: 'visible',
        template: function(row) {
            return `<a href="${path}deleteArwork/${id}" class="btn btn-sm btn-clean btn-icon btn-icon-md action-delete" title="Delete"><i class="la la-trash"></i></a>`;
        },
    }];

    KTDatatableJsonRemote.init(columns);
});

</script>
