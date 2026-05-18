<?php declare(strict_types=1);

require __DIR__.'/services.php'; ?>

<script type="text/javascript">
$(document).ready(function() {
    $('input[name="logo"]').on('change', function(e) {
        var input = e.target;
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('.kt-avatar__holder').css('background-image', 'url(' + e.target.result + ')');
            };
            reader.readAsDataURL(input.files[0]);
        }
    });
    
    $(document).on("click", ".actionAddSocialMedia", function() {
        $("#tableSocialMedia tbody").append(rowTableSocialMedia());
    });

    $(document).on("click", ".actionRemovetableSocialMedia", function() {
        if (confirm("Delete this account number data ?") == true) {
            $(this).closest('tr').remove();
        }
        return false;
    });

    document.querySelector('#form').addEventListener('submit', function(e) {
        submitForm();
    });
});
</script>
