<script type="text/javascript">
const KTDatatableJsonRemote = function () {
    const content = function (columns, rows = {}) {
        const datatable = $('.kt-datatable').KTDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        contentType: 'application/json',
                        url: '{datatable}'
                    }
                },
                serverPaging: true,
                serverFiltering: true,
                serverSorting: true,
                pageSize: 10,
            },
            layout: {
                scroll: false,
                footer: false
            },
            sortable: false,
            pagination: true,
            search: {
                input: $('#generalSearch')
            },
            rows: rows,
            columns: columns,
        });

        filter(datatable)
    };
    
    function filter(datatable) {
        $('#filterStatus').selectpicker();
        $('#filterStatus').on('change', function () {
            datatable.search($(this).val().toLowerCase(), 'status');
        });

        $('#filterDate').on('change', function () {
            var value = moment($(this).val().toLowerCase(), 'DD/MM/YYYY').format('YYYY-MM-DD')
            datatable.search(value, 'tanggal');
        });

        $('#filterStatusPayment').selectpicker();
        $('#filterStatusPayment').on('change', function () {
            datatable.search($(this).val().toLowerCase(), 'statustransaksi');
        });

        $('#filterMarketPlace').selectpicker();
        $('#filterMarketPlace').on('change', function () {
            datatable.search($(this).val().toLowerCase(), 'marketplace_name');
        });
    }

    return {
        init: function (columns, rows) {
            content(columns, rows);
        }
    };
}();
</script>