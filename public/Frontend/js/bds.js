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
function parse_query_string(query) {
    var vars = query.split("&");
    var query_string = {};
    for (var i = 0; i < vars.length; i++) {
        var pair = vars[i].split("=");
        if (typeof pair[0] === "undefined" || pair[0] === '') {
            continue;
        }
        // If first entry with this name
        if (typeof query_string[pair[0]] === "undefined") {
//            console.log(query_string[pair[0]]);
            query_string[pair[0]] = decodeURIComponent(pair[1]);
            // If second entry with this name
        } else if (typeof query_string[pair[0]] === "string") {
            var arr = [query_string[pair[0]], decodeURIComponent(pair[1])];
            query_string[pair[0]] = arr;
            // If third or later entry with this name
        } else {
            query_string[pair[0]].push(decodeURIComponent(pair[1]));
        }
    }
    return query_string;
}

