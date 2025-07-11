export class Filter {
    init() {
        this.ProjectFilter();
        this.ProjectFilterBtn();
    }
    ProjectFilter() {
        $(document).ready(function () {
            $(".filter-button").click(function () {
                var value = $(this).attr('data-filter');
                if (value == "all") {
                    $('.filter').show('500');
                }
                else {
                    $('.filter').not('.' + value).hide('1000');
                    $('.filter').filter('.' + value).show('1000');
                }
            });

            $(".filter-button").click(function () {
                $(this).addClass("active").siblings().removeClass("active");
            });


        });
    }

    ProjectFilterBtn() {
        // $(document).ready(function () {
        //     $(".more-filter").addClass("d-none");

        //     $(".filter-btns .filter-btn").click(function () {
        //         var $btn = $(this);
        //         var $parent = $btn.closest(".filter-btns");
        //         var $moreFilter = $parent.find(".more-filter");

        //         $btn.toggleClass("active");

        //         $(".filter-btn").not($btn).removeClass("active");
        //         $(".more-filter").not($moreFilter).removeClass("d-flex").addClass("d-none");

        //         if ($btn.hasClass("active")) {
        //             $moreFilter.removeClass("d-none").addClass("d-flex");
        //         } else {
        //             $moreFilter.removeClass("d-flex").addClass("d-none");
        //         }
        //     });

        //     $(document).click(function (e) {
        //         if (!$(e.target).closest(".filter-btns").length) {
        //             $(".filter-btn").removeClass("active");
        //             $(".more-filter").removeClass("d-flex").addClass("d-none");
        //         }
        //     });
        // });
    }
}