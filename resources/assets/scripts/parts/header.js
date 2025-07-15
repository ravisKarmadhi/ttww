export class Header {
    init() {
        this.HeaderHover();
        this.MenuToggle();
    }

    HeaderHover() {
        $(document).ready(function () {
            function setupMegaMenu() {
                var windowWidth = $(window).width();

                // Clear previous event bindings and classes
                $(".mega-link").off(); // removes all events
                $(".mega-link").removeClass("mega-active res-mega-active");
                $("header").removeClass("header-active");

                if (windowWidth >= 1400) {
                    // Desktop: Hover behavior
                    $(".mega-link").hover(
                        function () {
                            $(this).addClass("mega-active");
                            $("header").addClass("header-active");
                        },
                        function () {
                            $(this).removeClass("mega-active");
                            $("header").removeClass("header-active");
                        }
                    );
                } else {
                    // Mobile/Tablet: Click behavior
                    $(".mega-link").each(function () {
                        var $menuItem = $(this);

                        if ($menuItem.children(".mega-menu").length === 0) return;

                        $menuItem.find(".menu-link").on("click", function (e) {
                            e.preventDefault();
                            e.stopPropagation();

                            if ($menuItem.hasClass("res-mega-active")) {
                                $menuItem.removeClass("res-mega-active");
                                $("header").removeClass("header-active");
                            } else {
                                $(".mega-link").removeClass("res-mega-active");
                                $("header").removeClass("header-active");

                                $menuItem.addClass("res-mega-active");
                                $("header").addClass("header-active");
                            }
                        });

                        $menuItem.find(".mega-menu").on("click", function (e) {
                            e.stopPropagation();
                        });
                    });

                    // Close menu when clicking outside
                    $(document).on("click", function () {
                        $(".mega-link").removeClass("res-mega-active");
                        $("header").removeClass("header-active");
                    });
                }
            }

            // Initial call and on resize
            setupMegaMenu();
            $(window).on("resize", setupMegaMenu);
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
                $(".navigation").addClass("overflow-auto");
                // $("html").addClass("overflow-hidden");
            } else {
                // Close menu
                $(".menu-toggle").removeClass("activate");
                $(".navigation").addClass("d-none");
                $(".header").removeClass("res-header-active");
                $(".navigation").removeClass("overflow-auto");
                // $("html").removeClass("overflow-hidden");
            }
            $(".mega-link").removeClass("res-menu-active");
        });
    }
}