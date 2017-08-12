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
    $('#singleCategory .tow-column').click(function () {
        $('.box-category').removeClass('col-md-12 col-sm-12 col-md-6 col-sm-6');
        $('.article-left').removeClass('col-xs-4 col-xs-5');
        $('.article-right').removeClass('col-xs-8 col-xs-7');
        $('.box-category').addClass('col-md-6 col-sm-6');
        $('.article-left').addClass('col-xs-5');
        $('.article-right').addClass('col-xs-7');
    });
    $('.one-column').click(function () {
        $('.box-category').removeClass('col-md-6 col-sm-6 col-md-12 col-sm-12');
        $('.article-left').removeClass('col-xs-4 col-xs-5');
        $('.article-right').removeClass('col-xs-8 col-xs-7');
        $('.box-category').addClass('col-md-12 col-sm-12');
        $('.article-left').addClass('col-xs-4');
        $('.article-right').addClass('col-xs-8');
    });
    $('category-censored').click(function () {
        
    });
});