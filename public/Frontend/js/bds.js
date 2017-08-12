$(document).ready(function () {
    $('.btn-more-filter').click(function () {
        if ($(".filter-hide").is(":visible")) {
            $('.btn-more-filter i').removeClass('fa fa-caret-up');
            $('.btn-more-filter i').addClass('fa fa-caret-down');
        } else {
            $('.btn-more-filter i').removeClass('fa fa-caret-down');
            $('.btn-more-filter i').addClass('fa fa-caret-up');
        }
        $(".filter-hide").toggle(1000);
    });
});


