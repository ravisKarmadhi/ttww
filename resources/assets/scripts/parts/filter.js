let isLoading = false;
import Handlebars from 'handlebars';

export class Filter {
    init() {
        this.handlebarTrigger();
        this.ProjectFilter();
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

        console.log(isLoading, "isLoading")
        $(document).ready(function () {
            var id = $('.category-btn.active').attr('data-category').toLowerCase();
            var handlebarsCardsContainer = $('#projectCardsWrapper');
            var loadMoreTrigger = $('.load-more');
            var loadMoreAmount = parseInt(loadMoreTrigger.attr("data-items"));

            var postBody = {
                action: 'filter_insight_posts',
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
                        const newsHtml = newsTemplate({posts:posts});
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
}