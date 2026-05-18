// Bootstrap Datepicker
var KTBootstrapDatepicker = function() {

    var arrows;
    if (KTUtil.isRTL()) {
        arrows = {
            leftArrow: '<i class="la la-angle-right"></i>',
            rightArrow: '<i class="la la-angle-left"></i>'
        }
    } else {
        arrows = {
            leftArrow: '<i class="la la-angle-left"></i>',
            rightArrow: '<i class="la la-angle-right"></i>'
        }
    }

    var KTConfig = function() {
        $('.datepicker').datepicker({
            rtl: KTUtil.isRTL(),
            todayHighlight: true,
            orientation: "bottom left",
            templates: arrows,
            format: 'dd/mm/yyyy',
            autoclose: true
        });
    }

    return {
        init: function() {
            KTConfig();
        }
    };
}();

jQuery(document).ready(function() {
    KTBootstrapDatepicker.init();
});