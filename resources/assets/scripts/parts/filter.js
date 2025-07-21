let isLoading = false;
import Handlebars from "handlebars";

export class Filter {
    init() {
        this.handlebarTrigger();
        this.ProjectFilter();
        this.EventTrigger();
        this.EventFilter();
    }
    handlebarTrigger() {
        var triggerOnClick = $(".load-more");

        $("body").on("click", ".category-btn", function () {
            $(".category-btn").removeClass("active");
            $(this).addClass("active");
            triggerOnClick.attr("data-items", "13");
            window.filter.ProjectFilter();
        });

        triggerOnClick.on("click", function (e) {
            e.preventDefault();
            var loadMoreVal =
                parseInt(triggerOnClick.attr("data-items")) + parseInt("13");
            triggerOnClick.attr("data-items", loadMoreVal);

            window.filter.ProjectFilter();
        });
    }
    ProjectFilter() {
        $(document).ready(function () {
            var id = $(".category-btn.active").attr("data-category").toLowerCase();
            var handlebarsCardsContainer = $("#projectCardsWrapper");
            var loadMoreTrigger = $(".load-more");
            var loadMoreAmount = parseInt(loadMoreTrigger.attr("data-items"));

            var postBody = {
                action: "filter_insight_posts",
                category: id,
                posts_per_page: loadMoreAmount,
            };

            if (!isLoading) {
                isLoading = true;

                handlebarsCardsContainer.html("Loading...");

                jQuery.post(ajaxurl, postBody, function (response) {
                    if (response.success && response.data.posts.length > 0) {
                        const posts = response.data.posts;

                        const newsCardTemplateSource = $("#project-card-template").html();
                        const newsTemplate = Handlebars.compile(newsCardTemplateSource);
                        const newsHtml = newsTemplate({ posts: posts });
                        handlebarsCardsContainer.html(newsHtml);

                        if (posts.length < loadMoreAmount) {
                            loadMoreTrigger.hide();
                        } else {
                            loadMoreTrigger.show();
                        }
                    } else {
                        handlebarsCardsContainer.html("No Posts Found");
                        loadMoreTrigger.hide();
                    }

                    isLoading = false;
                });
            }
        });
    }
    EventTrigger() {
        var triggerOnClick = $(".load-more-event");
        $("body").on("click", ".event-btn", function () {
            $(".event-btn").removeClass("active");
            $(this).addClass("active");
            triggerOnClick.attr("data-items", "12");
            triggerOnClick.show();
            window.filter.EventFilter();
        });

        triggerOnClick.on("click", function (e) {
            e.preventDefault();
            var loadMoreVal =
                parseInt(triggerOnClick.attr("data-items")) + parseInt("12");
            triggerOnClick.attr("data-items", loadMoreVal);

            window.filter.EventFilter();
        });
    }
    EventFilter() {
        $(document).ready(function () {
            var category = $(".event-btn.active").attr("data-category").toLowerCase();
            var template = "";
            var handlebarsCardsContainer = $("#EventCardContainer");
            var loadMoreTrigger = $(".load-more-event");

            var loadMoreAmount = parseInt(loadMoreTrigger.attr("data-items"));
            var offset = 10;
            var postBody = {
                action: "event_poses",
                category: category,
                loadMoreAmount: loadMoreAmount,
            };

            if (!isLoading) {
                isLoading = true;

                jQuery.post(ajaxurl, postBody, function (response) {
                    handlebarsCardsContainer.html("Loading...");
                    var _response = JSON.parse(response);

                    if (
                        typeof _response["handlebars-events"] != "undefined" &&
                        _response["handlebars-events"].length > 0
                    ) {
                        handlebarsCardsContainer.html("");

                        var handlebars = _response["handlebars-events"];
                        handlebars.map((item) => {
                            var handlebarsTemplateSource = document.getElementById(
                                "event-card-template"
                            ).innerHTML;
                            template = Handlebars.compile(handlebarsTemplateSource);

                            var result = template(item);

                            handlebarsCardsContainer.append(result);
                        });

                        loadMoreTrigger.attr("data-items", _response["loadMoreNumber"]);

                        if (_response["noMorePosts"] === true) {
                            loadMoreTrigger.hide();
                        } else {
                            loadMoreTrigger.show();
                        }
                    } else {
                        handlebarsCardsContainer.html("No Posts Found");
                        loadMoreTrigger.hide();
                    }
                    isLoading = false;
                });
            }
        });
    }
}
