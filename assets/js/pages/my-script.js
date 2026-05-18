jQuery(document).ready(function() {

    // JQuery Number
    $(".number").number( true, 0 );
    $(".number-price").number( true, 2 );

    $(document).on("click", ".action-delete", function (e) {
      e.preventDefault();
      actionDelete($(this)[0].href);
    });
});