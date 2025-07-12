export class Header {
    init() {
        this.HeaderHover();
        this.MenuToggle();
    }

    HeaderHover() {
        $(document).ready(function () {
            function handleWindowResizeDeskSize() {
                var windowWidth = $(window).width();
                if (windowWidth >= 1024) {
                    $(".mega-link").hover(
                        function () {
                            $(this).addClass("mega-active");
                            $("header").addClass("header-active");
                        },
                        function () {
                            $(this).removeClass("mega-active");
                            $("header").removeClass("header-active");
                        }
                    )
                }
            }

            handleWindowResizeDeskSize();
            $(window).resize(handleWindowResizeDeskSize);
        });
    }
     MenuToggle() {
        $(".menu-toggle").click(function (e) {
            e.preventDefault();

            if (!$(".menu-toggle").hasClass("activate")) {
                // Open menu
                $(".menu-toggle").addClass("activate");
                $(".navigation").removeClass("d-none");
                $(".header").addClass("res-header-active");
                $("html").addClass("overflow-hidden");
            } else {
                // Close menu
                $(".menu-toggle").removeClass("activate");
                $(".navigation").addClass("d-none");
                $(".header").removeClass("res-header-active");
                $("html").removeClass("overflow-hidden");
            }
            $(".mega-link").removeClass("res-menu-active");
        });
    }
}