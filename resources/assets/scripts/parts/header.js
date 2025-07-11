export class Header {
    init() {
        this.MegaMenu();
    }

    MegaMenu() {
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