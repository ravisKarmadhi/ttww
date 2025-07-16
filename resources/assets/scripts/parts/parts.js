let isLoading = false;

export class Parts {

	init() {
		this.handlebarTrigger();
		this.handlebarsFilter();
		jQuery(document).ready(function ($) {
			function updateShippingVisibility() {
				const selected = $('input[name="delivery_method"]:checked').val();

				if (selected === 'home') {
					$('.shipping-section').slideDown();
				} else {
					$('.shipping-section').slideUp();
				}

				// Important: Trigger WooCommerce to recalculate totals
				$('body').trigger('update_checkout');
			}

			// Bind event
			$(document).on('change', 'input[name="delivery_method"]', updateShippingVisibility);

			// On page load
			updateShippingVisibility();
		});
	}

	handlebarTrigger() {
		var triggerOnClick = $(".loadMore");


		$("body").on("click", ".handlebar--trigger", function () {
			$(".handlebar--trigger").removeClass("active");
			$(this).addClass("active");
			triggerOnClick.attr("data-items", "12");
			window.parts.handlebarsFilter();
			// console.log(this);
		});

		// load more case studies button
		triggerOnClick.on("click", function (e) {
			e.preventDefault();
			var loadMoreVal =
				parseInt(triggerOnClick.attr("data-items")) + parseInt("4");
			triggerOnClick.attr("data-items", loadMoreVal);

			$(".filter--title .project-filter-btns").hasClass("active");

			window.parts.handlebarsFilter();
		});
	}

	handlebarsFilter() {
		var id = $(".handlebar--trigger.active").attr("data-id");

		var template = "";
		var handlebarsContainer = $(".project-container");

		// load more items
		var loadMoreTrigger = $(".loadMore");
		var loadMoreAmount = loadMoreTrigger.attr("data-items");
		var offset = 10;
		console.log(loadMoreAmount);
		var postBody = {
			action: "get_project_ajax",
			cat: id,
			loadMoreAmount: loadMoreAmount,
		};

		if (!isLoading) {
			isLoading = true;
			//window.posts.ajaxLoaderIn();

			jQuery.post(ajaxurl, postBody, function (response) {
				handlebarsContainer.html("Loading");

				var _response = JSON.parse(response);

				//$('.loader--properties').fadeOut();
				if (
					typeof _response["projects_item"] != "undefined" &&
					_response["projects_item"].length > 0
				) {
					handlebarsContainer.html("");

					var handlebars = _response["projects_item"];
					handlebars.map((item) => {
						var handlebarsTemplateSource =
							document.getElementById("handlebar-template").innerHTML;
						template = Handlebars.compile(handlebarsTemplateSource);

						var result = template(item);

						handlebarsContainer.append(result);
					});

					//var bannerTemplateSource = $(".black--banner").html();

					//$("</ul></div>" + bannerTemplateSource + "<div class='wide--wrap'><ul class='row post--block2'>").insertAfter('.postBlock .post--block:nth-child(6n)');

					loadMoreTrigger.attr("data-items", _response["loadMoreNumber"]);
				} else {
					handlebarsContainer.html("No Posts Found");
				}
				isLoading = false;
			});
		}
	}
}
