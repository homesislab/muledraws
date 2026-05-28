<script type="text/javascript">
function getSocialMedia() {
    const socialMedia = $('#tableSocialMedia tbody tr').get().map(function(row) {
        return $(row).find('td:not(:eq(2))').get().map(function(cell) {
            if ($(cell).find("input").length >= 1) {
                if ($(cell).find("select").val()) {
                    return $(cell).find("select").val();
                } else {
                    return $(cell).find("input").val();
                }
            }
        });
    });

    return socialMedia;
}

function rowTableSocialMedia() {
    return `<tr>
        <td>
            <input class="form-control socialMediaName" type="text" placeholder="Social Media Name" value="">
        </td>
        <td>
            <input class="form-control socialMediaURL" type="text" placeholder="Social Media URL" value="">
        </td>
        <td class="text-center">
            <button type="button" class="btn btn-danger btn-icon actionRemoveSocialMedia"><i class="la la-trash"></i></button>
        </td>
    </tr>`;
}

function submitForm() {
    // Populate hidden field BEFORE form submission
    $("#socialMedia").val(JSON.stringify(getSocialMedia()));
}

function showAlert(title, text, type) {
    swal.fire({
        title: title,
        text: text,
        icon: type,
        timer: 1500,
        showConfirmButton: false
    });
}
</script>
