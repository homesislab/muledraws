// Input Masking
var KTInputmask = function () {
    var KTConfig = function () {

        // date format
        $(".mask-date").inputmask("mask", {
            "mask": "9999-99-99"
        });

        // telephone number format
        $(".mask-telephone").inputmask("mask", {
            "mask": "(999) 999-9999"
        });

        // fax number format
        $(".mask-fax").inputmask("mask", {
            "mask": "(999) 999-9999"
        });

        // phone number placeholder
        $(".mask-phone").inputmask({
            "mask": "+99-99999999999",
            placeholder: "" // remove underscores from the input mask
        });

        // npwp placeholder
        $(".mask-npwp").inputmask({
            "mask": "99.999.999.9-999.999",
            placeholder: "" // remove underscores from the input mask
        });

        // currency placeholder
        $(".mask-currency").inputmask('Rp 999.999.999,99', {
            numericInput: true
        }); //123456  =>  Rp ___.__1.234,56

        // decimal format
        $(".mask-decimal").inputmask('decimal');

        // email address
        $(".mask-email").inputmask({
            mask: "*{1,20}[.*{1,20}][.*{1,20}][.*{1,20}]@*{1,20}[.*{2,6}][.*{1,2}]",
            greedy: false,
            onBeforePaste: function (pastedValue, opts) {
                pastedValue = pastedValue.toLowerCase();
                return pastedValue.replace("mailto:", "");
            },
            definitions: {
                '*': {
                    validator: "[0-9A-Za-z!#$%&'*+/=?^_`{|}~\-]",
                    cardinality: 1,
                    casing: "lower"
                }
            }
        });
    }

    return {
        init: function() {
            KTConfig();
        }
    };
}();

jQuery(document).ready(function() {
    KTInputmask.init();
});
